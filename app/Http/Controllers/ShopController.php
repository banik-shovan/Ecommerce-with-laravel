<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }


    public function subnemuSearch($slug)
    {

        // $menuid=Menu::where('name','=',$slug)->value('id');
        $submenuid = Submenu::where('slug', '=', $slug)->value('id');
        // if($menuid){
        //     dd($menuid);
        // }
        // else{

        // dd($submenuid);
        // }

        $products = Product::where('submenu_id', '=', $submenuid)->where('active', '=', 'yes')->get();

        return view('shop')->with('products', $products);
    }


    public function menuSearch($slug)
    {

        $menuid = Menu::where('name', '=', $slug)->value('id');
        // $submenuid=Submenu::where('slug','=',$slug)->value('id');
        // if($menuid){
        //     dd($menuid);
        // }
        // else{

        $products = Product::where('menu_id', '=', $menuid)->where('active', '=', 'yes')->get();
        // }


        return view('shop')->with('products', $products);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //single product show
    public function show($slug)
    {
        // dd($slug);
        $product = Product::where('slug', '=', $slug)->first();
        // dd($product->menu->name);
        return view('product')->with('product', $product);
    }
    //product show for brand
    public function brandProduct($slug)
    {
        // dd($slug);
        $brand = Brand::where('slug', '=', $slug)->first();
        // dd($brand->id);
        $products = Product::where('brand_id', '=', $brand->id)->where('active', '=', 'yes')->get();
        //  dd($products);
        return view('brandproduct')->with('products', $products)->with('brand', $brand);
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
