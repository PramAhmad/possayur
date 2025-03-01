<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Outlet;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pageTitle'] = 'Brand';
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false],  
            ['name' => 'Brand', 'url' => route('brand.index'), 'active' => true]
        ];
        if(auth()->user()->hasRole('super-admin')){
            $data['brand'] = QueryBuilder::for(Brand::class)
            ->with('outlet')
            ->allowedSorts(['name', 'is_active'])
            ->latest()
            ->paginate(10);
        } else {
            $data['brand'] = QueryBuilder::for(Brand::class)
            ->where('outlet_id', auth()->user()->outlet_id)
            ->with('outlet')
            ->allowedSorts(['name', 'is_active'])
            ->latest()
            ->paginate(10);
        }
       
        return view('brand.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'Brand';
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false],
            
            ['name' => 'Brand', 'url' => route('brand.index'), 'active' => false], 
            ['name' => 'CreateBrand', 'url' => route('brand.create'), 'active' => true]
        ];
        // outlet
        if(auth()->user()->hasRole('super-admin')){
            $data['outlets'] = Outlet::all();
        } else {
            $data['outlets'] = Outlet::where('id', auth()->user()->outlet_id)->get();
        }
    
        return view('brand.create' , $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'is_active' => 'required|in:0,1',
            'outlet_id' => 'required',
        ],[
            'name.required' => 'Name wajib di isi',
            'name.max' => 'Name maksimal 255 karakter',
            'name.string' => 'Name harus berupa string',
            'image.required' => 'Image wajib di isi',
            'image.image' => 'File yang di upload harus gambar',
            'image.mimes' => 'File yang di upload harus gambar dengan format jpeg,png,jpg,gif,svg',
            'image.max' => 'Ukuran file yang di upload maksimal 5MB',
            'is_active.required' => 'Status wajib di isi',
            'is_active.in' => 'Status harus 0 atau 1',


        ]);
        

        $image = $request->file('image');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image->move(public_path(path: 'upload/brand'), $image_name);

       Brand::create([
            'name' => $request->name,
            'image' => $image_name,
            'is_active' => $request->is_active,
            'outlet_id' => $request->outlet_id,
        ]);

        return redirect()->route('brand.index')->with('message', 'Brand berhasil di tambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Brand =Brand::find($id);
        $data['pageTitle'] = 'Brand';
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false], 
            ['name' => 'Brand', 'url' => route('brand.index'), 'active' => false], 
            ['name' => 'ShowBrand', 'url' => route('brand.show', $id), 'active' => true]
        ];
    
        return view('Brand.show' , compact('Brand'), $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand =Brand::find($id);
        $data['pageTitle'] = 'Brand';
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false], 
            ['name' => 'Brand', 'url' => route('brand.index'), 'active' => false], 
            ['name' => 'EditBrand', 'url' => route('brand.edit', $id), 'active' => true]
        ];

        // outlet
        if(auth()->user()->hasRole('super-admin')){
            $data['outlets'] = Outlet::all();
        } else {
            $data['outlets'] = Outlet::where('id', auth()->user()->outlet_id)->get();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
        }
    
        return view('brand.edit' , compact('brand'), $data);
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
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',

            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'is_active' => 'required|in:0,1',
            'outlet_id' => 'required',

        ],[
            'name.required' => 'Name wajib di isi',
            'name.max' => 'Name maksimal 255 karakter',
            'name.string' => 'Name harus berupa string',
            'image.image' => 'File yang di upload harus gambar',
            'image.mimes' => 'File yang di upload harus gambar dengan format jpeg,png,jpg,gif,svg',
            'image.max' => 'Ukuran file yang di upload maksimal 5MB',
            'is_active.required' => 'Status wajib di isi',
            'is_active.in' => 'Status harus 0 atau 1',

        ]);
        

        $brand =Brand::find($id);
        $image_name = $brand->image;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('upload/brand'), $image_name);
        }

        $brand->update([
            'name' => $request->name,
            'image' => $image_name,
            'is_active' => $request->is_active,
            'outlet_id' => $request->outlet_id,
        ]);

        return redirect()->back()->with('success', 'Brand berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Brand::find($id)->delete();
        return response()->json(['success' => 'Brand berhasil di hapus']);
    }
}
