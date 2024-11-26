<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\ProductSalesOrder;
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
        if (auth()->user()->hasRole('super-admin')) {
            $salesOrder = QueryBuilder::for(SalesOrder::class)
                ->allowedSorts(['reference_no', 'tanggal', 'outlet_id', 'customer_id', 'due_date', 'grand_total'])
                ->with('outlet', 'customer', 'products', 'products.product', 'products.variant', 'products.batch', 'returnSalesOrder', 'invoice')
                ->where('reference_no', 'like', "%$q%")
                ->with(['outlet', 'customer'])
                ->latest()
                ->paginate($perPage)
                ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);
        } else {
            $salesOrder = QueryBuilder::for(SalesOrder::class)
                ->allowedSorts(['reference_no', 'tanggal', 'outlet_id', 'customer_id', 'due_date', 'grand_total'])
                ->with('outlet', 'customer', 'products', 'products.product', 'returnSalesOrder', 'invoice')
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

        // Return Query
        $returnQuery = "
    SELECT 
        p.id,
        p.name as product_name,
        COALESCE(prso.qty, 0) as return_qty,
        COALESCE(prso.price, 0) as return_price,
        COALESCE(prso.qty * prso.price, 0) as return_total,
        v.name as variant_name,
        b.batch_no as batch_name
    FROM product p
    INNER JOIN product_return_sales_order prso ON p.id = prso.product_id
    INNER JOIN return_sales_order rso ON prso.return_sales_order_id = rso.id
    INNER JOIN sales_orders so ON rso.sales_order_id = so.id
    LEFT JOIN variants v ON prso.variant_id = v.id AND prso.product_id = v.product_id
    LEFT JOIN batches b ON prso.batch_id = b.id AND prso.product_id = b.product_id
    WHERE so.id = ?
";

        // Surat Jalan Query
        $suratJalanQuery = "
    SELECT 
        p.id,
        p.name as product_name,
        COALESCE(psj.qty, 0) as sj_qty,
        COALESCE(psj.unit_price, 0) as sj_price,
        COALESCE(psj.qty * psj.unit_price, 0) as sj_total,
        v.name as variant_name,
        b.batch_no as batch_name
    FROM product p
    INNER JOIN product_surat_jalans psj ON p.id = psj.product_id
    INNER JOIN surat_jalans sj ON psj.surat_jalan_id = sj.id
    INNER JOIN sales_orders so ON sj.sales_order_id = so.id
    LEFT JOIN variants v ON psj.variant_id = v.id AND psj.product_id = v.product_id
    LEFT JOIN batches b ON psj.batch_id = b.id AND psj.product_id = b.product_id
    WHERE so.id = ?
";

        // Sales Order Query
        $salesOrderQuery = "
    SELECT 
        p.id,
        p.name as product_name,
        COALESCE(pso.qty, 0) as so_qty,
        COALESCE(pso.unit_price, 0) as so_price,
        COALESCE(pso.qty * pso.unit_price, 0) as so_total,
        v.name as variant_name,
        b.batch_no as batch_name
    FROM product p
    INNER JOIN product_sales_orders pso ON p.id = pso.product_id
    INNER JOIN sales_orders so ON pso.sales_order_id = so.id
    LEFT JOIN variants v ON pso.variant_id = v.id AND pso.product_id = v.product_id
    LEFT JOIN batches b ON pso.batch_id = b.id AND pso.product_id = b.product_id
    WHERE so.id = ?
";

        // Invoice Query
        $invoiceQuery = "
    SELECT 
        p.id,
        p.name as product_name,
        COALESCE(pi.qty, 0) as inv_qty,
        COALESCE(pi.price, 0) as inv_price,
        COALESCE(pi.qty * pi.price, 0) as inv_total,
        v.name as variant_name,
        b.batch_no as batch_name
    FROM product p
    INNER JOIN product_invoices pi ON p.id = pi.product_id
    INNER JOIN invoices i ON pi.invoice_id = i.id
    LEFT JOIN variants v ON pi.variant_id = v.id AND pi.product_id = v.product_id
    LEFT JOIN batches b ON pi.batch_id = b.id AND pi.product_id = b.product_id
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
                'return_total' => $product->return_total,

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
        $soProducts = DB::select($salesOrderQuery, [$id]);

        $soProducts = ProductSalesOrder::with('variant', 'batch')
            ->where('sales_order_id', $id)
            ->get();

        //  add so products to all products 
        foreach ($soProducts as $product) {
            if (!isset($allProducts[$product->product_id])) {
                $allProducts[$product->product_id] = [
                    'product_name' => $product->product->name,
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

            $allProducts[$product->product_id]['so_qty'] = $product->qty;
            $allProducts[$product->product_id]['so_price'] = $product->unit_price;
            $allProducts[$product->product_id]['so_total'] = $product->total_price;

            if ($product->variant_id) {
                $allProducts[$product->product_id]['variant_name'] = $product->variant->name;
            }
            // batch
            if ($product->batch_id) {
                $allProducts[$product->product_id]['batch_name'] = $product->batch->batch_no;
            }
        }
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
