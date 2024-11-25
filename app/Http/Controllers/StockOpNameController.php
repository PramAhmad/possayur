<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Product;
use App\Models\StockOpName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

class StockOpNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbItems = [
            [
                'name' => 'Stock Opname',
                'url' => route('stockopname.index'),
                'active' => true
            ],
        ];
        $pageTitle = 'Stock Opname';
        $q = $request->get('q');
        $productId = $request->get('product_id');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');
    
        if(auth()->user()->hasRole('super-admin')){
            $product = Product::all();
            $query = QueryBuilder::for(StockOpName::class)
                ->allowedSorts(['opname_date', 'difference'])
                ->with(['product', 'outlet'])
                ->where('opname_date', 'like', "%$q%");
        } else {
            $product = Product::where('outlet_id', auth()->user()->outlet_id)->get();
            $query = QueryBuilder::for(StockOpName::class)
                ->allowedSorts(['opname_date', 'difference'])
                ->with(['product', 'outlet'])
                ->where('outlet_id', auth()->user()->outlet_id)
                ->where('opname_date', 'like', "%$q%");
        }
    
        // Add product filter if selected
        if ($productId) {
            $query->where('product_id', $productId);
        }
    
        $stockOpNames = $query->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort, 'product_id' => $productId]);
    
        return view('stockopname.index', [
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => $pageTitle,
            'product' => $product,
            'stockOpNames' => $stockOpNames,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbItems = [
            [
                'name' => 'Stock Opname',
                'url' => route('stockopname.index'),
                'active' => false
            ],
            [
                'name' => 'Create Stock Opname',
                'url' => route('stockopname.create'),
                'active' => true
            ],
        ];

        $pageTitle = 'Create Stock Opname';
        if(auth()->user()->hasRole('super-admin')){
            $products = Product::all();
            $outlets = Outlet::all();
        }else{
            $products = Product::where('outlet_id', auth()->user()->outlet_id)->get();
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->get();
        }
        

        return view('stockopname.create', [
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => $pageTitle,
            'products' => $products,
            'outlets' => $outlets,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'opname_date' => 'required|date',
            'outlet_id' => 'required|exists:outlets,id',
            'note' => 'nullable|string',
            'products' => 'required|array|min:1',
            'products.*.product_id' => 'required|exists:product,id',
            'products.*.actual_qty' => 'required|numeric|min:0',
        ]);
    
        DB::beginTransaction();
        try {
            foreach ($request->products as $product) {
                $currentProduct = Product::find($product['product_id']);
                
                StockOpName::create([
                    'product_id' => $product['product_id'],
                    'outlet_id' => $request->outlet_id,
                    'opname_date' => $request->opname_date,
                    'initial_qty' => $currentProduct->qty,
                    'actual_qty' => $product['actual_qty'],
                    'difference' => $product['actual_qty'] - $currentProduct->qty,
                    'note' => $request->note,
                ]);
    
            }
    
        DB::commit();
            return redirect()->route('stockopname.index')
                ->with('message', 'Stock opname created successfully.');
        } catch (\Exception $e) {
            return $e->getMessage();
            DB::rollBack();
            return back()->with('error', 'Error creating stock opname: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function showStock(string $id)
    {
        $stockOpName = StockOpName::with('product','outlet')->findOrFail($id);
        return response()->json($stockOpName);
    }
    public function show(string $id)
    {
        //
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
    // adjust

    public function adjust($id)
    {
        try {
            DB::beginTransaction();

            $stockOpname = StockOpname::with('product')
                ->findOrFail($id);
            // dd($stockOpname->actual_qty);
            if ($stockOpname->difference == 0) {
                return response()->json([
                    'message' => 'No adjustment needed'
                ]);
            }
            $product = Product::find($stockOpname->product_id);
            dd($product->qty);
            $stockOpname->update([
                'difference' => $stockOpname->actual_qty - $stockOpname->initial_qty
            ]);
     
            DB::commit();

            return redirect()->back()->with('message', 'Stock opname adjusted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to adjust stock opname',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
