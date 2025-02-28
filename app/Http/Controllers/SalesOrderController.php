<?php

namespace App\Http\Controllers;

use App\Models\SalesOrder;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class SalesOrderController extends Controller
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
                'name' => 'Dashboard',
                'url' => route('dashboard.index'),
                'active' => false
            ],
            [
                'name' => 'Sales Order',
                'url' => route('salesorder.index'),
                'active' => true
            ],
        ];
        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        if(auth()->user()->hasRole('super-admin')){
            $salesOrder = QueryBuilder::for(SalesOrder::class)
                ->allowedSorts(['reference_no', 'tanggal', 'outlet_id', 'customer_id', 'due_date','grand_total'])
                ->where('reference_no', 'like', "%$q%")
                ->orWhere('status', 'like', "%$q%")
                ->with(['outlet', 'customer'])
                ->latest()
                ->paginate($perPage)
                ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        }else{
            $salesOrder = SalesOrder::where('outlet_id', auth()->user()->outlet_id)->get();
        }
        // return $salesOrder;
        return view('salesorder.index', [
            'salesOrders' => $salesOrder,
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => 'Sales Order',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
                'name' => 'Dashboard',
                'url' => route('dashboard.index'),
                'active' => false
            ],
            [
                'name' => 'Sales Order',
                'url' => route('salesorder.index'),
                'active' => false
            ],
            [
                'name' => 'Detail Sales Order',
                'url' => route('salesorder.show', $id),
                'active' => true
            ],
        ];
        $salesOrder = SalesOrder::with('outlet', 'customer', 'products', 'products.product', 'returnSalesOrder', 'invoice','products.variant','products.batch')->find($id);
        return view('salesorder.show', [
            'salesOrder' => $salesOrder,
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => 'Detail Sales Order',
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
