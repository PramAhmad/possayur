<?php

namespace App\Http\Controllers;

use App\Exports\InvoicePurchase as ExportsInvoicePurchase;
use App\Models\InvoicePurchase;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\ProductReturnPurchases;
use App\Models\PurchaseOrder;
use App\Models\ReturnPurchases;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

use Spatie\QueryBuilder\QueryBuilder;

class InvoicePurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbItems = [
            [
                'name' => 'Invoice Purchase',
                'url' => route('invoicepurchase.index'),
                'active' => true
            ],
        ];
        $pageTitle = 'Invoice Purchase';
        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');
        if(auth()->user()->hasRole('super-admin')){
            $outlets = Outlet::all();
            $invoicePurchases = QueryBuilder::for(InvoicePurchase::class)
                ->with(['purchaseOrder', 'purchaseOrder.outlet', 'purchaseOrder.supplier'])
                ->allowedSorts(['invoice_number', 'invoice_date', 'due_date', 'total', 'status'])
                ->latest()
                ->paginate($perPage)
                ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);
        }else{
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->get();
            $invoicePurchases = QueryBuilder::for(PurchaseOrder::class)
                ->where('outlet_id', auth()->user()->outlet_id)
                ->with(['purchaseOrder', 'purchaseOrder.outlet', 'purchaseOrder.supplier'])
                ->allowedSorts(['invoice_number', 'invoice_date', 'due_date', 'total', 'status'])
                ->latest()
                ->paginate($perPage)
                ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);
        }
        // return $invoicePurchases;

        return view('invoicepurchase.index', [
            'invoicePurchases' => $invoicePurchases,
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
        $breadCrumbItems = [
            [
                'name' => 'Invoice Purchase',
                'url' => route('invoicepurchase.index'),
                'active' => false
            ],
            [
                'name' => 'Create',
                'url' => route('invoicepurchase.create'),
                'active' => true
            ],
        ];
        $pageTitle = 'Create Invoice Purchase';

        if(auth()->user()->hasRole('super-admin')){
            $outlets = Outlet::all();
            $purchaseOrders = PurchaseOrder::where('status', "!=", 'completed')->get();
        }else{
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->get();
            $purchaseOrders = PurchaseOrder::where('outlet_id', auth()->user()->outlet_id)->where('status', "!=", 'completed')->get();
        }
        return view('invoicepurchase.create', [
            'breadCrumbItems' => $breadCrumbItems,
            'pageTitle' => $pageTitle,
            'outlets' => $outlets,
            'purchaseOrders' => $purchaseOrders,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
        // dd($request->all());
         try {
             DB::beginTransaction();
             
             $purchase = PurchaseOrder::findOrFail($request->purchase_order_id);
             
             // Create invoice purchase
             $invoicePurchase = InvoicePurchase::create([
                 'user_id' => auth()->user()->id,
                 'purchase_id' => $request->purchase_order_id,
                 'invoice_number' => 'INV-PO/' . date('Ymd') . '/' . rand(1000, 9999),
                 'outlet_id' => $request->outlet_id,
                 'supplier_id' => $purchase->supplier_id,
                 'grand_total' => $request->total_invoice_amount,
                 'total_qty' => $request->total_invoice_qty,
                 'note' => $request->note ?? '-',
                 'total_cost' => $request->total_invoice_amount,
             ]);
             
             // Create invoice purchase products
             foreach ($request->products as $key => $product) {
                 $invoicePurchase->productInvoicePurchases()->create([
                    'invoice_purchase_id' => $invoicePurchase->id,
                     'product_id' => $product['product_id'],
                     'variant_id' => $request->variant_id[$key] ?? null,
                     'batch_id' => $request->batch_id[$key] ?? null,
                     'qty' => $product['invoiced_quantity'],
                     'price' => $product['unit_price'],
                     'total_price' => $product['invoice_amount'],
                 ]);
                //  update stock product
                $p = Product::findOrFail($product['product_id']);
                $p->qty = $p->qty + $product['invoiced_quantity'];
             }
             
             // Create return purchase
             $returnPurchase = ReturnPurchases::create([
                'user_id' => auth()->user()->id,
                 'purchase_id' => $request->purchase_order_id,
                 'return_date' =>now(),
                 'return_number' => 'RET-INV/' . date('Ymd') . '/' . rand(1000, 9999),
                 'outlet_id' => $request->outlet_id,
                 'grand_total' => $request->total_return_amount,
                 'total_qty' => $request->total_return_qty,
                 'note' => $request->note ?? '-',
             ]);
             
             // Create return purchase products
             foreach ($request->products as $key => $product) {
              ProductReturnPurchases::create([
                'return_purchase_id' => $returnPurchase->id,
                 'product_id' => $product['product_id'],
                 'variant_id' => $request->variant_id[$key] ?? null,
                 'batch_id' => $request->batch_id[$key] ?? null,
                 'qty' => $product['return_quantity'],
                 'price' => $product['unit_price'],
                 'total' => $product['return_amount'],
                ]);
             }
             
            $purchase->status = 'completed';
            $purchase->save();  


             DB::commit();
             
             return response()->json([
                 'status' => 'success',
                 'message' => 'Purchase invoice created successfully',
                 'invoice_id' => $invoicePurchase->id,
                 'return_id' => $returnPurchase->id
             ], 201);
             
         } catch (\Exception $e) {
             DB::rollBack();
             Log::error('Purchase Invoice Creation Error: ' . $e->getMessage());
             
             return response()->json([
                 'status' => 'error',
                 'message' => 'Failed to create purchase invoice',
                 'error_details' => $e->getMessage()
             ], 500);
         }
     }
 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $breadCrumbItems = [
            [
                'name' => 'Invoice Purchase',
                'url' => route('invoicepurchase.index'),
                'active' => false
            ],
            [
                'name' => 'Show',
                'url' => route('invoicepurchase.show', $id),
                'active' => true
            ],
        ];
        $pageTitle = 'Show Invoice Purchase';
        $invoicePurchase = InvoicePurchase::with('productInvoicePurchases', 'outlet', 'supplier','productInvoicePurchases.product','productInvoicePurchases.variant','productInvoicePurchases.batch')->findOrFail($id);

        return view('invoicepurchase.show', [
            'breadCrumbItems' => $breadCrumbItems,
            'pageTitle' => $pageTitle,
            'invoice' => $invoicePurchase,
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
    public function getProducts(Request $request, $id)
{
    $invoicePurchase = PurchaseOrder::with('productPurchase', 'productPurchase.product', 'productPurchase.variant', 'productPurchase.batch',
    'outlet')->findOrFail($id);

    $products = $invoicePurchase->productPurchase->map(function ($productPurchase) {
        return [
            'product' => [
                'id' => $productPurchase->product->id,
                'name' => $productPurchase->product->name,
                'cost_price' => $productPurchase->product->cost_price,
                'qty' => $productPurchase->quantity, 
            ],
            'quantity' => $productPurchase->quantity,
        ];
    });

    return response()->json([
        'products' => $products,
        'outlet_id' => $invoicePurchase->outlet_id,
        'supplier_id' => $invoicePurchase->supplier_id,
        'total' => $invoicePurchase->grand_total,
    ]);
}

    public function pdf(string $id)
    {
        $invoicePurchase = InvoicePurchase::with('productInvoicePurchases', 'outlet', 'supplier','productInvoicePurchases.product','productInvoicePurchases.variant','productInvoicePurchases.batch','productInvoicePurchases.product.unit')->findOrFail($id);
        $pdf = PDF::loadView('invoicepurchase.pdf', [
            'invoicePurchase' => $invoicePurchase
        ]);
        return $pdf->download(now().' invoice_purchase.pdf');
    }

    public function export()
    {
      return Excel::download(new ExportsInvoicePurchase, now().'invoice_purchase.xlsx');
    }
}
