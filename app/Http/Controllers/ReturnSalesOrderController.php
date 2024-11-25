<?php

namespace App\Http\Controllers;

use App\Models\ReturnSalesOrder;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ReturnSalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbItems = [
            [
                'name' => 'Return Sales Order',
                'url' => route('returnsalesorder.index'),
                'active' => true
            ],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');
        if(auth()->user()->hasRole('super-admin')){
          
        $query = QueryBuilder::for(ReturnSalesOrder::class)
            ->allowedSorts(['return_number','return_date', 'total_qty'])
            ->with(['salesOrder', 'salesOrder.customer', 'salesOrder.outlet', 'salesOrder.user','outlet'])
            ->when($q, function ($query, $q) {
                return $query->where('no_return_sales_order', 'like', "%$q%")
                             ->orWhere('packer', 'like', "%$q%")
                             ->orWhere('driver', 'like', "%$q%");
            })
            ->latest();
            $returnSalesOrder = $query->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);
        }else{
            $query = QueryBuilder::for(ReturnSalesOrder::class)
            ->allowedSorts(['return_number','return_date', 'total_qty'])
            ->with(['salesOrder', 'salesOrder.customer', 'salesOrder.outlet', 'salesOrder.user','outlet'])
            ->when($q, function ($query, $q) {
                return $query->where('no_return_sales_order', 'like', "%$q%")
                             ->orWhere('packer', 'like', "%$q%")
                             ->orWhere('driver', 'like', "%$q%");
            })
            ->where('outlet_id', auth()->user()->outlet_id)
            ->latest();
            $returnSalesOrder = $query->paginate($perPage)
                ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);
        }
        // return $returnSalesOrder;

        return view('return-sales-order.index', [
            'returnSalesOrder' => $returnSalesOrder,
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => 'Return Sales Order',
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
        try {
            $returnSalesOrder = ReturnSalesOrder::with(['productReturnSalesOrder','outlet','productReturnSalesOrder.product'])->findOrFail($id);
            return view('return-sales-order.show', [
                'returnSalesOrder' => $returnSalesOrder,
                'breadcrumbItems' => [
                    [
                        'name' => 'Return Sales Order',
                        'url' => route('returnsalesorder.index'),
                        'active' => false
                    ],
                    [
                        'name' => 'Detail',
                        'url' => route('returnsalesorder.show', $id),
                        'active' => true
                    ],
                ],
                'pageTitle' => 'Detail Return Sales Order',
            ]);
        } catch (\Exception $e) {
            return redirect()->route('returnsalesorder.index')->with('error', 'Data not found');
        }
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
