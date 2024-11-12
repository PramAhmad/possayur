<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\ProductSalesOrder;
use App\Models\SalesOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PointOfSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $outlets = Outlet::paginate(5);
        return view('salesorder.index', [
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
        // dd($request->all());
     

       try{
        DB::beginTransaction();
           $salesOrder =  SalesOrder::create([
                'customer_id' => $request->customer,
                'outlet_id' => $request->outlet,
                'reference_no' =>  'SO-'.time(),
                'note' => $request->note ?? '-',
                'status' => 'pending',
                'paid_amount' =>   $request->cash,
                'grandtotal' => $request->total,  
                'user_id' => auth()->user()->id, 
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
                ]);
                $product = Product::find($item['id']);
                $product->update(['qty' => $product->qty - $item['qty']]);

            }
            // total qty 
            $total_qty = ProductSalesOrder::where('sales_order_id', $salesOrder->id)->sum('qty');
            $salesOrder->update(['total_qty' => $total_qty]);

    
       }catch(\Exception $e){
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
        $products = Product::where('outlet_id', $id)->get();
        $outlet = Outlet::find($id);
        $customer = Customer::whereHas('user', function($query) use ($id) {
            $query->where('outlet_id', $id);
        })->with('user')->get();
        return view('salesorder.show', [
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => $pageTitle,
            'outlet' => $outlet,
            'products' => $products,
            'customers' => $customer,
            'id' => $id
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
