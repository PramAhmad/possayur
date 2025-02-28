<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Outlet;
use Spatie\QueryBuilder\QueryBuilder;

use Illuminate\Http\Request;

class CategoryController extends Controller
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
                'name' => 'Category',
                'url' => route('category.index'),
                'active' => true
            ],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');
    
        if(auth()->user()->hasRole('super-admin')){
            $outlets = Outlet::all();
            $category = QueryBuilder::for(Category::class)
            ->with('outlet')
            ->allowedSorts(['name', 'slug', 'description'])
            ->where('name', 'like', "%$q%")
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        }else{
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->get();
            $category = QueryBuilder::for(Category::class)
            ->with('outlet')
            ->allowedSorts(['name', 'slug', 'description'])
            ->where('name', 'like', "%$q%")
            ->where('outlet_id', auth()->user()->outlet_id)
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        }

        return view('category.index', [
            'categories' => $category,
            'outlets' => $outlets,
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => 'Category',
        ]);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = ' Category';
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false],
            
            ['name' => 'Category', 'url' => route('category.index'), 'active' => false], 
            ['name' => 'Create Category', 'url' => route('category.create'), 'active' => true]
        ];
        if(auth()->user()->hasRole('super-admin')){
            $data['outlets'] = Outlet::all();   
        }else{
            $data['outlets'] = Outlet::where('id', auth()->user()->outlet_id)->get();
        }

    
        return view('category.create' , $data);
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
            'slug' => 'required|string|max:255|unique:category,slug',
            'description' => 'required|min:6',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'outlet_id' => 'required',
        ],[
            'name.required' => 'Name wajib di isi',
            'name.max' => 'Name maksimal 255 karakter',
            'name.string' => 'Name harus berupa string',
            'slug.required' => 'Slug wajib di isi',
            'slug.unique' => 'Slug sudah ada',
            'slug.max' => 'Slug maksimal 255 karakter',
            'slug.string' => 'Slug harus berupa string',
            'description.required' => 'Description wajib di isi',
            'description.min' => 'Description minimal 6 karakter',
            'image.required' => 'Image wajib di isi',
            'image.image' => 'File yang di upload harus gambar',
            'image.mimes' => 'File yang di upload harus gambar dengan format jpeg,png,jpg,gif,svg',
            'image.max' => 'Ukuran file yang di upload maksimal 5MB',

        ]);
        

        $image = $request->file('image');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image->move(public_path('upload/category'), $image_name);

        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'image' => $image_name,
            'outlet_id' => $request->outlet_id,
        ]);

        return redirect()->back()->with('message', 'Category berhasil di tambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $data['pageTitle'] = ' Category';
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false], 
            ['name' => 'Category', 'url' => route('category.index'), 'active' => false], 
            ['name' => 'Show Category', 'url' => route('category.show', $id), 'active' => true]
        ];
    
        return view('category.show' , compact('category'), $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $data['pageTitle'] = ' Category';
        $data['outlets'] = Outlet::all();
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false], 
            ['name' => 'Category', 'url' => route('category.index'), 'active' => false], 
            ['name' => 'Edit Category', 'url' => route('category.edit', $id), 'active' => true]
        ];
    
        return view('category.edit' , compact('category'), $data);
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
            'slug' => 'required|string|max:255|unique:category,slug,'.$id,
            'description' => 'required|min:6',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'outlet_id' => 'required',
        ],[
            'name.required' => 'Name wajib di isi',
            'name.max' => 'Name maksimal 255 karakter',
            'name.string' => 'Name harus berupa string',
            'slug.required' => 'Slug wajib di isi',
            'slug.unique' => 'Slug sudah ada',
            'slug.max' => 'Slug maksimal 255 karakter',
            'slug.string' => 'Slug harus berupa string',
            'description.required' => 'Description wajib di isi',
            'description.min' => 'Description minimal 6 karakter',
            'image.image' => 'File yang di upload harus gambar',
            'image.mimes' => 'File yang di upload harus gambar dengan format jpeg,png,jpg,gif,svg',
            'image.max' => 'Ukuran file yang di upload maksimal 5MB',
            'outlet_id.required' => 'Outlet wajib di isi',

        ]);
        // dd($request->all());

        $category = Category::find($id);
        $image_name = $category->image;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('upload/category'), $image_name);
        }

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'image' => $image_name,
            'outlet_id' => $request->outlet_id,
        ]);

        return redirect()->back()->with('message', 'Category berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('message', 'Category berhasil di hapus');
    }
}
