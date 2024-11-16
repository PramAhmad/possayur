<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Outlet;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Settings',
                'url' => '/general-settings',
                'active' => false
            ],
            [
                'name' => 'Product',
                'url' => route('product.index'),
                'active' => true
            ],
        ];
    
        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');
    
        $products = QueryBuilder::for(Product::class)
            ->allowedSorts(['name', 'selling_price', 'qty'])
            ->with(['category', 'brand', 'outlet'])
            ->where('name', 'like', value: "%$q%")
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);
    
        return view('product.index', [
            'products' => $products,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Product',
        ]);
    }
    

    public function create()
    {
        $breadcrumbsItems = [
            [
                'name' => 'Settings',
                'url' => '/general-settings',
                'active' => false
            ],
            [
                'name' => 'product',
                'url' => route('product.index'),
                'active' => false
            ],
            [
                'name' => 'Create Product',
                'url' => route('product.create'),
                'active' => true
            ],
        ];

        $outlets = Outlet::all();
        $categories = Category::all();
        $brands = Brand::all();
        $unit = Unit::all();
        return view('product.create', [
            'outlets' => $outlets,
            'categories' => $categories,
            'brands' => $brands,
            'unit' => $unit,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Create Product'
        ]);
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'barcode' => 'required|string|unique:product,barcode',
            'slug' => 'required|string|unique:product,slug',
            'cost_price' => 'required|integer',
            'selling_price' => 'required|integer',
            'qty' => 'required|integer',
            'alert_qty' => 'required|integer',
            'sku' => 'required|string',
            'category_id' => 'required|exists:category,id',
            'brand_id' => 'nullable|exists:brands,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ],[
            'name.required' => 'Product name is required',
            'barcode.required' => 'Barcode is required',
            'barcode.unique' => 'This barcode already exists',
            'slug.unique' => 'This slug already exists',
            'cost_price.required' => 'Cost price is required',
            'selling_price.required' => 'Selling price is required',
            'qty.required' => 'Quantity is required',
            'name.string' => 'Product name must be string',
            'cost_price.integer' => 'Cost price must be integer',
            'selling_price.integer' => 'Selling price must be integer',
            'qty.integer' => 'Quantity must be integer',
            'alert_qty.integer' => 'Alert quantity must be integer',
            'sku.required' => 'SKU is required',    
            'category_id.required' => 'Category is required',
            'category_id.exists' => 'Category not found',
            
        ]);

        $image = $request->file('image');
        $imageName = null;
        if ($image) {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/product'), $imageName);
        }

        Product::create([
            'name' => $request->name,
            'barcode' => $request->barcode,
            'slug' => Str::slug($request->name),
            'cost_price' => $request->cost_price,
            'selling_price' => $request->selling_price,
            'qty' => $request->qty,
            'alert_qty' => $request->alert_qty,
            'sku' => $request->sku,
            'image' => $imageName,
            'description' => $request->description,
            'is_variant' => $request->has('is_variant') ? "1" : "0",
            'is_batch' => $request->has('is_batch') ? "1" : "0",
            'is_difprice' => $request->has('is_difprice') ? "1" : "0",
            'is_active' => $request->has('is_active') ? "1" : "0",
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'outlet_id' => $request->outlet_id,
        ]);

        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }

    /**
     * Show the form for editing the specified product.
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
                'name' => 'product',
                'url' => route('product.index'),
                'active' => false
            ],
            [
                'name' => 'Edit Product',
                'url' => route('product.edit', $id),
                'active' => true
            ],
        ];

        $product = Product::findOrFail($id);
        $outlets = Outlet::all();
        $categories = Category::all();
        $unit = Unit::all();
        $brands = Brand::all();

        return view('product.edit', [
            'product' => $product,
            'outlets' => $outlets,
            'unit' => $unit,
            'categories' => $categories,
            'brands' => $brands,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Edit Product'
        ]);
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'barcode' => 'required|string|unique:product,barcode,' . $id,
            'slug' => 'required|string|unique:product,slug,' . $id,
            'cost_price' => 'required|integer',
            'selling_price' => 'required|integer',
            'qty' => 'required|integer',
            'alert_qty' => 'required|integer',
            'sku' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $image = $request->file('image');
        if ($image) {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/product'), $imageName);
            $product->image = $imageName;
        }

        $product->update([
            'name' => $request->name,
            'barcode' => $request->barcode,
            'slug' => Str::slug($request->name),
            'cost_price' => $request->cost_price,
            'selling_price' => $request->selling_price,
            'qty' => $request->qty,
            'alert_qty' => $request->alert_qty,
            'sku' => $request->sku,
            'description' => $request->description,
            'is_variant' => $request->has('is_variant') ? 1 : 0,
            'is_batch' => $request->has('is_batch') ? 1 : 0,
            'is_difprice' => $request->has('is_difprice') ? 1 : 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'outlet_id' => $request->outlet_id,
        ]);

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }

 
}
