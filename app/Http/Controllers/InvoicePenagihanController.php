<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Outlet;
use App\Models\ProductInvoice;
use App\Models\ProductReturnSalesOrder;
use App\Models\ProductSuratJalan;
use App\Models\ReturnSalesOrder;
use App\Models\SalesOrder;
use App\Models\SuratJalan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\QueryBuilder\QueryBuilder;

class InvoicePenagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbItems = [
            [
                'name' => 'Invoice Penagihan',
                'url' => route('invoice.index'),
                'active' => true
            ],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $query = QueryBuilder::for(Invoice::class)
            ->allowedSorts(['reference_number', 'created-at'])
            ->with(['salesorder', 'outlet'])
            ->when($q, function ($query, $q) {
                return $query->where('no_invoice', 'like', "%$q%");
            })
            ->latest();

        $invoices = $query->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('invoice-penagihan.index', [
            'invoices' => $invoices,
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => 'Invoice Penagihan',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbItems = [
            [
                'name' => 'Invoice Penagihan',
                'url' => route('invoice.index'),
                'active' => false
            ],
            [
                'name' => 'Tambah Invoice Penagihan',
                'url' => route('invoice.create'),
                'active' => true
            ],
        ];
        if (auth()->user()->hasRole('super-admin')) {
            $outlets = Outlet::all();
            $salesOrders = SalesOrder::all();
        } else {
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->first();
            $salesOrders = SalesOrder::where('outlet_id', auth()->user()->outlet_id)->get();
        }

        return view('invoice-penagihan.create', [
            'outlets' => $outlets,
            'salesOrders' => $salesOrders,
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => 'Tambah Invoice Penagihan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'sales_order_id' => 'required|exists:sales_orders,id',
            'total_qty' => 'required|numeric',
            'grandtotal' => 'required|numeric',
            'note' => 'nullable|string',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:product,id',
            'products.*.invoice_qty' => 'required|numeric',
            'returns' => 'nullable|array',
            'returns.total_qty' => 'nullable|numeric',
            'returns.total_grandtotal' => 'nullable|numeric',
            'returns.products' => 'nullable|array',
            'returns.products.*.product_id' => 'required|exists:product,id',
            'returns.products.*.return_qty' => 'required|numeric',
        ]);
    
        DB::beginTransaction();
        try {
            $salesOrder = SalesOrder::findOrFail($request->sales_order_id);
            $suratJalan = SuratJalan::where('sales_order_id', $salesOrder->id)->first();
            
            // Create Invoice
            $invoice = Invoice::create([
                'reference_number' => 'INV/' . date('Ymd') . '/' . $salesOrder->id,
                'sales_order_id' => $salesOrder->id,
                'outlet_id' => $salesOrder->outlet_id,
                'surat_jalan_id' => $suratJalan->id,
                'total_qty' => $request->total_qty,
                'grandtotal' => $request->grandtotal,
                'note' => $request->note,
            ]);
            
            // Create ProductInvoice records
            foreach ($request->products as $product) {
                ProductInvoice::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $product['product_id'],
                    'qty' => $product['invoice_qty'],
                    'price' => $product['price'],
                    'total' => $product['price'] * $product['invoice_qty'],
                    'variant_id' => $product['variant_id'] ?? null,
                    'batch_id' => $product['batch_id'] ?? null,
                ]);
            }
    
            // Update SalesOrder status
            $salesOrder->update([
                'status' => 'completed'
            ]);
            
            // Create ReturnSalesOrder if returns exist
            if ($request->has('returns') && !empty($request->returns['products'])) {
                $returnSalesOrder = ReturnSalesOrder::create([
                    'return_number' => 'RET/' . date('Ymd') . '/' . $salesOrder->id,
                    'return_date' => date('Y-m-d'),
                    'sales_order_id' => $salesOrder->id,
                    'outlet_id' => $salesOrder->outlet_id,
                    'user_id' => auth()->user()->id,
                    'total_qty' => $request->returns['total_qty'],
                    'grand_total' => $request->returns['total_grandtotal'],
                ]);
                
                // Create ProductReturnSalesOrder records
                foreach ($request->returns['products'] as $product) {
                    ProductReturnSalesOrder::create([
                        'return_sales_order_id' => $returnSalesOrder->id,
                        'product_id' => $product['product_id'],
                        'qty' => $product['return_qty'],
                        'price' => $product['price'],
                        'total' => $product['subtotal'],
                        'variant_id' => $product['variant_id'] ?? null,
                        'batch_id' => $product['batch_id'] ?? null,
                    ]);
                }
            }
    
            // Commit transaction
            DB::commit();
    
            return redirect()->route('invoice.index')->with('success', 'Invoice berhasil dibuat');
        } catch (\Exception $e) {
            return $e->getMessage();
            Log::error('Error in store method: ' . $e->getMessage());
    
            // Rollback transaction and return error response
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::with(['salesorder','suratJalan','salesorder.customer','salesorder.products','suratJalan.productSuratJalans','salesorder.returnSalesOrder','salesorder.returnSalesOrder.productReturnSalesOrder', 'outlet', 'productInvoices', 'productInvoices.product','productInvoices.variant','productInvoices.batch'])
            ->findOrFail($id);
            // return $invoice;

        $breadcrumbItems = [
            [
                'name' => 'Invoice Penagihan',
                'url' => route('invoice.index'),
                'active' => false
            ],
            [
                'name' => 'Detail Invoice Penagihan',
                'url' => route('invoice.show', $id),
                'active' => true
            ],
        ];

        return view('invoice-penagihan.show', [
            'invoice' => $invoice,
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => 'Detail Invoice Penagihan',
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
        try {
            $invoice = Invoice::findOrFail($id);
            $invoice->delete();
            return redirect()->back()->with('success', 'Invoice berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function getProducts($salesOrderId)
    {
        $salesOrder = SalesOrder::with([
            'products', 
            'products.product', 
            'products.product.unit', 
            'products.variant', 
            'products.batch',
        ])->findOrFail($salesOrderId);
    
        $suratJalanProducts = ProductSuratJalan::whereHas('suratJalan', function ($query) use ($salesOrderId) {
            $query->where('sales_order_id', $salesOrderId);
        })->get();

        $products = $salesOrder->products->map(function ($item) use ($suratJalanProducts) {
            $suratJalanProduct = $suratJalanProducts
                ->where('product_id', $item->product_id)
                ->where('variant_id', $item->variant_id)
                ->where('batch_id', $item->batch_id)
                ->first();
    
            return [
                'product_id' => $item->product_id,
                'variant_id' => $item->variant_id,
                'batch_id' => $item->batch_id,
                'product' => $item->product,
                'variant' => $item->variant,
                'batch' => $item->batch,    
                'unit_price' => $item->unit_price,
                'qty' => $item->qty,
                'surat_jalan_qty' => $suratJalanProduct ? $suratJalanProduct->qty : 0
            ];
        });
    
        return response()->json([
            'products' => $products,
            'salesorder' => $salesOrder,
            'total_qty' => $salesOrder->total_qty,
            'outlet_id' => $salesOrder->outlet_id,
        ]);
    }
}
