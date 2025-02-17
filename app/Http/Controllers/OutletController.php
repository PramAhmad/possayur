<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Str;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Settings',
                'url' => '/general-settings',
                'active' => false
            ],
            [
                'name' => 'Outlets',
                'url' => route('outlets.index'),
                'active' => true
            ],
        ];
        
        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');
        
        $outlets = QueryBuilder::for(Outlet::class)
            ->allowedSorts([])
            ->where('name', 'like', "%$q%")
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);
        
        return view('outlet.index', [
            'outlets' => $outlets,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Outlets'
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbsItems = [
            [
                'name' => 'Settings',
                'url' => '/general-settings',
                'active' => false
            ],
            [
                'name' => 'Outlets',
                'url' => route('outlets.index'),
                'active' => false
            ],
            [
                'name' => 'Create Outlet',
                'url' => route('outlets.create'),
                'active' => true
            ],
        ];
        
        return view('outlet.create', [
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Create Outlet'
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
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ],[
            'name.required' => 'Name wajib di isi',
            'address.required' => 'Address wajib di isi',
            'phone.required' => 'Phone wajib di isi',
            'logo.image' => 'Logo harus berupa gambar',
            'logo.mimes' => 'Logo harus berupa gambar',
            'logo.max' => 'Ukuran gambar maksimal 5MB',
        ]);
        
        $logo = $request->file('logo');
        $logoName = null;
        if ($logo) {
            $logoName = time().'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('upload/outlets'), $logoName);
        }

        Outlet::create([
            'uuid' =>  Str::uuid()->toString(),
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'logo' => $logoName,
        ]);
        
        return redirect()->route('outlets.index')->with('success', 'Outlet created successfully');
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
        $breadcrumbsItems = [
            [
                'name' => 'Settings',
                'url' => '/general-settings',
                'active' => false
            ],
            [
                'name' => 'Outlets',
                'url' => route('outlets.index'),
                'active' => false
            ],
            [
                'name' => 'Edit Outlet',
                'url' => route('outlets.edit',['outlet'=>$id]),
                'active' => true
            ],
        ];
        $outlet = Outlet::findOrFail($id);
        
        return view('outlet.edit', [
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Edit Outlet',
            'outlet' => $outlet 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlet $outlet)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ],[
            'name.required' => 'Name wajib di isi',
            'address.required' => 'Address wajib di isi',
            'phone.required' => 'Phone wajib di isi',
            'logo.image' => 'Logo harus berupa gambar',
            'logo.mimes' => 'Logo harus berupa gambar',
            'logo.max' => 'Ukuran gambar maksimal 5MB',
        ]);
    
        $logo = $request->file('logo');
        $logoName = $outlet->logo;
    
        if ($logo) {
            if ($logoName && file_exists(public_path('upload/outlets/'.$logoName))) {
                unlink(public_path('upload/outlets/'.$logoName));
            }
    
            $logoName = time().'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('upload/outlets'), $logoName);
        }
    
        $outlet->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'logo' => $logoName,
        ]);
    
        return redirect()->route('outlets.index')->with('success', 'Outlet updated successfully');
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
