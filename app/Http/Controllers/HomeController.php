<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Volume;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $product = Product::where('active', '=', 'yes')->get();
        $brands = Brand::where('active', '=', 'yes')->get();
        // dd($brands);
        $trendingproducts = Product::where('exclusive', '=', 'yes')->where('active', '=', 'yes')->orderBy('id', 'desc')->get();
        return view('index')->with('product', $product)->with('brands', $brands)->with('trendingproducts', $trendingproducts);
    }

    public function atr()
    {
        $product = Product::find(3);

        // dd($product);
        $product->volumes()->attach([1 => ['qty' => 6, 'price' => 150], 2 => ['qty' => 7, 'price' => 200]]);
        // $product->volumes()->sync([1=>['qty' => 6,'price'=>150]]);
        // $product->volumes()->detach();
        dd($product);
    }
    //about us show
    public function aboutUs()
    {
        return view('aboutus');
    }
    //trems and condition  show
    public function tremsCondition()
    {
        return view('trems_condition');
    }

    //track order
    public function trackorder(Request $request)
    {
        dd($request->all());
        return view('trems_condition');
    }
}
