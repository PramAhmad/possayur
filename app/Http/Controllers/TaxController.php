<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use App\Models\Outlet;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;

class TaxController extends Controller
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
                'name' => 'Setting',
                'url' => route('dashboard.index'),
                'active' => false
            ],
            [
                'name' => 'Tax',
                'url' => route('tax.index'),
                'active' => true
            ],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');
    
        if(auth()->user()->hasRole('super-admin')){
            $outlets = Outlet::all();
            $taxes = QueryBuilder::for(Tax::class)
                ->allowedSorts(['name', 'rate', 'is_active'])
                ->where('name', 'like', "%$q%")
                ->with('outlet')
                ->orderBy('is_active', 'desc')
                ->latest()
                ->paginate($perPage)
                ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);
        } else {
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->get();
            $taxes = QueryBuilder::for(Tax::class)
                ->allowedSorts(['name', 'rate', 'is_active'])
                ->where('name', 'like', "%$q%")
                ->where('outlet_id', auth()->user()->outlet_id)
                ->with('outlet')
                ->orderBy('is_active', 'desc')
                ->latest()
                ->paginate($perPage)
                ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);
        }

        return view('tax.index', [
            'taxes' => $taxes,
            'outlets' => $outlets,
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => 'Tax',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'Tax';
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false],
            ['name' => 'Tax', 'url' => route('tax.index'), 'active' => false],
            ['name' => 'Create Tax', 'url' => route('tax.create'), 'active' => true]
        ];

        if(auth()->user()->hasRole('super-admin')){
            $data['outlets'] = Outlet::all();
        } else {
            $data['outlets'] = Outlet::where('id', auth()->user()->outlet_id)->get();
        }

        return view('tax.create', $data);
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
            'name' => 'required|string|max:255',
            'rate' => 'required|numeric|min:0|max:100',
            'outlet_id' => 'required|exists:outlets,id',    
        ], [
            'name.required' => 'Name wajib di isi',
            'name.max' => 'Name maksimal 255 karakter',
            'name.string' => 'Name harus berupa string',
            'rate.required' => 'Rate wajib di isi',
            'rate.numeric' => 'Rate harus berupa angka',
            'rate.min' => 'Rate minimal 0',
            'rate.max' => 'Rate maksimal 100',
            'outlet_id.required' => 'Outlet wajib di isi',
            'outlet_id.exists' => 'Outlet tidak ditemukan',

        ]);

        Tax::create([
            
            'name' => $request->name,
            'rate' => $request->rate,
            'is_active' => false,
            'outlet_id' => $request->outlet_id,
        ]);
     

        return redirect()->back()->with('message', 'Tax berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tax = Tax::find($id);
        $data['pageTitle'] = 'Tax';
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false],
            ['name' => 'Tax', 'url' => route('tax.index'), 'active' => false],
            ['name' => 'Show Tax', 'url' => route('tax.show', $id), 'active' => true]
        ];

        return view('tax.show', compact('tax'), $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tax = Tax::find($id);
        $data['pageTitle'] = 'Tax';
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false],
            ['name' => 'Tax', 'url' => route('tax.index'), 'active' => false],
            ['name' => 'Edit Tax', 'url' => route('tax.edit', $id), 'active' => true]
        ];

        if(auth()->user()->hasRole('super-admin')){
            $data['outlets'] = Outlet::all();
        } else {
            $data['outlets'] = Outlet::where('id', auth()->user()->outlet_id)->get();
        }
        return view('tax.edit', compact('tax'), $data);
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
            'name' => 'required|string|max:255',
            'rate' => 'required|numeric|min:0|max:100',
            'is_active' => 'required|boolean',
            'outlet_id' => 'required|exists:outlets,id',
        ], [
            'name.required' => 'Name wajib di isi',
            'name.max' => 'Name maksimal 255 karakter',
            'name.string' => 'Name harus berupa string',
            'rate.required' => 'Rate wajib di isi',
            'rate.numeric' => 'Rate harus berupa angka',
            'rate.min' => 'Rate minimal 0',
            'rate.max' => 'Rate maksimal 100',
            'is_active.required' => 'Status wajib di isi',
            'is_active.boolean' => 'Status harus berupa boolean',
            'outlet_id.required' => 'Outlet wajib di isi',
            'outlet_id.exists' => 'Outlet tidak ditemukan',
            
        ]);

        $tax = Tax::find($id);
        $tax->update([
            'name' => $request->name,
            'rate' => $request->rate,
            'is_active' => 0,
            'outlet_id' => $request->outlet_id,
        ]);

        return redirect()->back()->with('message', 'Tax berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tax::find($id)->delete();
        return redirect()->back()->with("message",'Tax berhasil di hapus');
    }

    public function makeActive(Request $request)
    {
        // dd($request->all());
        $tax = Tax::find($request->id)->update([
            'is_active' => true
        ]);
      
        Tax::where('id', '!=', $request->id)->update([
            'is_active' => false
        ]);

        return redirect()->back()->with('message', 'Tax berhasil di update');
    }

    public function getTax(Request $request)
    {
        $tax = Tax::where('outlet_id', $request->outlet_id)->where('is_active', true)->first();
        return response()->json($tax);
    }
}