<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\ProductPurchase;
use App\Models\PurchaseOrder;
use App\Models\Suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchasePOSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbItems = [
            [
                'name' => 'Purchse Point of Sales',
                'url' => route('purchasepos.index'),
                'active' => true
            ],
        ];

        $pageTitle = 'Point of Sales';
        $outlets = Outlet::paginate(5);

        return view('purchasepos.index', [
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => $pageTitle,
            'outlets' => $outlets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        

        try {
            DB::beginTransaction();
            $purchase =  PurchaseOrder::create([
                'reference_no' =>  'PO-' . time(),
                'user_id' => auth()->id(),
                'outlet_id' => $request->outlet,
                'supplier_id' => $request->supplier,
                'note' => $request->note ?? '-',
                'status' => 'pending',
                'payment_status' => 'unpaid',
                'total_cost' =>   $request->cash,
                'total_qty' => 0,
                'grand_total' => $request->total,
            ]);
            foreach ($request->items as $item) {
                ProductPurchase::create([
                    'purchase_id' => $purchase->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['qty'],
                    'unit_price' => $item['price'],
                    // 'discount' => $item['discount'] ?? 0,
                    // 'tax' => $item['tax'] ?? 0,
                    'net_cost' => $item['qty'] * $item['price'],
                    'total_cost' => $item['qty'] * $item['price'],
                ]);
                $product = Product::find($item['id']);
                // penambahan stock
                $product->qty += $item['qty'];
            }
            $total_qty = ProductPurchase::where('purchase_id', $purchase->id)->sum('quantity');
            $purchase->update(['total_qty' => $total_qty]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
        DB::commit();
        return redirect()->back()->with('success', 'Purchase Order created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $breadcrumbItems = [
            [
                'name' => 'Purchase Point of Sales',
                'url' => route('purchasepos.index'),
                'active' => true
            ],
        ];

        $pageTitle = 'Point of Sales';
        $products = Product::where('outlet_id', $id)->with('unit')->get();
        $outlet = Outlet::find($id);
       if(auth()->user()->hasRole('super-admin')){
            $suppliers = Suplier::all();
        }else{
            $suppliers = Suplier::where('outlet_id', auth()->user()->outlet_id)->get();
        }
        $coupon = Coupon::where('outlet_id', $id)->get();
        // return $customer;
        return view('purchasepos.show', [
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => $pageTitle,
            'suppliers' => $suppliers,
            'products' => $products,
            'id' => $id,
            'outlet' => $outlet,
            'coupons' => $coupon
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
