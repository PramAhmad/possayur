<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;


class CouponController extends Controller
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
                'name' => 'Coupon',
                'url' => route('coupon.index'),
                'active' => true
            ],
        ];
        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');
        $user = auth()->user();
        // coulet
        if ($user->getRoleNames()[0] == 'super-admin') {
            $coupons = QueryBuilder::for(Coupon::class)
            ->allowedSorts(['name', 'code', 'discount', 'start_date', 'end_date'])
            ->where('code', 'like', "%$q%")
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);
            $outlets = Outlet::all();
        } else {
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->get();
            $coupons = QueryBuilder::for(Coupon::class)
            ->allowedSorts(['name', 'code', 'discount', 'start_date', 'end_date'])
            ->where('code', 'like', "%$q%")
            ->where('outlet_id', auth()->user()->outlet_id)
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);
        }
        

        return view('coupon.index', [
            'coupons' => $coupons,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Coupon',
        ]
    );


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
                'name' => 'Coupon',
                'url' => route('coupon.index'),
                'active' => false
            ],
            [
                'name' => 'Create Coupon',
                'url' => route('coupon.create'),
                'active' => true
            ],
        ];
      if (auth()->user()->getRoleNames()[0] == 'super-admin') {
            $outlets = Outlet::all();
        } else {
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->get();
        }
        return view('coupon.create', [
            'outlets' => $outlets,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Create Coupon',
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
        // dd($request->all());
        // remove separator format
        $request->merge([
            'amount' => str_replace(',', '', $request->amount),
            'min_amount' => str_replace(',', '', $request->min_amount),
            'qty' => str_replace(',', '', $request->qty),
        ]);
        $request->validate([
            'outlet_id' => 'required|exists:outlets,id',
            'code' => 'required|string|unique:coupon,code',
            'type' => 'required|in:fixed,percentage',
            'amount' => [
                'required',
                'integer',
                'min:1',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->type === 'percentage' && $value > 100) {
                        $fail('The percentage amount cannot be greater than 100.');
                    }
                },
            ],
            'min_amount' => 'required|integer|min:0',
            'qty' => 'required|integer|min:1',
            'exp_date' => 'required|date|after:today',
            'is_active' => 'required|in:0,1',
            'outlet_id' => 'required|exists:outlets,id',
        ]);
    
        try {
            Coupon::create([
                'outlet_id' => $request->outlet_id,
                'code' => strtoupper($request->code), 
                'type' => $request->type,
                'amount' => $request->amount,
                'min_amount' => $request->min_amount,
                'qty' => $request->qty,
                'used' => 0, 
                'exp_date' => $request->exp_date,
                'user_id' => auth()->id(),
                'is_active' => $request->is_active,
                'outlet_id' => $request->outlet_id,
            ]);
    
            return redirect()
                ->route('coupon.index')
                ->with('success', __('Coupon created successfully'));
    
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', __('Error occurred while creating coupon'))
                ->withInput();
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
        if (auth()->user()->getRoleNames()[0] == 'super-admin') {
            $outlets = Outlet::all();
        } else {
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->get();
        }
        $coupon = Coupon::findOrFail($id);
        $breadcrumbsItems = [
            [
                'name' => 'Settings',
                'url' => '/general-settings',
                'active' => false
            ],
            [
                'name' => 'Coupon',
                'url' => route('coupon.index'),
                'active' => false
            ],
            [
                'name' => 'Edit Coupon',
                'url' => route('coupon.edit', $id),
                'active' => true
            ],
        ];
        return view('coupon.edit', [
            'coupon' => $coupon,
            'outlets' => $outlets,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Edit Coupon',
        ]);
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
            'outlet_id' => 'required|exists:outlets,id',
            'code' => 'required|string|unique:coupon,code,' . $id,
            'type' => 'required|in:fixed,percentage',
            'amount' => [
                'required',
                'integer',
                'min:1',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->type === 'percentage' && $value > 100) {
                        $fail('The percentage amount cannot be greater than 100.');
                    }
                },
            ],
            'min_amount' => 'required|integer|min:0',
            'qty' => 'required|integer|min:1',
            'exp_date' => 'required|date|after:today',
            'is_active' => 'required|in:0,1',
        ]);
    
        try {
            $coupon = Coupon::findOrFail($id);
            $coupon->update([
                'outlet_id' => $request->outlet_id,
                'code' => strtoupper($request->code), 
                'type' => $request->type,
                'amount' => $request->amount,
                'min_amount' => $request->min_amount,
                'qty' => $request->qty,
                'exp_date' => $request->exp_date,
                'is_active' => $request->is_active,
            ]);
    
            return redirect()
                ->route('coupon.index')
                ->with('success', __('Coupon updated successfully'));
    
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', __('Error occurred while updating coupon'))
                ->withInput();
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
        Coupon::findOrFail($id)->delete();
        return redirect()
            ->route('coupon.index')
            ->with('success', __('Coupon deleted successfully'));

    }

    public function getCoupon(Request $request)
    {
        $coupon = Coupon::where('id', $request->coupon_id)->first();
        return response()->json($coupon);
    }
}
