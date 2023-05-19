<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Userprofile;
use App\Models\Orderinternal;
use App\Models\Oderitem;
use App\Models\Order;
use Illuminate\Support\Str;
class UserprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::User();
        $orders= Orderinternal::where('user_id','=',$user->id)->get();
        // dd($orders);
        return view('userprofile')->with('orders',$orders);
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
    public function update(Request $request)
    {
        // dd($request->all());
        $user=Auth::User();
        //dd($user->profile->imagePath);
        $profileImageName='';
        
        if($request->hasFile('imagePath')){
            request()->validate([
                'imagePath' => 'image',
                
            ]);

        
            
            if($request->hasFile('imagePath')) {
                if($files=$request->file('imagePath')){

               
                    $s = strtoupper(md5(uniqid($files->getClientOriginalName(),true))); 
                    $profileImageName = 
                        substr($s,0,8) . '-' . 
                        substr($s,8,4) . '-' . 
                        substr($s,12,4). '-' . 
                        substr($s,16,4). '-' . 
                        substr($s,20) .'.'. $files->getClientOriginalExtension();  
                // $photoName=time().uniqid().$files->getClientOriginalName();
                $files->move('public/userImage/',$profileImageName);
                
                }   


                 $oldProfileImage = public_path ('userImage/').$user->userprofile->imagePath;

                
                if(file_exists($oldProfileImage)) {
                @unlink($oldProfileImage); //delete from storage
                // Storage::delete($file_path); //Or you can do it as well
                }

            }
            $user->userprofile()->update([
                'address1' => $request->address1,
                'shipping_address'=>$request->shipping_address,
                'gender'=>$request->gender,
                'phone'=>$request->phone,
                'zip'=>$request->zip,
                'city'=>$request->city,
                'country'=>$request->country,
                'imagePath'=>$profileImageName
            ]);
        }else{
            $profileImageName=$user->userprofile->imagePath;
            $user->userprofile()->update([
                'address1' => $request->address1,
                'shipping_address'=>$request->shipping_address,
                'gender'=>$request->gender,
                'phone'=>$request->phone,
                'zip'=>$request->zip,
                'city'=>$request->city,
                'country'=>$request->country,
                'imagePath'=> $profileImageName
            ]);
            // dd("ok");
        }

        return redirect()->route('userprofile');
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
