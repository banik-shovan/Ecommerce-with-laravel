<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\Tag;
use App\Models\Volume;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Toastr;

class ProductController extends Controller
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
        $product = Product::get();
        return view('admin.product.product')->with('product', $product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::get();
        $submenu = Submenu::get();
        $tag = Tag::get();
        $volume = Volume::get();
        $brands = Brand::get();
        return view('admin.product.product_create')->with('menu', $menu)->with('submenu', $submenu)->with('tag', $tag)->with('volume', $volume)->with('brands', $brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //   dd($request->all());
        $request->validate([
            'product_name' => 'required',
            'menu_id' => 'required',
            'image1' => 'required',
        ]);
        $slug = Str::slug("$request->product_name", "-") . '-' . time() . uniqid();

        $p = $request->input('price', []); //price with volume
        $q = $request->input('qty', []); //quantity with volume

        // dd($p,$q);

        $product = new Product();
        $product->name = $request->product_name;
        $product->slug = $slug; //use for unique product url
        $product->active = $request->product_active;
        $product->menu_id = $request->menu_id;
        $product->brand_id = $request->brand_id;
        $product->submenu_id = $request->submenu_id;

        $product->short_description = $request->short_description;

        $product->description = $request->product_description;


        $product->main_price = $request->main_price;

        $product->old_price = $request->old_price;
        $product->exclusive = $request->exclusive;

        if ($request->product_size == "yes" &&  $request->product_volume == "no") {
            if ($request->size_s != "null") {
                $size_s = $request->size_s;
            }
            if ($request->size_m != "null") {
                $size_m = $request->size_m;
            }
            if ($request->size_l != "null") {
                $size_l = $request->size_l;
            }
            if ($request->size_xl != "null") {
                $size_xl = $request->size_xl;
            }
            if ($request->size_xxl != "null") {
                $size_xxl = $request->size_xxl;
            }

            $product->s =  $size_s;
            $product->m = $size_m;
            $product->l = $size_l;
            $product->xl = $size_xl;
            $product->xxl = $size_xxl;
            //    dd($size_s,$size_m,$size_l,$size_xl,$size_xxl);
            $total_product = $size_s + $size_m + $size_l + $size_xl + $size_xxl;
            $product->size = $request->product_size;
            $product->volume = $request->product_volume;
            // dd($total_product);
            $product->total = $total_product;
        } elseif ($request->product_size == "no" &&  $request->product_volume == "yes") {
            //    dd($request->total_product);
            $product->size = $request->product_size;
            $product->volume = $request->product_volume;
            $totalquantity = array_sum($q);
            $product->total = $totalquantity;
        } else {
            $product->size = $request->product_size;
            $product->volume = $request->product_volume;
            // $totalquantity=array_sum($q);
            $product->total = $request->total_product;
        }


        if ($request->hasFile('image1')) {
            if ($files = $request->file('image1')) {


                $s = strtoupper(md5(uniqid($files->getClientOriginalName(), true)));
                $photoName =
                    substr($s, 0, 8) . '-' .
                    substr($s, 8, 4) . '-' .
                    substr($s, 12, 4) . '-' .
                    substr($s, 16, 4) . '-' .
                    substr($s, 20) . '.' . $files->getClientOriginalExtension();
                // $photoName=time().uniqid().$files->getClientOriginalName();
                $files->move('public/productImage/', $photoName);
                $product->image1 = $photoName;
            }
        }

        if ($request->hasFile('image2')) {
            if ($files = $request->file('image2')) {

                $s = strtoupper(md5(uniqid($files->getClientOriginalName(), true)));
                $photoName =
                    substr($s, 0, 8) . '-' .
                    substr($s, 8, 4) . '-' .
                    substr($s, 12, 4) . '-' .
                    substr($s, 16, 4) . '-' .
                    substr($s, 20) . '.' . $files->getClientOriginalExtension();

                $files->move('public/productImage/', $photoName);
                $product->image2 = $photoName;
            }
        }

        if ($request->hasFile('image3')) {
            if ($files = $request->file('image3')) {
                $s = strtoupper(md5(uniqid($files->getClientOriginalName(), true)));
                $photoName =
                    substr($s, 0, 8) . '-' .
                    substr($s, 8, 4) . '-' .
                    substr($s, 12, 4) . '-' .
                    substr($s, 16, 4) . '-' .
                    substr($s, 20) . '.' . $files->getClientOriginalExtension();

                $files->move('public/productImage/', $photoName);
                $product->image3 = $photoName;
            }
        }

        if ($request->hasFile('image4')) {
            if ($files = $request->file('image4')) {

                $s = strtoupper(md5(uniqid($files->getClientOriginalName(), true)));
                $photoName =
                    substr($s, 0, 8) . '-' .
                    substr($s, 8, 4) . '-' .
                    substr($s, 12, 4) . '-' .
                    substr($s, 16, 4) . '-' .
                    substr($s, 20) . '.' . $files->getClientOriginalExtension();

                $files->move('public/productImage/', $photoName);
                $product->image4 = $photoName;
            }
        }


        $product->save();
        // $p=$request->input('price',[]);
        // $q=$request->input('qty',[]);


        if ($request->product_volume == "yes") {
            $attr = collect($q)->map(function ($qty) {
                return $qty;
            });
            // dd($attr);
            $attr1 = collect($p)->map(function ($p, $key) use ($attr) {
                return [
                    'qty' =>  $attr[$key],
                    'price' => $p
                ];
            });
            //  dd($attr1);
            // $product=Product::find(3);
            $product->volumes()->attach($attr1);
        }
        if ($request->tag_id) {
            $product->tags()->attach($request->tag_id);
        }
        Toastr::info('Product saved Successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
        return back();



        // $product->volumes()->attach( $attr1);
        // $product->volumes()->sync();
        // $product->volumes()->detach();
        // dd($product);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::get();
        $submenu = Submenu::get();
        $tags = Tag::get();
        $volumes = Volume::get();
        $brands = Brand::get();
        $product = Product::find($id);
        return view('admin.product.product_edit')->with('product', $product)->with('menu', $menu)->with('submenu', $submenu)->with('tags', $tags)->with('brands', $brands)->with('volumes', $volumes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        // dd($request->all());

        $request->validate([
            'product_name' => 'required',
            'menu_id' => 'required',

        ]);
        $slug = Str::slug("$request->product_name", "-") . '-' . time() . uniqid();

        $p = $request->input('price', []); //price with volume
        $q = $request->input('qty', []); //quantity with volume
        //  dd($p,$q);

        $product = Product::find($id);
        $product->name = $request->product_name;
        $product->slug = $slug; //use for unique product url
        $product->active = $request->product_active;
        $product->menu_id = $request->menu_id;
        $product->brand_id = $request->brand_id;
        $product->submenu_id = $request->submenu_id;

        $product->short_description = $request->short_description;

        $product->description = $request->product_description;


        $product->main_price = $request->main_price;

        $product->old_price = $request->old_price;
        $product->exclusive = $request->exclusive;

        if ($request->product_size == "yes" &&  $request->product_volume == "no") {
            if ($request->size_s != "null") {
                $size_s = $request->size_s;
            }
            if ($request->size_m != "null") {
                $size_m = $request->size_m;
            }
            if ($request->size_l != "null") {
                $size_l = $request->size_l;
            }
            if ($request->size_xl != "null") {
                $size_xl = $request->size_xl;
            }
            if ($request->size_xxl != "null") {
                $size_xxl = $request->size_xxl;
            }

            $product->s =  $size_s;
            $product->m = $size_m;
            $product->l = $size_l;
            $product->xl = $size_xl;
            $product->xxl = $size_xxl;
            //    dd($size_s,$size_m,$size_l,$size_xl,$size_xxl);
            $total_product = $size_s + $size_m + $size_l + $size_xl + $size_xxl;
            $product->size = $request->product_size;
            $product->volume = $request->product_volume;
            // dd($total_product);
            $product->total = $total_product;
        } elseif ($request->product_size == "no" &&  $request->product_volume == "yes") {
            //    dd($request->total_product);
            $product->size = $request->product_size;
            $product->volume = $request->product_volume;
            $totalquantity = array_sum($q);
            $product->total = $totalquantity;
        } else {
            $product->size = $request->product_size;
            $product->volume = $request->product_volume;
            // $totalquantity=array_sum($q);
            $product->total = $request->total_product;
        }


        if ($request->hasFile('image1')) {
            if ($files = $request->file('image1')) {


                $s = strtoupper(md5(uniqid($files->getClientOriginalName(), true)));
                $photoName =
                    substr($s, 0, 8) . '-' .
                    substr($s, 8, 4) . '-' .
                    substr($s, 12, 4) . '-' .
                    substr($s, 16, 4) . '-' .
                    substr($s, 20) . '.' . $files->getClientOriginalExtension();
                // $photoName=time().uniqid().$files->getClientOriginalName();
                $files->move('public/productImage/', $photoName);
                $oldProfileImage1 = public_path('productImage/') . $product->image1;
                if (file_exists($oldProfileImage1)) {
                    @unlink($oldProfileImage1); //delete from storage
                }

                $product->image1 = $photoName;
            }
        }

        if ($request->hasFile('image2')) {
            if ($files = $request->file('image2')) {

                $s = strtoupper(md5(uniqid($files->getClientOriginalName(), true)));
                $photoName =
                    substr($s, 0, 8) . '-' .
                    substr($s, 8, 4) . '-' .
                    substr($s, 12, 4) . '-' .
                    substr($s, 16, 4) . '-' .
                    substr($s, 20) . '.' . $files->getClientOriginalExtension();

                $files->move('public/productImage/', $photoName);

                $oldProfileImage2 = public_path('productImage/') . $product->image2;

                if (file_exists($oldProfileImage2)) {
                    @unlink($oldProfileImage2); //delete from storage
                }

                $product->image2 = $photoName;
            }
        }

        if ($request->hasFile('image3')) {
            if ($files = $request->file('image3')) {
                $s = strtoupper(md5(uniqid($files->getClientOriginalName(), true)));
                $photoName =
                    substr($s, 0, 8) . '-' .
                    substr($s, 8, 4) . '-' .
                    substr($s, 12, 4) . '-' .
                    substr($s, 16, 4) . '-' .
                    substr($s, 20) . '.' . $files->getClientOriginalExtension();

                $files->move('public/productImage/', $photoName);

                $oldProfileImage3 = public_path('productImage/') . $product->image3;

                if (file_exists($oldProfileImage3)) {
                    @unlink($oldProfileImage3); //delete from storage
                }

                $product->image3 = $photoName;
            }
        }

        if ($request->hasFile('image4')) {
            if ($files = $request->file('image4')) {

                $s = strtoupper(md5(uniqid($files->getClientOriginalName(), true)));
                $photoName =
                    substr($s, 0, 8) . '-' .
                    substr($s, 8, 4) . '-' .
                    substr($s, 12, 4) . '-' .
                    substr($s, 16, 4) . '-' .
                    substr($s, 20) . '.' . $files->getClientOriginalExtension();

                $files->move('public/productImage/', $photoName);

                $oldProfileImage4 = public_path('productImage/') . $product->image4;


                if (file_exists($oldProfileImage4)) {
                    @unlink($oldProfileImage4); //delete from storage
                }
                $product->image4 = $photoName;
            }
        }


        $product->save();
        // $p=$request->input('price',[]);
        // $q=$request->input('qty',[]);


        if ($request->product_volume == "yes") {
            $attr = collect($q)->map(function ($qty) {
                return $qty;
            });
            // dd($attr);
            $attr1 = collect($p)->map(function ($p, $key) use ($attr) {
                return [
                    'qty' =>  $attr[$key],
                    'price' => $p
                ];
            });
            //  dd($attr1);
            // $product=Product::find(3);
            $product->volumes()->sync($attr1);
        }
        if ($request->tag_id) {
            $product->tags()->sync($request->tag_id);
        }
        Toastr::info('Product update Successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
        return back();
    }

    public function active($id)
    {
        $product = Product::find($id);
        $product->active = "yes";
        $product->save();

        Toastr::info('Product Active Successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
        return back();
    }

    public function deactive($id)
    {
        $product = Product::find($id);
        $product->active = "no";
        $product->save();
        Toastr::info('Product Deactive Successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::find($id);

        $oldProfileImage1 = public_path('productImage/') . $product->image1;
        $oldProfileImage2 = public_path('productImage/') . $product->image2;
        $oldProfileImage3 = public_path('productImage/') . $product->image3;
        $oldProfileImage4 = public_path('productImage/') . $product->image4;

        if (file_exists($oldProfileImage1)) {
            @unlink($oldProfileImage1); //delete from storage
        }
        if (file_exists($oldProfileImage2)) {
            @unlink($oldProfileImage2); //delete from storage
        }
        if (file_exists($oldProfileImage3)) {
            @unlink($oldProfileImage3); //delete from storage
        }
        if (file_exists($oldProfileImage4)) {
            @unlink($oldProfileImage4); //delete from storage
        }
        $product->tags()->detach();
        $product->volumes()->detach();
        $product->delete();


        Toastr::info('product is  Deleted Successfully', 'Title', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
        return redirect()->back();
    }
}
