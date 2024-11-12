<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\ProductSalesOrder;
use App\Models\ProductSuratJalan;
use App\Models\SalesOrder;
use App\Models\SuratJalan;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class SuratJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $breadcrumbItems = [
            [
                'name' => 'Surat Jalan',
                'url' => route('suratjalan.index'),
                'active' => true
            ],
        ];
    
        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');
    
        $query = QueryBuilder::for(SuratJalan::class)
            ->allowedSorts(['no_surat_jalan', 'tanggal', 'outlet_id', 'customer_id', 'packer', 'driver', 'due_date'])
            ->when($q, function ($query, $q) {
                return $query->where('no_surat_jalan', 'like', "%$q%")
                             ->orWhere('packer', 'like', "%$q%")
                             ->orWhere('driver', 'like', "%$q%");
            })
            ->latest();
    
        
        $suratJalan = $query->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);
    
        return view('suratjalan.index', [
            'suratJalan' => $suratJalan,
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => 'Surat Jalan',
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbItems = [
            [
                'name' => 'Surat Jalan',
                'url' => route('suratjalan.index'),
                'active' => false
            ],
            [
                'name' => 'Create',
                'url' => route('suratjalan.create'),
                'active' => true
            ],
        ];
        if (auth()->user()->hasRole('super-admin')) {
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->get();
            $salesOrder = SalesOrder::where('status', '=' ,'pending')->get();
            $productSalesOrders = ProductSalesOrder::all();
        }else{
            $outlets = Outlet::all();
            $salesOrder = SalesOrder::where('outlet_id', auth()->user()->outlet_id)->get();
            $productSalesOrders = ProductSalesOrder::all();
        }

        // return $salesOrder;
        return view('suratjalan.create', [
            'breadcrumbItems' => $breadcrumbItems,
            'salesOrder' => $salesOrder,
            'outlets' => $outlets,
            'productSalesOrders' => $productSalesOrders,
            'pageTitle' => 'Create Surat Jalan',
        ]);
    }

    public function getProducts($salesOrderId)
    {
        $salesOrder = SalesOrder::with(['products','products.product'])->findOrFail($salesOrderId);
        
        return response()->json([
            'products' => $salesOrder->products,
            'total_qty' => $salesOrder->total_qty,
            'grand_total' => $salesOrder->grandtotal
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $suratJalan = SuratJalan::create([
            'sales_order_id' => $request->sales_order_id,
            'packer' => $request->packer,
            'driver' => $request->driver,
            'due_date' => $request->due_date,
            'total_qty' => $request->summary['total_adjusted_qty'] ?? 0, 
            'grand_total' => $request->summary['total_adjusted_amount'] ?? 0,
       ]);
            SalesOrder::findOrFail($request->sales_order_id)->update([
                'status' => 'process'
            ]);;

            foreach($request->products as $key => $product){
               ProductSuratJalan::create(attributes: [
                   'surat_jalan_id' => $suratJalan->id,
                   'product_id' => $product['product_id'],
                   'qty' => $product['adjusted_qty'],
                   'unit_price' => $product['unit_price'],
                   'total_price' => $product['adjusted_subtotal'],
               ]);
            }

        }catch(\Exception $e){
            return $e->getMessage();
            return redirect()->back()->with('error', $e->getMessage());
        }
        return response()->json(['message' => 'Surat Jalan created successfully']);
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
                'name' => 'Surat Jalan',
                'url' => route('suratjalan.index'),
                'active' => false
            ],
            [
                'name' => 'Detail',
                'url' => route('suratjalan.show', $id),
                'active' => true
            ],
        ];
        $suratJalan = SuratJalan::with(['salesorder.products.product','salesorder.outlet','salesorder.customer','productSuratJalans.product'])->findOrFail($id);
        // return $suratJalan; 
        return view('suratjalan.show', [
            'suratJalan' => $suratJalan,
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => 'Detail Surat Jalan',
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
        SuratJalan::findOrFail($id)->delete();
        return response()->json(['message' => 'Surat Jalan deleted successfully']);
    }
}
