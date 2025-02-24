<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pageTitle'] = 'Suplier'; 
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false],  
            ['name' => 'Suplier', 'url' => route('supplier.index'), 'active' => true]
        ];
        $data['supplier'] = Suplier::all();

        return view('suplier.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'Create Suplier'; 
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false],  
            ['name' => 'Suplier', 'url' => route('supplier.index'), 'active' => false],
            ['name' => 'Create Suplier', 'url' => route('supplier.create'), 'active' => true]
        ];

        return view('suplier.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* 'name',
        'email',
        'phone',
        'address',
        'company',
        'shop_name',
        'bank_name',
        'bank_branch',
        'account_holder',
        'account_number', */

        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'company' => 'required',
            'shop_name' => 'required',
            'bank_name' => 'nullable',
            'bank_branch' => 'nullable',
            'account_holder' => 'nullable',
            'account_number' => 'nullable',
        ],[
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'phone.required' => 'Nomor telepon wajib diisi',
            'address.required' => 'Alamat wajib diisi',
            'company.required' => 'Perusahaan wajib diisi',
            'shop_name.required' => 'Nama toko wajib diisi',
        ]);
        try {
            Suplier::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'company' => $request->company,
                'shop_name' => $request->shop_name,
                'bank_name' => $request->bank_name,
                'bank_branch' => $request->bank_branch,
                'account_holder' => $request->account_holder,
                'account_number' => $request->account_number,
            ]);
            return redirect()->route('supplier.index')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal disimpan');
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
        $data['pageTitle'] = 'Edit Suplier'; 
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false],  
            ['name' => 'Suplier', 'url' => route('supplier.index'), 'active' => false],
            ['name' => 'Edit Suplier', 'url' => route('supplier.edit', $id), 'active' => true]
        ];
        $data['supplier'] = Suplier::find($id);

        return view('suplier.edit', $data);
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
            'name' => 'required|string',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'company' => 'required',
            'shop_name' => 'required',
            'bank_name' => 'nullable',
            'bank_branch' => 'nullable',
            'account_holder' => 'nullable',
            'account_number' => 'nullable',
        ],[
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'phone.required' => 'Nomor telepon wajib diisi',
            'address.required' => 'Alamat wajib diisi',
            'company.required' => 'Perusahaan wajib diisi',
            'shop_name.required' => 'Nama toko wajib diisi',
        ]);
        try {
            Suplier::find($id)->update($request->all());
            return redirect()->route('supplier.index')->with('success', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Suplier::find($id)->delete();
            return redirect()->route('supplier.index')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}
