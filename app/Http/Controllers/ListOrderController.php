<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\SalesOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

class ListOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbItems = [
            [
                'name' => 'List Order',
                'url' => route('listorder.index'),
                'active' => true
            ],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');
        if(auth()->user()->hasRole('super-admin')){
            $salesOrder = QueryBuilder::for(SalesOrder::class)
                ->allowedSorts(['reference_no', 'tanggal', 'outlet_id', 'customer_id', 'due_date','grand_total'])
                ->with('outlet', 'customer','products','products.product','returnSalesOrder','invoice')
                ->where('reference_no', 'like', "%$q%")
                ->with(['outlet', 'customer'])
                ->latest()
                ->paginate($perPage)
                ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        }else{
            $salesOrder = QueryBuilder::for(SalesOrder::class)
                ->allowedSorts(['reference_no', 'tanggal', 'outlet_id', 'customer_id', 'due_date','grand_total'])
                ->with('outlet', 'customer','products','products.product','returnSalesOrder','invoice')
                ->where('reference_no', 'like', "%$q%")
                ->where('outlet_id', auth()->user()->outlet_id)
                ->with(['outlet', 'customer'])
                ->latest()
                ->paginate($perPage)
                ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);


        }
        $listOrder = $salesOrder;

        return view('list-order.index', [
            'listorder' => $listOrder,
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => 'List Order',
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
        //
    }

    /**
     * Display the specified resource.
     */

     public function show($id)
     {
         $breadcrumbItems = [
             [
                 'name' => 'List Order',
                 'url' => route('listorder.index'),
                 'active' => false
             ],
             [
                 'name' => 'Detail',
                 'url' => route('listorder.show', $id),
                 'active' => true
             ],
         ];
     
         // Get return data
         $returnQuery = "
             SELECT 
                 p.id,
                 p.name as product_name,
                 COALESCE(prso.qty, 0) as return_qty,
                 COALESCE(prso.price, 0) as return_price,
                 COALESCE(prso.qty * prso.price, -2) as return_total
             FROM product p
             LEFT JOIN product_return_sales_order prso ON p.id = prso.product_id
             LEFT JOIN return_sales_order rso ON prso.return_sales_order_id = rso.id
             LEFT JOIN sales_orders so ON rso.sales_order_id = so.id
             WHERE so.id = ?
         ";
     
         // Get surat jalan data
         $suratJalanQuery = "
             SELECT 
                 p.id,
                 p.name as product_name,
                 COALESCE(psj.qty, 0) as sj_qty,
                 COALESCE(psj.unit_price, 0) as sj_price,
                 COALESCE(psj.qty * psj.unit_price, 0) as sj_total
             FROM product p
             LEFT JOIN product_surat_jalans psj ON p.id = psj.product_id
             LEFT JOIN surat_jalans sj ON psj.surat_jalan_id = sj.id
             LEFT JOIN sales_orders so ON sj.sales_order_id = so.id
             WHERE so.id = ?
         ";
     
         // Get sales order data
         $salesOrderQuery = "
             SELECT 
                 p.id,
                 p.name as product_name,
                 COALESCE(pso.qty, 0) as so_qty,
                 COALESCE(pso.unit_price, 0) as so_price,
                 COALESCE(pso.qty * pso.unit_price, 0) as so_total
             FROM product p
             LEFT JOIN product_sales_orders pso ON p.id = pso.product_id
             LEFT JOIN sales_orders so ON pso.sales_order_id = so.id
             WHERE so.id = ?
         ";
     
         // Get invoice data
         $invoiceQuery = "
             SELECT 
                 p.id,
                 p.name as product_name,
                 COALESCE(pi.qty, 0) as inv_qty,
                 COALESCE(pi.price, 0) as inv_price,
                 COALESCE(pi.qty * pi.price, 0) as inv_total
             FROM product p
             LEFT JOIN product_invoices pi ON p.id = pi.product_id
             LEFT JOIN invoices i ON pi.invoice_id = i.id
             WHERE i.sales_order_id = ?
         ";
     
         $returnProducts = DB::select($returnQuery, [$id]);
         $sjProducts = DB::select($suratJalanQuery, [$id]);
         $soProducts = DB::select($salesOrderQuery, [$id]);
         $invProducts = DB::select($invoiceQuery, [$id]);
     
         $allProducts = [];
     
         // Initialize products from return data
         foreach ($returnProducts as $product) {
             $allProducts[$product->id] = [
                 'product_name' => $product->product_name,
                 'return_qty' => $product->return_qty,
                 'return_price' => $product->return_price,
                 'return_total' => $product->return_total
             ];
         }
     
         // Process surat jalan products
         foreach ($sjProducts as $product) {
             if (!isset($allProducts[$product->id])) {
                 $allProducts[$product->id] = [
                     'product_name' => $product->product_name,
                     'return_qty' => 0,
                     'return_price' => 0,
                     'return_total' => 0,
                     'sj_qty' => 0,
                     'sj_price' => 0,
                     'sj_total' => 0,
                     'so_qty' => 0,
                     'so_price' => 0,
                     'so_total' => 0,
                     'inv_qty' => 0,
                     'inv_price' => 0,
                     'inv_total' => 0,
                 ];
             }
     
             $allProducts[$product->id]['sj_qty'] = $product->sj_qty ?? 0;
             $allProducts[$product->id]['sj_price'] = $product->sj_price ?? 0;
             $allProducts[$product->id]['sj_total'] = $product->sj_total ?? 0;
         }
     
         // Process sales order products
         foreach ($soProducts as $product) {
             if (!isset($allProducts[$product->id])) {
                 $allProducts[$product->id] = [
                     'product_name' => $product->product_name,
                     'return_qty' => 0,
                     'return_price' => 0,
                     'return_total' => 0,
                     'sj_qty' => 0,
                     'sj_price' => 0,
                     'sj_total' => 0,
                     'so_qty' => 0,
                     'so_price' => 0,
                     'so_total' => 0,
                     'inv_qty' => 0,
                     'inv_price' => 0,
                     'inv_total' => 0,
                 ];
             }
     
             $allProducts[$product->id]['so_qty'] = $product->so_qty ?? 0;
             $allProducts[$product->id]['so_price'] = $product->so_price ?? 0;
             $allProducts[$product->id]['so_total'] = $product->so_total ?? 0;
         }
     
         // Process invoice products
         foreach ($invProducts as $product) {
             if (!isset($allProducts[$product->id])) {
                 $allProducts[$product->id] = [
                     'product_name' => $product->product_name,
                     'return_qty' => 0,
                     'return_price' => 0,
                     'return_total' => 0,
                     'sj_qty' => 0,
                     'sj_price' => 0,
                     'sj_total' => 0,
                     'so_qty' => 0,
                     'so_price' => 0,
                     'so_total' => 0,
                     'inv_qty' => 0,
                     'inv_price' => 0,
                     'inv_total' => 0,
                 ];
             }
     
             $allProducts[$product->id]['inv_qty'] = $product->inv_qty ?? 0;
             $allProducts[$product->id]['inv_price'] = $product->inv_price ?? 0;
             $allProducts[$product->id]['inv_total'] = $product->inv_total ?? 0;
         }
     
         // Fetch related sales order data
         $salesorder = SalesOrder::with('outlet', 'customer', 'products', 'products.product', 'returnSalesOrder', 'invoice')->findOrFail($id);
     
         return view('list-order.show', [
             'salesorder' => $salesorder,
             'allProducts' => $allProducts,
             'breadcrumbItems' => $breadcrumbItems,
             'pageTitle' => 'Detail List Order',
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
