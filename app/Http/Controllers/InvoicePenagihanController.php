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
        // dd($request->all());
        DB::beginTransaction();
        try {
            $salesOrder = SalesOrder::findOrFail($request->sales_order_id);
            $suratJalan = SuratJalan::where('sales_order_id', $salesOrder->id)->first();
            $invoice = Invoice::create([
                'reference_number' => 'INV/' . date('Ymd') . '/' . $salesOrder->id,
                'sales_order_id' => $salesOrder->id,
                'outlet_id' => $salesOrder->outlet_id,
                'surat_jalan_id' => $suratJalan->id,
                'total_qty' => $request->total_qty,
                'grandtotal' => $request->grandtotal,
                'note' => $request->note,
            ]);
            foreach ($request->products as $product) {
                ProductInvoice::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $product['product_id'],
                    'qty' => $product['invoice_qty'],
                    'price' => $product['price'],
                    'total' => $product['price'] * $product['invoice_qty'],
                ]);
            }

            $salesOrder->update([
                'status' => 'completed'
            ]);
            $returnSalesOrder = ReturnSalesOrder::create([
                'return_number' => 'RET/' . date('Ymd') . '/' . $salesOrder->id,
                'return_date' => date('Y-m-d'),
                'sales_order_id' => $salesOrder->id,
                'outlet_id' => $salesOrder->outlet_id,
                'user_id' => auth()->user()->id,
                'total_qty' => $request->returns['total_qty'],
                'grand_total' => $request->returns['total_grandtotal'],
            ]);
            foreach ($request->returns['products'] as $product) {
                ProductReturnSalesOrder::create([
                    'return_sales_order_id' => $returnSalesOrder->id,
                    'product_id' => $product['product_id'],
                    'qty' => $product['return_qty'],
                    'price' => $product['price'],
                    'total' => $product['subtotal'],
                ]);
            }

            DB::commit();
            return redirect()->route('invoice.index')->with('success', 'Invoice berhasil dibuat');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::with(['salesorder','suratJalan','salesorder.customer','salesorder.products','suratJalan.productSuratJalans','salesorder.returnSalesOrder','salesorder.returnSalesOrder.productReturnSalesOrder', 'outlet', 'productInvoices', 'productInvoices.product'])
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
        $salesOrder = SalesOrder::with(['products', 'products.product'])
            ->findOrFail($salesOrderId);

        $suratJalanProducts =   ProductSuratJalan::whereHas('suratJalan', function ($query) use ($salesOrderId) {
            $query->where('sales_order_id', $salesOrderId);
        })->get(['product_id', 'qty as surat_jalan_qty']);

        $products = $salesOrder->products->map(function ($item) use ($suratJalanProducts) {
            $suratJalanProduct = $suratJalanProducts->where('product_id', $item->product_id)->first();
            return [
                'product_id' => $item->product_id,
                'product' => $item->product,
                'unit_price' => $item->unit_price,
                'qty' => $item->qty,
                'surat_jalan_qty' => $suratJalanProduct ? $suratJalanProduct->surat_jalan_qty : 0
            ];
        });

        return response()->json([
            'products' => $products,
            'salesorder' => $salesOrder,
            'total_qty' => $salesOrder->total_qty,
            'outlet_id' => $salesOrder->outlet_id,
            'grandtotal' => $salesOrder->grandtotal
        ]);
    }
}
