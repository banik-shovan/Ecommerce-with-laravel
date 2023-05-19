<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Toastr;

class BrandController extends Controller
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
        $brands = Brand::get();
        return view('admin.brand.brand')->with('brands', $brands);
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
        dd($request->all());
        $request->validate([
            'brand_name' => 'required',

        ]);

        $slug = Str::slug("$request->brand_name", "-") . '-' . time() . uniqid();
        //   dd($slug );
        $brand = new Brand();
        $brand->name = $request->brand_name;

        $brand->slug = $slug;

        if ($request->hasFile('brand_image')) {
            if ($files = $request->file('brand_image')) {


                $s = strtoupper(md5(uniqid($files->getClientOriginalName(), true)));
                $photoName =
                    substr($s, 0, 8) . '-' .
                    substr($s, 8, 4) . '-' .
                    substr($s, 12, 4) . '-' .
                    substr($s, 16, 4) . '-' .
                    substr($s, 20) . '.' . $files->getClientOriginalExtension();
                // $photoName=time().uniqid().$files->getClientOriginalName();
                $files->move('public/brandImage/', $photoName);
                $brand->image = $photoName;
            }
        }
        $brand->active = $request->brand_active;
        $brand->description = $request->brand_description;
        $brand->save();
        Toastr::info('Brand saved Successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand, $id)
    {
        // dd($id);
        $brand = Brand::find($id);
        return view('admin.brand.brandedit')->with('brand', $brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand, $id)
    {
        // dd($request->all(),$id);
        $oldbrand = Brand::find($id);
        $oldbrand->name = $request->brand_name;
        if ($request->hasFile('brand_image')) {
            if ($files = $request->file('brand_image')) {


                $s = strtoupper(md5(uniqid($files->getClientOriginalName(), true)));
                $photoName =
                    substr($s, 0, 8) . '-' .
                    substr($s, 8, 4) . '-' .
                    substr($s, 12, 4) . '-' .
                    substr($s, 16, 4) . '-' .
                    substr($s, 20) . '.' . $files->getClientOriginalExtension();
                // $photoName=time().uniqid().$files->getClientOriginalName();

                //delete picture from the storage if the picture is exist
                $oldImage = public_path('brandImage/') . $oldbrand->image;
                // dd($oldImage);
                if (file_exists($oldImage)) {
                    @unlink($oldImage); //delete from storage
                }

                $files->move('public/brandImage/', $photoName);
                $oldbrand->image = $photoName;
            }
        }
        $oldbrand->active = $request->brand_active;
        $oldbrand->description = $request->brand_description;
        $oldbrand->save();
        Toastr::info('Brand Update Successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
    }

    public function active($id)
    {
        $brand = Brand::find($id);
        $brand->active = "yes";
        $brand->save();

        Toastr::info('Brand Active Successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
        return back();
    }

    public function deactive($id)
    {
        $brand = Brand::find($id);
        $brand->active = "no";
        $brand->save();
        Toastr::info('Brand Deactive Successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
        return back();
    }
}
