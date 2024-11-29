<?php

namespace App\Http\Controllers;

use App\Models\Curency;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CurencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbItems = [
            [
                'name' => 'Setting',
                'url' => route('dashboard.index'),
                'active' => false
            ],
            [
                'name' => 'Curency',
                'url' => route('curency.index'),
                'active' => true
            ],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');
        if(auth()->user()->hasRole('super-admin')){
            $curencies = QueryBuilder::for(Curency::class)
            ->with('outlet')
                ->allowedSorts(['name', 'symbol', 'code', 'is_active'])
                ->where('name', 'like', "%$q%")
                ->orderBy('is_active', 'desc')
                ->latest()
                ->paginate($perPage)
                ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);
        }else{
            $curencies = QueryBuilder::for(Curency::class)
                ->allowedSorts(['name', 'symbol', 'code', 'is_active'])
                ->with('outlet')
                ->where('name', 'like', "%$q%")
                ->where('outlet_id', auth()->user()->outlet_id)
                ->orderBy('is_active', 'desc')
                ->latest()
                ->paginate($perPage)
                ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);
        }

        return view('curency.index', [
            'curencies' => $curencies,
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => 'Curency',
            'perPage' => $perPage,
            'q' => $q,
            'sort' => $sort,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->hasRole('super-admin')){
            $outlets = Outlet::all();
        }else{
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->get();
        }
        return view('curency.create', [
            'breadcrumbItems' => [
                [
                    'name' => 'Setting',
                    'url' => route('dashboard.index'),
                    'active' => false
                ],
                [
                    'name' => 'Curency',
                    'url' => route('curency.index'),
                    'active' => false
                ],
                [
                    'name' => 'Create',
                    'url' => route('curency.create'),
                    'active' => true
                ],
            ],
            'pageTitle' => 'Create Curency',
            'outlets' => $outlets,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'symbol' => 'required',
            'code' => 'required',
            'outlet_id' => 'required',
        ]);

        Curency::create([
            'name' => $request->name,
            'symbol' => $request->symbol,
            'code' => $request->code,
            'is_active' => false,
            'outlet_id' => $request->outlet_id,
        ]);

        return redirect()->route('curency.index')->with('message', 'Curency created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $currency = Curency::find($id);
        if(auth()->user()->hasRole('super-admin')){
            $outlets = Outlet::all();
        }else{
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->get();
        }
        return view('curency.edit', [
            'currency' => $currency,
            'breadcrumbItems' => [
                [
                    'name' => 'Setting',
                    'url' => route('dashboard.index'),
                    'active' => false
                ],
                [
                    'name' => 'Curency',
                    'url' => route('curency.index'),
                    'active' => false
                ],
                [
                    'name' => 'Edit',
                    'url' => route('curency.edit', $id),
                    'active' => true
                ],
            ],
            'pageTitle' => 'Edit Curency',
            'outlets' => $outlets,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'symbol' => 'required',
            'code' => 'required',
            'outlet_id' => 'required',
        ]);

        $currency = Curency::find($id);
        $currency->update([
            'name' => $request->name,
            'symbol' => $request->symbol,
            'code' => $request->code,
            
            'outlet_id' => $request->outlet_id,
        ]);

        return redirect()->route('curency.index')->with('message', 'Curency updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $currency = Curency::find($id);
        $currency->delete();

        return redirect()->route('curency.index')->with('message', 'Curency deleted successfully.');
    }

    public function makeActive(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $currency = Curency::find($request->id);
        $currency->update(['is_active' => true]);
        Curency::where('id', '!=', $request->id)->update(['is_active' => false]);

        return redirect()->route('curency.index')->with('message', 'Curency updated successfully.');
    }
}
