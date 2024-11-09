<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\ProductPriceByCustomer as ModelsProductPriceByCustomer;
use Illuminate\Http\Request;

class ProductPriceByCustomer extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Settings',
                'url' => '/general-settings',
                'active' => false
            ],
            [
                'name' => 'Product Price By Customer',
                'url' => route('product.customer.index', ['id' => $id]),
                'active' => true
            ],
        ];
    
        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
    
        $product = Product::find($id);  
    
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
    
        $data = ModelsProductPriceByCustomer::with(['product', 'customer', 'outlet'])
            ->where('product_id', $id)
            ->whereHas('product', function ($query) use ($q) {
                if ($q) {
                    $query->where('name', 'like', "%$q%");
                }
            })
            ->paginate($perPage)
            ->appends(['q' => $q, 'per_page' => $perPage]);
    
        return view('product.customer.index', [
            'id' => $id,
            'data' => $data,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Product ' . $product->name . ' Price By Customer',
        ]);
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Settings',
                'url' => '/general-settings',
                'active' => false
            ],
            [
                'name' => 'Product Price By Customer',
                'url' => route('product.customer.index', ['id' => $id]),
                'active' => false
            ],
            [
                'name' => 'Create Product Price By Customer',
                'url' => route('product.customer.create',['id' => $id]),
                'active' => true
            ],
        ];
        $existingCustomerIds = \DB::table('product_price_by_customers')
        ->where('product_id', $id)
        ->pluck('customer_id')
        ->toArray();
        $customer = Customer::whereNotIn('id', $existingCustomerIds)->get();
        $product = Product::find($id);
        $outlets = Outlet::all();
        // ud

        return view('product.customer.create', [
            'id' => $id,
            'customer' => $customer,
            'product' => $product,
            'outlets' => $outlets,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Create Product Price By Customer',
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
        // Validate the request
        $request->validate([
            'product_id' => 'required|exists:product,id',
            'customer_id' => 'required|exists:customer,id',
            'outlet_id' => 'required|exists:outlets,id',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date', 
        ], [
            'product_id.required' => 'Product wajib diisi',
            'product_id.exists' => 'Product tidak ditemukan',
            'customer_id.required' => 'Customer wajib diisi',
            'customer_id.exists' => 'Customer tidak ditemukan',
            'outlet_id.required' => 'Outlet wajib diisi',
            'outlet_id.exists' => 'Outlet tidak ditemukan',
            'price.required' => 'Price wajib diisi',
            'price.numeric' => 'Price harus berupa angka',
            'start_date.required' => 'Start Date wajib diisi',
            'start_date.date' => 'Start Date harus berupa tanggal',
            'end_date.required' => 'End Date wajib diisi',
            'end_date.date' => 'End Date harus berupa tanggal',
            'end_date.after_or_equal' => 'End Date harus lebih besar atau sama dengan Start Date',
        ]);
    
        try {
            ModelsProductPriceByCustomer::create($request->only([
                'product_id',
                'customer_id',
                'outlet_id',
                'price',
                'start_date',
                'end_date',
            ]));
            // update product is_difprice
            $product = Product::find($request->product_id);
            $product->is_difprice = "1";
        } catch (\Exception $e) {
            \Log::error('Error creating Product Price By Customer: ' . $e->getMessage());
            
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }
    
        return redirect()->route('product.customer.index', ['id' => $request->product_id])
                         ->with('success', 'Product Price By Customer created successfully');
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
