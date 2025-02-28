<?php

namespace App\Http\Controllers;

use App\Models\CustomerGroup;
use Illuminate\Http\Request;

class CustomerGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pageTitle'] = 'Customer Group';
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false],  
            ['name' => 'Customer Group', 'url' => route('group_customer.index'), 'active' => true]
        ];
        $data['customer_group'] = CustomerGroup::all();
        return view('customer_group.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = ' Customer Group';
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false],
            
            ['name' => 'Customer Group', 'url' => route('group_customer.index'), 'active' => false], 
            ['name' => 'Create Customer Group', 'url' => route('group_customer.create'), 'active' => true]
        ];
    
        return view('customer_group.create' , $data);
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
            'percentage' => 'required|numeric',
            'is_active' => 'required|in:0,1',
        ],[
            'name.required' => 'Name wajib di isi',
            'name.max' => 'Name maksimal 255 karakter',
            'name.string' => 'Name harus berupa string',
            'percentage.required' => 'Percentage wajib di isi',
            'percentage.numeric' => 'Percentage harus berupa angka',
            'is_active.required' => 'Is Active wajib di isi',
            'is_active.in' => 'Is Active harus berupa 0 atau 1',

        ]);
        

       
        CustomerGroup::create([
            'name' => $request->name,
            'percentage' => $request->percentage,
            'is_active' => $request->is_active,
        ]);

        return redirect()->back()->with('success', 'CustomerGroup berhasil di tambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $CustomerGroup = CustomerGroup::find($id);
        $data['pageTitle'] = ' Customer Group';
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false], 
            ['name' => 'Customer Group', 'url' => route('group_customer.index'), 'active' => false], 
            ['name' => 'Show Customer Group', 'url' => route('group_customer.show', $id), 'active' => true]
        ];
    
        return view('customer_group.show' , compact('customer_group'), $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['customer_group'] = CustomerGroup::find($id);
        $data['pageTitle'] = ' Customer Group';
        $data['breadcrumbItems'] = [
            ['name' => 'Dashboard', 'url' => route('dashboard.index'), 'active' => false], 
            ['name' => 'CustomerGroup', 'url' => route('group_customer.index'), 'active' => false], 
            ['name' => 'Edit CustomerGroup', 'url' => route('group_customer.edit', $id), 'active' => true]
        ];


    
        return view('customer_group.edit' , $data);
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
            'percentage' => 'required|numeric',
            'is_active' => 'required|in:0,1',
        ],[
            'name.required' => 'Name wajib di isi',
            'name.max' => 'Name maksimal 255 karakter',
            'name.string' => 'Name harus berupa string',
            'percentage.required' => 'Percentage wajib di isi',
            'percentage.numeric' => 'Percentage harus berupa angka',
            'is_active.required' => 'Is Active wajib di isi',
            'is_active.in' => 'Is Active harus berupa 0 atau 1',

        ]);
        

        $CustomerGroup = CustomerGroup::find($id);
       
        $CustomerGroup->update([
            'name' => $request->name,
            'percentage' => $request->percentage,
            'is_active' => $request->is_active,
        ]);

        return redirect()->back()->with('success', 'CustomerGroup berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CustomerGroup::find($id)->delete();
        return response()->json(['success' => 'CustomerGroup berhasil di hapus']);
    }
}
