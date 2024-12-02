<?php

namespace App\Http\Controllers;

use App\Models\ReturnPurchases;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ReturnPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbItems = [
            [
                'name' => 'Return Purchase',
                'url' => route('returnpurchase.index'),
                'active' => true
            ],
        ];

        $pageTitle = 'Return Purchase';

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        if(auth()->user()->hasRole('super-admin')){
            $returnPurchases = QueryBuilder::for(ReturnPurchases::class)
                ->allowedSorts(['return_number', 'return_date', 'total_qty'])
                ->with(['purchaseOrder', 'purchaseOrder.supplier', 'purchaseOrder.outlet'])
                ->when($q, function ($query, $q) {
                    return $query->where('return_number', 'like', "%$q%")
                                 ->orWhere('packer', 'like', "%$q%")
                                 ->orWhere('driver', 'like', "%$q%");
                })
                ->latest()
                ->paginate($perPage)
                ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);
        }else{
            $returnPurchases = QueryBuilder::for(ReturnPurchases::class)
                ->allowedSorts(['return_number', 'return_date', 'total_qty'])
                ->with(['purchaseOrder', 'purchaseOrder.supplier', 'purchaseOrder.outlet'])
                ->when($q, function ($query, $q) {
                    return $query->where('return_number', 'like', "%$q%")
                                 ->orWhere('packer', 'like', "%$q%")
                                 ->orWhere('driver', 'like', "%$q%");
                })
                ->where('outlet_id', auth()->user()->outlet_id)
                ->latest()
                ->paginate($perPage)
                ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);
        }

        return view('returnpurchase.index', [
            'returnPurchases' => $returnPurchases,
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => $pageTitle,
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
    public function show(string $id)
    {
        $breadcrumbItems = [
            [
                'name' => 'Return Purchase',
                'url' => route('returnpurchase.index'),
                'active' => false
            ],
            [
                'name' => 'Detail',
                'url' => route('returnpurchase.show', $id),
                'active' => true
            ],
        ];

        $returnPurchase = ReturnPurchases::with(['purchaseOrder', 'purchaseOrder.supplier', 'purchaseOrder.outlet', 'productReturnPurchases', 'productReturnPurchases.product','productReturnPurchases.variant','productReturnPurchases.batch'])
            ->findOrFail($id);

        return view('returnpurchase.show', [
            'returnPurchase' => $returnPurchase,
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => 'Detail Return Purchase',
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
