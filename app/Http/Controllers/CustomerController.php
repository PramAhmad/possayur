<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerGroup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pageTitle'] = 'Customer';
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false],  
            ['name' => 'Customer', 'url' => route('customer.index'), 'active' => true]
        ];
        $data['customer'] = Customer::with('customerGroup','user')->get(); 

        return view('customer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = ' Customer';
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false],
            
            ['name' => 'Customer', 'url' => route('customer.index'), 'active' => false], 
            ['name' => 'Create Customer', 'url' => route('customer.create'), 'active' => true]
        ];
        $data['customer_group'] = CustomerGroup::all();

        return view('customer.create' , $data);
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
            'is_active' => 'required|in:0,1',
            'customer_group_id' => 'required|exists:customer_group,id',
            'company_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'tax' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'postal_code' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        ],[
            'name.required' => 'Name wajib di isi',
            'name.max' => 'Name maksimal 255 karakter',
            'name.string' => 'Name harus berupa string',
            'is_active.required' => 'Is Active wajib di isi',
            'is_active.in' => 'Is Active harus berupa 0 atau 1',
            'customer_group_id.required' => 'Customer Group wajib di isi',
            'customer_group_id.exists' => 'Customer Group tidak ditemukan',
            'company_name.required' => 'Company Name wajib di isi',
            'company_name.max' => 'Company Name maksimal 255 karakter',
            'company_name.string' => 'Company Name harus berupa string',
            'phone.required' => 'Phone wajib di isi',
            'phone.max' => 'Phone maksimal 255 karakter',
            'phone.string' => 'Phone harus berupa string',
            'tax.max' => 'Tax maksimal 255 karakter',
            'tax.string' => 'Tax harus berupa string',
            'address.required' => 'Address wajib di isi',
            'address.max' => 'Address maksimal 255 karakter',
            'address.string' => 'Address harus berupa string',
            'country.required' => 'Country wajib di isi',
            'country.max' => 'Country maksimal 255 karakter',
            'country.string' => 'Country harus berupa string',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Email harus berupa email',
            'email.unique' => 'Email sudah ada',
            'password.required' => 'Password wajib di isi',
            'password.min' => 'Password minimal 6 karakter',
            'postal_code.required' => 'Postal Code wajib di isi',
            'postal_code.max' => 'Postal Code maksimal 255 karakter',
            'postal_code.string' => 'Postal Code harus berupa string',
            'city.required' => 'City wajib di isi',
            'city.max' => 'City maksimal 255 karakter',
            'city.string' => 'City harus berupa string',
            'state.required' => 'State wajib di isi',
            'state.max' => 'State maksimal 255 karakter'

        ]);
       try {
        DB::beginTransaction();
        $user =   User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verified_at' => now(),
        ]);
   
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_active' => $request->is_active,
            'customer_group_id' => $request->customer_group_id,
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'tax' => $request->tax,
            'address' => $request->address,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'state' => $request->state,
        ]);
    
       } catch (\Throwable $th) {
        // return $th;
        DB::rollBack();
              return redirect()->back()->with('error', 'Gagal menambahkan customer');
       }
       $user->assignRole('customer');
         DB::commit();
        return redirect()->route('customer.index')->with('success', 'Customer berhasil ditambahkan');
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
        $data['pageTitle'] = ' Customer';
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false],
            
            ['name' => 'Customer', 'url' => route('customer.index'), 'active' => false], 
            ['name' => 'Edit Customer', 'url' => route('customer.edit', $id), 'active' => true]
        ];
        $data['customer_group'] = CustomerGroup::all();
        $data['customer'] = Customer::find($id);
        return view('customer.edit' , $data);
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
            'is_active' => 'required|in:0,1',
            'customer_group_id' => 'required|exists:customer_group,id',
            'company_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'tax' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'postal_code' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        ],[
            'name.required' => 'Name wajib di isi',
            'name.max' => 'Name maksimal 255 karakter',
            'name.string' => 'Name harus berupa string',
            'is_active.required' => 'Is Active wajib di isi',
            'is_active.in' => 'Is Active harus berupa 0 atau 1',
            'customer_group_id.required' => 'Customer Group wajib di isi',
            'customer_group_id.exists' => 'Customer Group tidak ditemukan',
            'company_name.required' => 'Company Name wajib di isi',
            'company_name.max' => 'Company Name maksimal 255 karakter',
            'company_name.string' => 'Company Name harus berupa string',
            'phone.required' => 'Phone wajib di isi',
            'phone.max' => 'Phone maksimal 255 karakter',
            'phone.string' => 'Phone harus berupa string',
            'tax.max' => 'Tax maksimal 255 karakter',
            'tax.string' => 'Tax harus berupa string',
            'address.required' => 'Address wajib di isi',
            'address.max' => 'Address maksimal 255 karakter',
            'address.string' => 'Address harus berupa string',
            'country.required' => 'Country wajib di isi',
            'country.max' => 'Country maksimal 255 karakter',
            'country.string' => 'Country harus berupa string',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Email harus berupa email',
            'email.unique' => 'Email sudah ada',
            'password.required' => 'Password wajib di isi',
            'password.min' => 'Password minimal 6 karakter',
            'postal_code.required' => 'Postal Code wajib di isi',
            'postal_code.max' => 'Postal Code maksimal 255 karakter',
            'postal_code.string' => 'Postal Code harus berupa string',
            'city.required' => 'City wajib di isi',
            'city.max' => 'City maksimal 255 karakter',
            'city.string' => 'City harus berupa string',
            'state.required' => 'State wajib di isi',
            'state.max' => 'State maksimal 255 karakter'

        ]);
         try {
        DB::beginTransaction();
        $user =   User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verified_at' => now(),
        ]);

        Customer::where('user_id', $id)->update([
            'is_active' => $request->is_active,
            'customer_group_id' => $request->customer_group_id,
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'tax' => $request->tax,
            'address' => $request->address,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'state' => $request->state,
        ]);
         } catch (\Throwable $th) {
        DB::rollBack();
              return redirect()->back()->with('error', 'Gagal mengubah customer');
         }
            $user->assignRole('customer');
            DB::commit();
            return redirect()->route('customer.index')->with('success', 'Customer berhasil diubah');
        
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
