<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\Suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $q = $request->input('q', ''); 
        $perPage = $request->input('per_page', 10); 
        $sort = $request->input('sort', 'latest'); 

        
        $breadcrumbItems = [
            [
                'name' => 'Settings',
                'url' => '/general-settings',
                'active' => false
            ],
            [
                'name' => 'Purchase Order',
                'url' => route('purchaseorder.index'),
                'active' => true
            ],
        ];
        $pageTitle = 'Purchase Order';
        
        $purchaseOrders = QueryBuilder::for(PurchaseOrder::class)
            ->allowedSorts(['reference_no', 'total_cost', 'grand_total', 'status', 'created_at'])
            ->allowedFilters([
                AllowedFilter::partial('reference_no'),
                AllowedFilter::partial('status'),      
            ])
            ->with(['supplier', 'user', 'outlet']) 
            ->where('reference_no', 'like', "%$q%") 
            ->latest() 
            ->paginate($perPage) 
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]); 

            return view('purchaseorder.index', [
                'purchaseOrders' => $purchaseOrders,
                'breadcrumbItems' => $breadcrumbItems,
                'pageTitle' => $pageTitle,
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
                'name' => 'Settings',
                'url' => '/general-settings',
                'active' => false
            ],
            [
                'name' => 'Purchase Order',
                'url' => route('purchaseorder.index'),
                'active' => false
            ],
            [
                'name' => 'Create',
                'url' => route('purchaseorder.create'),
                'active' => true
            ],
        ];
        $pageTitle = 'Create Purchase Order';
        $user = auth()->user();
        if ($user->getRoleNames()[0] == 'super-admin') {
            $outlets = Outlet::all();
        } else {
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->get();
        }
        $suppliers = Suplier::all();
        $products = Product::all();
        
        return view('purchaseorder.create', [
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => $pageTitle,
            'outlets' => $outlets,
            'suppliers' => $suppliers,
            'products' => $products,
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
            'outlet_id' => 'required|exists:outlets,id',
            'suplier_id' => 'required|exists:supliers,id',
            'note' => 'required|string',
            'product_id' => 'required|array',
            'product_id.*' => 'required|exists:products,id',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer',
        ],[
            'product_id.*.required' => 'The product field is required.',
            'product_id.*.exists' => 'The selected product is invalid.',
            'quantity.*.required' => 'The quantity field is required.',
            'quantity.*.integer' => 'The quantity must be an integer.',
            'outlet_id.required' => 'The outlet field is required.',
            'outlet_id.exists' => 'The selected outlet is invalid.',
            'suplier_id.required' => 'The supplier field is required.',
            'suplier_id.exists' => 'The selected supplier is invalid.',
            'note.required' => 'The note field is required.',
            'note.string' => 'The note must be a string.',
            'product_id.required' => 'The product field is required.',
            'quantity.required' => 'The quantity field is required.',
        ]);

        try{
            DB::beginTransaction();
            PurchaseOrder::create([
                'reference_no' => 'PO-'.time(),
                'user_id' => auth()->id(),
                'outlet_id' => $request->outlet_id,
                'suplier_id' => $request->suplier_id,
                'note' => $request->note,
                'status' => 'pending',
                'total_qty' => array_sum($request->quantity),
                'total_cost' => 0,
                'grand_total' => 0,
            ]);

            $purchaseOrder = PurchaseOrder::latest()->first();
            for ($i=0; $i < count($request->product_id); $i++) { 
                $product = Product::find($request->product_id[$i]);
                $purchaseOrder->products()->attach($product->id, [
                    'quantity' => $request->quantity[$i],
                    'cost' => $product->cost_price,
                    'total_cost' => $product->cost_price * $request->quantity[$i],
                ]);
                $purchaseOrder->update( [
                    'total_cost' => $purchaseOrder->total_cost + ($product->cost_price * $request->quantity[$i]),
                    'grand_total' => $purchaseOrder->total_cost,
                ]);
            }
        }catch(\Exception $e){
            DB::rollBack();
            return $e;
            return redirect()->back()->with('error', $e->getMessage());
        }    
        DB::commit();
        return redirect()->route('purchaseorder.index')->with('success', 'Purchase Order created successfully'); 
    }

    /**
     * Display the specified resource.
     *
     * @param     int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
