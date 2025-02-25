<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\ProductSalesOrder;
use App\Models\ProductSuratJalan;
use App\Models\SalesOrder;
use App\Models\SuratJalan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            ->with(['salesorder.products.product', 'salesorder.outlet', 'salesorder.customer', 'productSuratJalans.product'])
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
        $salesOrder = SalesOrder::with(['products','products.product','products.variant','products.batch','products.product.unit'])->findOrFail($salesOrderId);
        
        return response()->json([
            'products' => $salesOrder->products,
            'outlet_id' => $salesOrder->outlet_id,
  
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
        $request->validate([
            'sales_order_id' => [
                'required',
                'exists:sales_orders,id',
            ],
            'packer' => [
                'required',
                'string',
                'max:255',
            ],
            'driver' => [
                'required',
                'string',
                'max:255',
            ],
            'due_date' => [
                'required',
                'date',
                'after_or_equal:today',
            ],
            'summary.total_adjusted_qty' => [
                'nullable',
                'integer',
                'min:0',
            ],
            'summary.total_adjusted_amount' => [
                'nullable',
                'numeric',
                'min:0',
            ],
            'products' => [
                'required',
                'array',
                'min:1',
            ],
            'products.*.product_id' => [
                'required',
                'exists:product,id',
            ],
            'products.*.adjusted_qty' => [
                'required',
                'integer',
                'min:1',
            ],
            'products.*.unit_price' => [
                'required',
                'numeric',
                'min:0',
            ],
            'products.*.adjusted_subtotal' => [
                'required',
                'numeric',
                'min:0',
            ],
            'products.*.variant_id' => [
                'nullable',
                'exists:variants,id',
            ],
            'products.*.batch_id' => [
                'nullable',
                'exists:batches,id',
            ],
        ], [
            'sales_order_id.required' => 'The sales order field is required.',
            'sales_order_id.exists' => 'The selected sales order is invalid.',
            'packer.required' => 'The packer field is required.',
            'packer.string' => 'The packer must be a string.',
            'packer.max' => 'The packer may not be greater than 255 characters.',
            'driver.required' => 'The driver field is required.',
            'driver.string' => 'The driver must be a string.',
            'driver.max' => 'The driver may not be greater than 255 characters.',
            'due_date.required' => 'The due date field is required.',
            'due_date.date' => 'The due date must be a date.',
            'due_date.after_or_equal' => 'The due date must be a date after or equal to today.',
            'summary.total_adjusted_qty.integer' => 'The total adjusted qty must be an integer.',
            'summary.total_adjusted_qty.min' => 'The total adjusted qty must be at least 0.',
            'summary.total_adjusted_amount.numeric' => 'The total adjusted amount must be a number.',
            'summary.total_adjusted_amount.min' => 'The total adjusted amount must be at least 0.',
            'products.required' => 'The products field is required.',
            'products.array' => 'The products must be an array.',
            'products.min' => 'The products must have at least 1 item.',
            'products.*.product_id.required' => 'The product id field is required.',
            'products.*.product_id.exists' => 'The selected product id is invalid.',
            'products.*.adjusted_qty.required' => 'The adjusted qty field is required.',
            'products.*.adjusted_qty.integer' => 'The adjusted qty must be an integer.',
            'products.*.adjusted_qty.min' => 'The adjusted qty must be at least 1.',
            'products.*.unit_price.required' => 'The unit price field is required.',
            'products.*.unit_price.numeric' => 'The unit price must be a number.',
            'products.*.unit_price.min' => 'The unit price must be at least 0.',
            'products.*.adjusted_subtotal.required' => 'The adjusted subtotal field is required.',
            'products.*.adjusted_subtotal.numeric' => 'The adjusted subtotal must be a number.',
            'products.*.adjusted_subtotal.min' => 'The adjusted subtotal must be at least 0.',
            'products.*.variant_id.exists' => 'The selected variant id is invalid.',
            'products.*.batch_id.exists' => 'The selected batch id is invalid.',

        ]);
    
        DB::beginTransaction(); 
        try{
            $suratJalan = SuratJalan::create([
            'sales_order_id' => $request->sales_order_id,
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
                   'variant_id' => $product['variant_id'],
                    'batch_id' => $product['batch_id'],
               ]);
            }
            DB::commit();
        return response()->json(['id' => $suratJalan->id], 201);
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
            return redirect()->back()->with('error', $e->getMessage());
        }
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
        $suratJalan = SuratJalan::with(['salesorder.products.product','salesorder.products.variant','salesorder.products.batch','salesorder.outlet','salesorder.customer','productSuratJalans.product','productSuratJalans.variant','productSuratJalans.batch'])->findOrFail($id);
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
        $breadcrumbItems = [
            [
                'name' => 'Surat Jalan',
                'url' => route('suratjalan.index'),
                'active' => false
            ],
            [
                'name' => 'Edit',
                'url' => route('suratjalan.edit', $id),
                'active' => true
            ],
        ];
        $suratJalan = SuratJalan::with(['salesorder.products.product','salesorder.outlet','salesorder.customer','productSuratJalans.product'])->findOrFail($id)->first();
        if (auth()->user()->hasRole('super-admin')) {
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->get();
            $salesOrder = SalesOrder::where('status', '=' ,'pending')->get();
            $productSalesOrders = ProductSalesOrder::all();
        }else{
            $outlets = Outlet::all();
            $salesOrder = SalesOrder::where('outlet_id', auth()->user()->outlet_id)->get();
            $productSalesOrders = ProductSalesOrder::all();
        }
        // return $suratJalan;
        return view('suratjalan.edit', [
            'suratJalan' => $suratJalan,
            'breadcrumbItems' => $breadcrumbItems,
            'salesOrder' => $salesOrder,
            'outlets' => $outlets,
            'productSalesOrders' => $productSalesOrders,
            'pageTitle' => 'Edit Surat Jalan',
        ]);
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
        $request->validate([
            'sales_order_id' => [
                'required',
                'exists:sales_orders,id',
            ],
            'packer' => [
                'required',
                'string',
                'max:255',
            ],
            'driver' => [
                'required',
                'string',
                'max:255',
            ],
            'due_date' => [
                'required',
                'date',
                'after_or_equal:today',
            ],
            'summary.total_adjusted_qty' => [
                'nullable',
                'integer',
                'min:0',
            ],
            'summary.total_adjusted_amount' => [
                'nullable',
                'numeric',
                'min:0',
            ],
            'products' => [
                'required',
                'array',
                'min:1',
            ],
            'products.*.product_id' => [
                'required',
                'exists:product,id',
            ],
            'products.*.adjusted_qty' => [
                'required',
                'integer',
                'min:1',
            ],
            'products.*.unit_price' => [
                'required',
                'numeric',
                'min:0',
            ],
            'products.*.adjusted_subtotal' => [
                'required',
                'numeric',
                'min:0',
            ],
            'products.*.variant_id' => [
                'nullable',
                'exists:variants,id',
            ],
            'products.*.batch_id' => [
                'nullable',
                'exists:batches,id',
            ],
        ], [
            'sales_order_id.required' => 'The sales order field is required.',
            'sales_order_id.exists' => 'The selected sales order is invalid.',
            'packer.required' => 'The packer field is required.',
            'packer.string' => 'The packer must be a string.',
            'packer.max' => 'The packer may not be greater than 255 characters.',
            'driver.required' => 'The driver field is required.',
            'driver.string' => 'The driver must be a string.',
            'driver.max' => 'The driver may not be greater than 255 characters.',
            'due_date.required' => 'The due date field is required.',
            'due_date.date' => 'The due date must be a date.',
            'due_date.after_or_equal' => 'The due date must be a date after or equal to today.',
            'summary.total_adjusted_qty.integer' => 'The total adjusted qty must be an integer.',
            'summary.total_adjusted_qty.min' => 'The total adjusted qty must be at least 0.',
            'summary.total_adjusted_amount.numeric' => 'The total adjusted amount must be a number.',
            'summary.total_adjusted_amount.min' => 'The total adjusted amount must be at least 0.',
            'products.required' => 'The products field is required.',
            'products.array' => 'The products must be an array.',
            'products.min' => 'The products must have at least 1 item.',
            'products.*.product_id.required' => 'The product id field is required.',
            'products.*.product_id.exists' => 'The selected product id is invalid.',
            'products.*.adjusted_qty.required' => 'The adjusted qty field is required.',
            'products.*.adjusted_qty.integer' => 'The adjusted qty must be an integer.',
            'products.*.adjusted_qty.min' => 'The adjusted qty must be at least 1.',
            'products.*.unit_price.required' => 'The unit price field is required.',
            'products.*.unit_price.numeric' => 'The unit price must be a number.',
            'products.*.unit_price.min' => 'The unit price must be at least 0.',
            'products.*.adjusted_subtotal.required' => 'The adjusted subtotal field is required.',
            'products.*.adjusted_subtotal.numeric' => 'The adjusted subtotal must be a number.',
            'products.*.adjusted_subtotal.min' => 'The adjusted subtotal must be at least 0.',
            'products.*.variant_id.exists' => 'The selected variant id is invalid.',
            'products.*.batch_id.exists' => 'The selected batch id is invalid.',

        ]);
        try {
            $suratJalan = SuratJalan::findOrFail($id);
            $suratJalan->update([
                'sales_order_id' => $request->sales_order_id,
                'packer' => $request->packer,
                'driver' => $request->driver,
                'due_date' => $request->due_date,
                'total_qty' => $request->summary['total_adjusted_qty'] ?? 0, 
                'grand_total' => $request->summary['total_adjusted_amount'] ?? 0,
            ]);
    
            foreach($request->products as $product) {
                $productSuratJalan = ProductSuratJalan::where('surat_jalan_id', $id)
                    ->where('product_id', $product['product_id'])
                    ->first();
    
                if ($productSuratJalan) {
                    $productSuratJalan->update([
                        'product_id' => $product['product_id'],
                        'qty' => $product['adjusted_qty'],
                        'unit_price' => $product['unit_price'],
                        'total_price' => $product['adjusted_subtotal'],
                        'variant_id' => $product['variant_id'],
                        'batch_id' => $product['batch_id'],
                    ]);
                } else {
                    ProductSuratJalan::create([
                        'surat_jalan_id' => $id,
                        'product_id' => $product['product_id'],
                        'qty' => $product['adjusted_qty'],
                        'unit_price' => $product['unit_price'],
                        'total_price' => $product['adjusted_subtotal'],
                        'variant_id' => $product['variant_id'],
                        'batch_id' => $product['batch_id'],
                    ]);
                }
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    
        return redirect()->back()->with('success', 'Surat Jalan updated successfully');
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
