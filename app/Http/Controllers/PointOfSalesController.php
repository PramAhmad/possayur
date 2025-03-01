<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\ProductPriceByCustomer;
use App\Models\ProductSalesOrder;
use App\Models\SalesOrder;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;    
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

class PointOfSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchProducts(Request $request)
    {
        $keyword = $request->get('keyword');
        $products = Product::where('name', 'LIKE', '%' . $keyword . '%')->get();

        return response()->json($products);
    }
    public function getPriceByCustomer(Request $request)
    {
        $data = ProductPriceByCustomer::where('customer_id', $request->customer)->with('product')->get();

        return response()->json($data);
    }
    public function index()
    {
        $breadcrumbItems = [
            [
                'name' => 'Point of Sales',
                'url' => route('salesorder.index'),
                'active' => true
            ],
        ];

        $pageTitle = 'Point of Sales';
        if (auth()->user()->hasRole('super-admin')) {
            $outlets = QueryBuilder::for(Outlet::class)
                ->allowedSorts(['name', 'address', 'phone', 'is_active'])
                ->latest()
                ->paginate(10);
        } else {
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->paginate(10);
        }

        return view('pos.index', [
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => $pageTitle,
            'outlets' => $outlets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $request->validate([
            'customer' => 'required|exists:customer,id',
            'outlet' => 'required|exists:outlets,id',
            'cash' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'items' => 'required|array|min:1',
            'items.*.id' => 'required|exists:product,id',
            'items.*.qty' => [
                'required',
                'numeric',
                'min:1',
                function ($attribute, $value, $fail) use ($request) {
                    $index = explode('.', $attribute)[1];
                    $productId = $request->items[$index]['id'];
                    $product = Product::find($productId);
                    
                    if ($product && $value > $product->qty) {
                        $fail("Insufficient stock for product {$product->name}. Available: {$product->qty}, Requested: {$value}");
                    }
                },
            ],
            'items.*.price' => 'required|numeric|min:0',
            'items.*.discount' => 'nullable|numeric|min:0',
            'items.*.tax' => 'nullable|numeric|min:0',
            'items.*.variantId' => 'nullable|exists:product_variants,id',
            'items.*.batchId' => 'nullable|exists:product_batches,id',
        ]);

        try {
            DB::beginTransaction();
            $salesOrder =  SalesOrder::create([
                'customer_id' => $request->customer,
                'outlet_id' => $request->outlet,
                'reference_no' =>  'SO-' . time(),
                'note' => $request->note ?? '-',
                'status' => 'pending',
                'paid_amount' =>   $request->cash,
                'grandtotal' => $request->total,
                'user_id' => auth()->user()->id,
                'coupon_id' => $request->coupon,
                'total_tax' => $request->tax,
                'total_discount' => $request->totalDiscount,
            ]);
            foreach ($request->items as $item) {
                ProductSalesOrder::create([
                    'sales_order_id' => $salesOrder->id,
                    'product_id' => $item['id'],
                    'qty' => $item['qty'],
                    'unit_price' => $item['price'],
                    'discount' => $item['discount'] ?? 0,
                    'tax' => $item['tax'] ?? 0,
                    'total_price' => $item['qty'] * $item['price'],
                    'variant_id' => $item['variantId'] ?? null,
                    'batch_id' => $item['batchId'] ?? null,
                ]);
                $product = Product::find($item['id']);
                $product->update(['qty' => $product->qty - $item['qty']]);
            }
            // total qty 
            $total_qty = ProductSalesOrder::where('sales_order_id', $salesOrder->id)->sum('qty');
            $salesOrder->update(['total_qty' => $total_qty]);
            // qty used coupon
            if($request->coupon){
                $coupon = Coupon::find($request->coupon);
                $coupon->update(['used' => $coupon->used + 1]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
        DB::commit();
        return redirect()->route('salesorder.index')->with('success', 'Sales Order created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $breadcrumbItems = [
            [
                'name' => 'Point of Sales',
                'url' => route('salesorder.index'),
                'active' => true
            ],
        ];

        $pageTitle = 'Point of Sales';
        $productsQuery = Product::where('outlet_id', $id)
        ->with('unit', 'variants', 'batches')
        ->where('is_active', '=', '1');
        $outlet = Outlet::find($id);
        $customer = Customer::whereHas('user', function ($query) use ($id) {
            $query->where('outlet_id', $id);
        })->with('user')->get();
        $products = $productsQuery->paginate(10);
        $productsall = Product::where('outlet_id', $id)
        ->with('unit', 'variants', 'batches')  
        ->where('is_active', '=', '1')
        ->get();
        // return $productsall;
        $coupon = Coupon::where('outlet_id', $id)->get();
        // return $customer;
        return view('pos.show', [
            'breadcrumbItems' => $breadcrumbItems,
            'productsall' => $productsall,
            'pageTitle' => $pageTitle,
            'outlet' => $outlet,
            'products' => $products,
            'customers' => $customer,
            'id' => $id,
            'coupons' => $coupon
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
