<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\QueryBuilder\QueryBuilder;

class UnitController extends Controller
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
                'name' => 'Unit',
                'url' => route('unit.index'),
                'active' => true
            ],
        ];
    
        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');
    
        if (auth()->user()->hasRole('super-admin')) {
            $outlets = Outlet::all();
            $units = QueryBuilder::for(Unit::class)
                ->allowedSorts(['name', 'code', 'base_unit', 'operator', 'operation_value', 'is_active'])
                ->where(function ($query) use ($q) {
                    $query->where('name', 'like', "%$q%")
                        ->orWhere('code', 'like', "%$q%")
                        ->orWhere('base_unit', 'like', "%$q%");
                })
                ->latest()
                ->paginate($perPage)
                ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);
        } else {
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->get();
            $units = QueryBuilder::for(Unit::class)
                ->allowedSorts(['name', 'code', 'base_unit', 'operator', 'operation_value', 'is_active'])
                ->where(function ($query) use ($q) {
                    $query->where('name', 'like', "%$q%")
                        ->orWhere('code', 'like', "%$q%")
                        ->orWhere('base_unit', 'like', "%$q%");
                })
                ->where('outlet_id', auth()->user()->outlet_id)
                ->latest()
                ->paginate($perPage)
                ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);
        }
    
        return view('unit.index', [
            'units' => $units,
            'outlets' => $outlets,
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => 'Unit',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Create Unit";
        $breadcrumbItems = [
            [
                'name' => 'Dashboard',
                'url' => route('dashboard.index'),
                'active' => false
            ],
            [
                'name' => 'Unit',
                'url' => route('unit.create'),
                'active' => true
            ],
        ];
        if(auth()->user()->hasRole('super-admin')){
            $outlets = Outlet::all();
        }else{
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->get();
        }

        return view('unit.create',[
            'outlets' => $outlets,
            'pageTitle' => $pageTitle,
            'breadcrumbItems' => $breadcrumbItems,
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
        $validated = $request->validate([
            'outlet_id' => 'nullable|exists:outlets,id',
            'code' => [
                'required',
                'string',
                'max:255',
                Rule::unique('units')->where(function ($query) use ($request) {
                    return $query->where('outlet_id', $request->outlet_id);
                })
            ],
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('units')->where(function ($query) use ($request) {
                    return $query->where('outlet_id', $request->outlet_id);
                })
            ],
            'base_unit' => 'required|string|max:255',
            'operator' => 'required|in:*,/,+,-',
            'operation_value' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($request) {
                    if (!is_numeric($value)) {
                        $fail(__('The operation value must be a number.'));
                    }                    
                    if ($request->operator === '/' && $value == 0) {
                        $fail(__('Cannot divide by zero.'));
                    }
                },
            ],
            'is_active' => 'required|in:0,1',
        ], [
            'code.unique' => __('This code is already used in the selected outlet.'),
            'name.unique' => __('This name is already used in the selected outlet.'),
        ]);
    
        try {
            if (!auth()->user()->hasRole('super-admin')) {
                $validated['outlet_id'] = auth()->user()->outlet_id;
            }
            
            $validated['operation_value'] = (string)floatval($validated['operation_value']);            
            Unit::create($validated);
            return redirect()
                ->route('unit.index')
                ->with('message', __('Unit created successfully.'));
    
        } catch (\Exception $e) {
            dd( $e->getMessage());
    
            // Redirect back with error
            return redirect()
                ->back()
                ->withInput()
                ->with('error', __('Failed to create unit. Please try again.'));
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
