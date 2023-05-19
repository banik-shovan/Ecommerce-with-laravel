<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;

use Toastr;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon= Coupon::get();
        return view('admin.coupon.coupon')->with('coupon',$coupon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'coupon_name' => 'required|unique:coupons|max:255',
            'coupon_price'=>'required',
            'date'=>'required',
            
         ]);
        //dd($request->all());
        $coupon=new Coupon();
        $coupon->coupon_name = $request->coupon_name;
        $coupon->coupon_price = $request->coupon_price;
        $coupon->active_or_deactivate = $request->active_or_deactive;
        $coupon->expired_date = $request->date;
        $coupon->save();
        Toastr::info('Coupon saved Successfully', '', ["positionClass" => "toast-top-center",'progressBar'=> true, 'showDuration'=> 20,]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $coupon= Coupon::find($id);
        return view('admin.coupon.couponedit')->with('coupon',$coupon);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       
        $coupon= Coupon::find($id);
        $coupon->coupon_price = $request->coupon_price;
        $coupon->active_or_deactivate = $request->active_or_deactive;
        $coupon->expired_date = $request->date;
        $coupon->save();
        Toastr::info('Coupon Update Successfully', '', ["positionClass" => "toast-top-center",'progressBar'=> true, 'showDuration'=> 20,]);
        return redirect()->route('super.coupon');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon ,$id)
    {
        $coupon= Coupon::find($id);
        
        
        $coupon->delete();

        
        Toastr::info('Coupon Delete Successfully', '', ["positionClass" => "toast-top-center",'progressBar'=> true, 'showDuration'=> 20,]);
        return redirect()->back();
    }

    public function active($id)
    {
        $coupon= Coupon::find($id);
        $coupon->active_or_deactivate="yes";
        $coupon->save();
        Toastr::info('Coupon Active Successfully', '', ["positionClass" => "toast-top-center",'progressBar'=> true, 'showDuration'=> 20,]);
        return back();
    }

    public function deactive($id)
    {
        $coupon= Coupon::find($id);
        $coupon->active_or_deactivate="no";
        $coupon->save();
        Toastr::info('Coupon Deactive Successfully', '', ["positionClass" => "toast-top-center",'progressBar'=> true, 'showDuration'=> 20,]);
        return back();
    }
}
