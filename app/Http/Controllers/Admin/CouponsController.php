<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::where('enabled',1)->get();
        if (isset(request()->id)){
            $coupons = Coupon::where('id',request()->id)->get();
        }

        return view('admin.coupons.index',compact('coupons'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $this->validate($request,[
            'coupon_code' => 'required|min:2|max:255|unique:coupons',
            'amount' => 'required',
            'amount_type' => 'required',
            'expire_date' => 'required',
        ]);

        $coupon = auth()->user()->coupon()->create($data);
        toastr()->success('Add Coupon Sussessfully..');
        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        abort(404);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.edit',compact('coupon'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);
        $data =  $this->validate($request,[
            'coupon_code' => 'required|string|min:2|max:255||unique:coupons,coupon_code,'.$id,
            'amount' => 'required',
            'amount_type' => 'required',
            'expire_date' => 'required',
            ]);
        $data['edit'] = auth()->user()->id;
        $coupon->update($data);
        toastr()->success('Update Coupon Sussessfully..');
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->update(['enabled'=>0,'status'=>0,'delete'=> auth()->user()->id]);
        toastr()->success('Delete Coupon Sussessfully..');
        return back();
    }
    public function restore($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->update(['enabled'=>1,'status'=>1,'edit'=> auth()->user()->id]);
        toastr()->success('Resore Coupon Sussessfully..');
        return back();
    }
    public function force_del($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        toastr()->success('Delete Coupon Sussessfully..');
        return back();
    }
    public function enabled($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->update(['status'=>1,'edit'=> auth()->user()->id]);
        toastr()->success('Resore Coupon Sussessfully..');
        return back();
    }
    public function disabled($id)
   {
    $coupon = Coupon::findOrFail($id);
    $coupon->update(['status'=>0,'edit'=> auth()->user()->id]);
    toastr()->success('Resore Coupon Sussessfully..');
    return back();
   }



//
}
