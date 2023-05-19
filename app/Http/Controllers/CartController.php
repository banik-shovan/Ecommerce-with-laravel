<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Submenu;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\Volume;
use App\Models\Orderinternal;
use App\Models\Oderitem;
use App\Models\User;
use App\Models\Brand;
use App\Helper\Helper;
use Toastr;
use PDF;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        //  dd($request->all());
        $id = $request->productid;
        (int)$qtyblade = $request->qty;

        $product = Product::find($id);
        if ($product->size == "yes") {
            if (!isset($request->size)) {
                Toastr::info('select Product Size', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
                return back();
            }
        }
        if ($product->volume == "yes") {
            if (!isset($request->volume)) {
                Toastr::info('select Product volume', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 70,]);
                return back();
            }
        }

        (int)$quantity = "";
        $volumename = "";
        if (isset($request->size)) {
            $size = $request->size;
            if ($size == 's') {
                if ($product->s < $qtyblade) {
                    Toastr::info('Product quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
                    return back();
                } else {
                    (int)$quantity = $request->qty;
                }
            } elseif ($size == 'm') {
                if ($product->m < $qtyblade) {
                    Toastr::info('Product quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
                    return back();
                } else {
                    (int)$quantity = $request->qty;
                }
            } elseif ($size == 'l') {
                if ($product->l < $qtyblade) {
                    Toastr::info('Product quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
                    return back();
                } else {
                    (int)$quantity = $request->qty;
                }
            } elseif ($size == 'xl') {
                if ($product->xl < $qtyblade) {
                    Toastr::info('Product quantity is not available hh ', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
                    return back();
                } else {
                    (int)$quantity = $request->qty;
                }
            } elseif ($size == 'xxl') {
                if ($product->xxl < $qtyblade) {
                    Toastr::info('Product quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
                    return back();
                } else {
                    (int)$quantity = $request->qty;
                }
            }
        }
        if (isset($request->volume)) {
            $volume = (int)($request->volume);
            $volumename = Volume::find($volume);
            // dd($volumename->name);
            $qty1 = $product->volumes()->where('product_id', '=', $product->id)->where('volume_id', '=', $request->volume)->first()->pivot->qty;
            // dd($qty1);
            if ((int)$qty1 < (int)$qtyblade) {
                // dd("hello");
                Toastr::info('Product quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
                return back();
            } else {
                (int)$quantity = $request->qty;
            }
        }
        if ($product->size == "no" && $product->volume == "no") {
            if ($request->qty > $product->total) {
                Toastr::info('Product quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
                return back();
            } else {
                (int)$quantity = $request->qty;
            }
        }



        (int)$price = "";
        if ($product->volume == "no" && $product->size == "yes") {
            $price = (int)$product->main_price;
        } elseif ($product->volume == "no" && $product->size == "no") {
            $price = (int)$product->main_price;
        } else {
            $volume = $request->volume;
            $price = $product->volumes()->where('product_id', $product->id)->where('volume_id', $volume)->first()->pivot->price;
        }
        // dd($price,$quantity);
        $name = $product->name;
        // dd($name);
        $cart = Cart::content()->where('id', $id)->first();
        // $carts = Cart::content();
        // dd($cart->rowId);
        // $a[]=$cart->options;
        //  dd(array_key_exists("volume",$a));
        if (isset($cart) && $cart != null && !isset($request->volume) && !isset($request->size)) {
            $quantitynew = ((int)$request->qty + (int)$cart->qty);
            if ($product->total < $quantitynew) {
                Toastr::info('Product quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
                return back();
            }
            $totalprice = ((int)$quantitynew * (int)$price);
            $image = $product->image1;
            Cart::Update($cart->rowId, ['qty' => $quantitynew, $price, 'options' => ['size' => null, 'volume' => null, 'volumename' => null, 'totalprice' => $totalprice, 'image' => $image, 'slug' => $product->slug]]);
            Toastr::info('Product added to cart successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
            return back();
        } elseif (isset($cart) && $cart != null && $cart->options['volume'] != null && $cart->options['volume'] == $request->volume) {
            // dd("helo save volume it");
            $quantitynew = ((int)$request->qty + (int)$cart->qty);
            $qty1 = $product->volumes()->where('product_id', '=', $product->id)->where('volume_id', '=', $request->volume)->first()->pivot->qty;
            // dd("hello new");
            if ($qty1 < $quantitynew) {

                Toastr::info('Product quantity of this volume is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
                return back();
            }
            $totalprice = ((int)$quantitynew * (int)$price);
            $image = $product->image1;
            $size = $request->size;
            Cart::Update($cart->rowId, ['qty' => $quantitynew, $price, 'options' => ['size' => null, 'volume' => $request->volume, 'volumename' => $volumename->name, 'totalprice' => $totalprice, 'image' => $image, 'slug' => $product->slug]]);
            Toastr::info('Product added to cart successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
            return back();
        } elseif (isset($cart) && $cart != null &&  $cart->options['size'] != null && $cart->options['size'] == $request->size) {
            $quantitynew = ((int)$request->qty + (int)$cart->qty);
            // dd("hello new");
            if ($quantity < $quantitynew) {

                Toastr::info('Product quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
                return back();
            }
            $totalprice = ((int)$quantitynew * (int)$price);
            $image = $product->image1;
            $size = $request->size;
            Cart::Update($cart->rowId, ['qty' => $quantitynew, $price, 'options' => ['size' => $request->size, 'volume' => null, 'volumename' => null, 'totalprice' => $totalprice, 'image' => $image, 'slug' => $product->slug]]);
            Toastr::info('Product added to cart successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
            return back();
        } else {

            $totalprice = $quantity * $price;
            $image = $product->image1;
            if ($product->size == "yes") {
                $option = ['size' => $request->size, 'volume' => null, 'volumename' => null, 'totalprice' => $totalprice, 'image' => $image, 'slug' => $product->slug];
            } elseif ($product->volume == "yes") {
                $option = ['size' => null, 'volume' => $request->volume, 'volumename' => $volumename->name, 'totalprice' => $totalprice, 'image' => $image, 'slug' => $product->slug];
            } else {
                $option = ['size' => null, 'volume' => null, 'volumename' => null, 'totalprice' => $totalprice, 'image' => $image, 'slug' => $product->slug];
            }


            Cart::add($id, $name, $quantity, $price, $option);
            // Cart::add('20', 'Product 1', 1, 9.99);
            Toastr::info('Product added to cart successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
            return back();
        }
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
    public function carttest()
    {
        // $carts=User::find(3);
        // $carts=Orderinternal::find(25);
        // $carts = Cart::content();
        // $name='cupon1';
        // $price=100;
        // Cart::cupon($name, $price);
        // Cart::destroy();
        // dd($carts->orderinternals->all());
        // for($x=0;$x<100;$x++){
        //     $help=Helper::instance()->generateOrderNR();
        //     echo $help."<br />";
        // }
        // Cart::destroy();
        // $carts = Cart::content();
        // $carts=Brand::find(1);
        // $help=Helper::instance()->generateOrderNR();
        // dd($carts->products());
        // foreach($carts->products as $item){
        //     echo $item->name."<br />";
        // }

        // $orderObj =Orderinternal::select('order_unique_id')->latest('id')->first();
        // $product=Product::find(1);
        // $a=array();

        // foreach($product->volumes as $item){
        //     array_push($a,$item->name);
        // }
        // print_r($a);

        $id = 27;
        $data['app'] = Orderinternal::find($id);
        $pdf = PDF::loadView('invoicepdf', $data)->setPaper('A4', 'Potrait')->setOptions(['defaultFont' => 'sans-serif']);
        // $app=Orderinternal::find($id);

        $dat["email"] = $data['app']->email;
        $dat["subject"] = "invoce mail";
        $dat['pdf'] = $pdf->output();

        // Mail::send([], $dat,  function($message)use($dat) {
        //     $message->to($dat["email"])
        //             ->subject($dat["subject"])
        //             ->attachData($dat['pdf'],'invoice.pdf',[
        //             'mime'=>'application/pdf',
        //                 ])
        //             ->setBody('
        //             Dear Sir / Madam,
        //             Thank you for purchase product from ARABIAN SHELF.

        //             ');
        //     });
        return $pdf->stream('invoice.pdf');
        // return view('invoicepdf')->with('app',$app);


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
    public function show()
    {
        return view('cart');
    }

    //cart item remove function

    public function cartremove($rowid)
    {
        $carts = Cart::content();
        $rowId = $rowid;
        Cart::remove($rowId);
        Toastr::info('Product deleted from cart successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
        return back();
    }
    //cart update
    public function cartupdate(Request $request, $rowid)
    {
        $cart = Cart::get($rowid);
        $product = Product::find($request->productid);
        //    $a=[$cart->options];
        //       dd($cart->options,$cart,array_key_exists("volume",$a));
        $id = $request->productid;
        (int)$qtyblade = $request->changeqty;

        (int)$quantity = "";

        if ($cart->options['size'] != null) {
            $size = $cart->options['size'];
            if ($size == 's') {
                if ($product->s < $qtyblade) {
                    Toastr::info('Product quantity is not available ', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
                    return back();
                } else {
                    (int)$quantity = $request->changeqty;
                }
            } elseif ($size == 'm') {
                if ($product->m < $qtyblade) {
                    Toastr::info('Product quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
                    return back();
                } else {
                    (int)$quantity = $request->changeqty;
                }
            } elseif ($size == 'l') {
                if ($product->l < $qtyblade) {
                    Toastr::info('Product quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
                    return back();
                } else {
                    (int)$quantity = $request->changeqty;
                }
            } elseif ($size == 'xl') {
                if ($product->xl < $qtyblade) {
                    Toastr::info('Product quantity is not available hh ', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
                    return back();
                } else {
                    (int)$quantity = $request->changeqty;
                }
            } elseif ($size == 'xxl') {
                if ($product->xxl < $qtyblade) {
                    Toastr::info('Product quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
                    return back();
                } else {
                    (int)$quantity = $request->changeqty;
                }
            }
        } elseif ($cart->options['volume'] != null) {
            $volume = (int)($cart->options['volume']);

            $qty1 = $product->volumes()->where('product_id', '=', $product->id)->where('volume_id', '=', $volume)->first()->pivot->qty;
            // dd($qty1);
            if ((int)$qty1 < (int)$qtyblade) {
                // dd("hello");
                Toastr::info('Product quantity is not available v', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 1000,]);
                return back();
            } else {
                (int)$quantity = $request->changeqty;
            }
        } else {
            if ($request->changeqty > $product->total) {
                Toastr::info('Product quantity is not available ss', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 1000,]);
                return back();
            } else {
                (int)$quantity = $request->changeqty;
            }
        }

        // dd($quantity);

        (int)$price = "";
        if ($product->volume == "no" && $product->size == "yes") {
            $price = (int)$product->main_price;
        } elseif ($product->volume == "no" && $product->size == "no") {
            $price = (int)$product->main_price;
        } elseif ($product->volume == "yes") {

            $volume = $cart->options['volume'];
            //    dd(array_key_exists("volume",[$cart->options]));
            $price = $product->volumes()->where('product_id', $product->id)->where('volume_id', $volume)->first()->pivot->price;
        }

        if ($cart->options['size'] != null) {

            $totalprice = ((int)$quantity * (int)$price);
            $image = $product->image1;
            $size = $cart->options['size'];
            Cart::Update($cart->rowId, ['qty' => $quantity, $price, 'options' => ['size' => $size, 'volume' => null, 'volumename' => null, 'totalprice' => $totalprice, 'image' => $image, 'slug' => $product->slug]]);
            Toastr::info('Cart update successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
            return back();
        } elseif ($cart->options['volume'] != null) {

            $totalprice = ((int)$quantity * (int)$price);
            $image = $product->image1;
            $volume = $cart->options['volume'];
            $volumename = Volume::find($volume);
            Cart::Update($cart->rowId, ['qty' => $quantity, $price, 'options' => ['size' => null, 'volume' => $volume, 'volumename' => $volumename->name, 'totalprice' => $totalprice, 'image' => $image, 'slug' => $product->slug]]);
            Toastr::info('Cart update successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
            return back();
        } elseif ($cart->options['size'] == null &&  $cart->options['volume'] == null) {
            $totalprice = ((int)$quantity * (int)$price);
            $image = $product->image1;
            Cart::Update($cart->rowId, ['qty' => $quantity, $price, 'options' => ['size' => null, 'volume' => null, 'volumename' => null, 'totalprice' => $totalprice, 'image' => $image, 'slug' => $product->slug]]);
            Toastr::info('Cart update successfully', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50,]);
            return back();
        }
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
