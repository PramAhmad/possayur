<?php

namespace App\Http\Controllers;

use App\Exports\ProductTemplateExport;
use App\Imports\ProductImport;
use App\Models\Batches;
use App\Models\Product;
use App\Models\Outlet;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

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
            ->with(['category', 'brand', 'outlet','unit'])
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

     if(auth()->user()->hasRole('super-admin')){
            $outlets = Outlet::all();
            $categories = Category::all();
            $brands = Brand::all();
            $unit = Unit::all();
        }else{
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->get();
            $categories = Category::where('outlet_id', auth()->user()->outlet_id)->get();
            $brands = Brand::where('outlet_id', auth()->user()->outlet_id)->get();
            $unit = Unit::where('outlet_id', auth()->user()->outlet_id)->get();
        }

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
            // dd($request->all());
            // remove formatter cost_price
            $request->merge(['cost_price' => str_replace(',', '', $request->cost_price)]);
            $request->merge(['selling_price' => str_replace(',', '', $request->selling_price)]);

            $request->validate([
                'name' => 'required|string',
                'barcode' => 'required|string|unique:product,barcode',
                'slug' => 'required|string|unique:product,slug',
                'cost_price' => 'required|integer',
                'selling_price' => 'required|integer',
                'qty' => 'required',
                'alert_qty' => 'required|integer',
                'sku' => 'required|string',
                'category_id' => 'required|exists:category,id',
                'brand_id' => 'nullable|exists:brand,id',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                'unit_id' => 'required|exists:units,id',
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
                'brand_id.exists' => 'Brand not found',
                'image.image' => 'Image must be an image',
                'image.mimes' => 'Image must be jpeg, png, jpg, gif, or svg',
                'image.max' => 'Image size must be less than 5048',
                'unit_id.required' => 'Unit is required',
                'unit_id.exists' => 'Unit not found',

            ]);
        
            if($request->is_variant == 1){
                $variants = $request->variants ?? [];
                foreach ($variants as $key => $variant) {
                    $variants[$key]['additional_price'] = str_replace(',', '', $variant['additional_price']);
                }
                $request->merge(['variants' => $variants]);
            
                $request->validate([
                    'variants.*.item_code' => 'required|string',
                    'variants.*.name' => 'required|string',
                    'variants.*.additional_price' => 'required|integer',
                ]);
            }
            
            if($request->is_batch == 1){
                $request->validate([
                    'batches.*.batch_no' => 'required|string',
                    'batches.*.qty' => 'required|integer',
                    'batches.*.price' => 'required|integer',
                    'batches.*.expired_date' => 'required|date',
                ]);
            }
        
            // Handle image upload
            $image = $request->file('image');
            $imageName = null;
            if ($image) {
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('upload/product'), $imageName);
            }
            dd($request->all());
        
            DB::beginTransaction();
            try {
                // Create product
                $product = Product::create([
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
                    'unit_id' => $request->unit_id,
                ]);
        
                // Handle variants
                if($request->is_variant == 1 && in_array('variant', $request->product_type)){
                    $variants = $request->variants ?? [];
                    foreach ($variants as $variant) {
                        Variant::create([
                            'product_id' => $product->id,
                            'item_code' => $variant['item_code'],
                            'outlet_id' => $request->outlet_id,
                            'name' => $variant['name'],
                            'qty' => $variant['qty'] ?? $request->qty,
                            'additional_price' => $variant['additional_price'],
                        ]);
                    }
                }
        
                // Handle batches
                if($request->is_batch == 1 && in_array('batch', $request->product_type)){
                    $batches = $request->batches ?? [];
                    foreach ($batches as $batch) {
                        Batches::create([
                            'product_id' => $product->id,
                            'outlet_id' => $request->outlet_id,
                            'batch_no' => $batch['batch_no'],
                            'qty' => $batch['qty'],
                            'price' => $batch['price'],
                            'expired_date' => $batch['expired_date'],
                        ]);
                    }
                }
        
                DB::commit();
                return redirect()->route('product.index')->with('success', 'Product created successfully');
        
            } catch(\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
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

       if(auth()->user()->hasRole('super-admin')){
            $outlets = Outlet::all();
            $categories = Category::all();
            $brands = Brand::all();
            $unit = Unit::all(); 
        }else{
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->get();
            $categories = Category::where('outlet_id', auth()->user()->outlet_id)->get();
            $brands = Brand::where('outlet_id', auth()->user()->outlet_id)->get();
            $unit = Unit::where('outlet_id', auth()->user()->outlet_id)->get();
        }
        $product = Product::findOrFail($id);
        

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
    
        // Remove formatter for cost_price and selling_price
        $request->merge([
            'cost_price' => str_replace(',', '', $request->cost_price),
            'selling_price' => str_replace(',', '', $request->selling_price),
        ]);
    
        // Validate request data
        $request->validate([
            'name' => 'required|string',
            'barcode' => 'required|string|unique:product,barcode,' . $product->id,
            'slug' => 'required|string|unique:product,slug,' . $product->id,
            'cost_price' => 'required|integer',
            'selling_price' => 'required|integer',
            'qty' => 'required|integer',
            'alert_qty' => 'required|integer',
            'sku' => 'required|string',
            'category_id' => 'required|exists:category,id',
            'brand_id' => 'nullable|exists:brand,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'unit_id' => 'required|exists:units,id',
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image && file_exists(public_path('upload/product/' . $product->image))) {
                unlink(public_path('upload/product/' . $product->image));
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/product'), $imageName);
            $product->image = $imageName;
        }
    
        DB::beginTransaction();
        try {
            // Update product data
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
                'is_variant' => $request->has('is_variant') ? "1" : "0",
                'is_batch' => $request->has('is_batch') ? "1" : "0",
                'is_difprice' => $request->has('is_difprice') ? "1" : "0",
                'is_active' => $request->has('is_active') ? "1" : "0",
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'outlet_id' => $request->outlet_id,
                'unit_id' => $request->unit_id,
            ]);
    
            // Handle variants
            if ($request->is_variant == 1) {
                $request->validate([
                    'variants.*.item_code' => 'required|string',
                    'variants.*.name' => 'required|string',
                    'variants.*.additional_price' => 'required|integer',
                ]);
    
                $variantIds = [];
                foreach ($request->variants ?? [] as $variant) {
                    $variantData = [
                        'product_id' => $product->id,
                        'outlet_id' => $request->outlet_id,
                        'name' => $variant['name'],
                        'qty' => $variant['qty'] ?? $product->qty,
                        'additional_price' => $variant['additional_price'],
                    ];
    
                    $existingVariant = Variant::updateOrCreate(
                        ['item_code' => $variant['item_code'], 
                        'product_id' => $product->id],
                        $variantData
                    );
                    $variantIds[] = $existingVariant->id;
                }
    
                // Delete unused variants
                Variant::where('product_id', $product->id)
                    ->whereNotIn('id', $variantIds)
                    ->delete();
            }
    
            // Handle batches
            if ($request->is_batch == 1) {
                $request->validate([
                    'batches.*.batch_no' => 'required|string',
                    'batches.*.qty' => 'required|integer',
                    'batches.*.price' => 'required|integer',
                    'batches.*.expired_date' => 'required|date',
                ]);
    
                $batchIds = [];
                foreach ($request->batches ?? [] as $batch) {
                    $batchData = [
                        'product_id' => $product->id,
                        'outlet_id' => $request->outlet_id,
                        'qty' => $batch['qty'],
                        'price' => $batch['price'],
                        'expired_date' => $batch['expired_date'],
                    ];
    
                    $existingBatch = Batches::updateOrCreate(
                        ['batch_no' => $batch['batch_no']], 
                        $batchData
                    );
                    $batchIds[] = $existingBatch->id;
                }
    
                // Delete unused batches
                Batches::where('product_id', $product->id)
                    ->whereNotIn('id', $batchIds)
                    ->delete();
            }
    
            DB::commit();
            return redirect()->route('product.index')->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
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

    public function downloadTemplate(Request $request)
    {   
        $fileName = now().'product.xlsx';
        return Excel::download(new ProductTemplateExport, $fileName);
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel_import' => 'required|mimes:xlsx,xls|max:2048'
        ]);

        try {
            Excel::import(new ProductImport, $request->file('excel_import'));

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diimpor!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengimpor data!',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
