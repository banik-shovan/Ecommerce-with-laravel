<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Library\SslCommerz\SslCommerzNotification;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Volume;
use App\Models\Orderinternal;
use App\Models\Oderitem;
use App\Models\User;
use App\Helper\Helper;
use Toastr;
use PDF;
use Illuminate\Support\Facades\Mail;

class SslCommerzPaymentController extends Controller
{


    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function CheckoutGuest(Request $request)
    {
        // dd($request->all());
        // start checking cart quantity are available or not
        foreach (Cart::content() as $cart) {
            $product = Product::find($cart->id);
            if ($cart->options['size'] != null) {
                $size = $cart->options['size'];
                if ($size == 's') {
                    if ($product->s < $cart->qty) {
                        $name = $cart->name;
                        Toastr::info($name . ' "S" size quantity is not available', '', ['name' => $name, "positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                        return back();
                    }
                } elseif ($size == 'm') {
                    if ($product->m < $cart->qty) {
                        $name = $cart->name;
                        Toastr::info($name . ' "M" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                        return back();
                    }
                } elseif ($size == 'l') {
                    if ($product->l < $cart->qty) {
                        $name = $cart->name;
                        Toastr::info($name . ' "L" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                        return back();
                    }
                } elseif ($size == 'xl') {
                    if ($product->xl < $cart->qty) {
                        $name = $cart->name;
                        Toastr::info($name . ' "XL" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                        return back();
                    }
                } elseif ($size == 'xxl') {
                    if ($product->xxl < $cart->qty) {
                        $name = $cart->name;
                        Toastr::info($name . ' "XXL" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                        return back();
                    }
                }
            } elseif ($cart->options['volume'] != null) {
                $volume = (int)($cart->options['volume']);

                $qty1 = $product->volumes()->where('product_id', '=', $product->id)->where('volume_id', '=', $volume)->first()->pivot->qty;
                // dd($qty1);
                if ((int)$qty1 < (int)$cart->qty) {
                    // dd("hello");
                    $name = $cart->name;
                    $option = $cart->options['volumename'];
                    Toastr::info($name . ' ' . $option . ' quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 1000, 'timeout' => 30000,]);
                    return back();
                }
            } else {
                if ($cart->qty > $product->total) {
                    $name = $cart->name;
                    Toastr::info($name . ' quantity is not available ss', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 1000, 'timeout' => 30000,]);
                    return back();
                }
            }
        }
        // end checking cart quantity are available or not

        // dd($request->all());
        $point = "not_apply";
        $user = Auth::User();

        $total = Cart::total();
        if (isset($request->coupon)) {
            $coupon = Coupon::where('coupon_name', '=', $request->coupon)->where('active_or_deactivate', '=', 'yes')->first();

            if (isset($coupon)) {
                $total = floatval(preg_replace("/[^-0-9\.]/", "", $total)) - floatval($coupon->coupon_price);
            } else {
                Toastr::info('Coupon code is not valid !', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 70, 'timeout' => 30000,]);
                return back();
            }
        } else {
            $total = Cart::total();
        }

        //check user point and detact taka 15% from user total money
        if ($user) {
            if ($user->userprofile->user_point >= 0) {
                if ($user->userprofile->user_point >= 100) {
                    $percentToGet = 15;
                    // dd("hello point");
                    //Convert our percentage value into a decimal.
                    $percentInDecimal = $percentToGet / 100;

                    //Get the result.

                    $totaltemp = floatval($percentInDecimal) * floatval(preg_replace("/[^-0-9\.]/", "", $total));
                    $totaltemp = floatval(preg_replace("/[^-0-9\.]/", "", $total)) - floatval($totaltemp);
                    // dd($percentInDecimal,$total,$totaltemp);
                    $total = floatval(preg_replace("/[^-0-9\.]/", "", $totaltemp));
                    $point = "apply";
                } elseif ($user->userprofile->user_point >= 0 && $user->userprofile->user_point < 100) {
                    $totaltemp = $total;
                    $total = floatval(preg_replace("/[^-0-9\.]/", "", $totaltemp));
                }
            }
        }
        //check user point and detact taka 15% from user total money end
        // set the user is guest or not
        $userguest = $request->user_or_guest;
        //set end the user is guest or not
        if (isset($request->coupon)) {
            $coupon = Coupon::where('coupon_name', '=', $request->coupon)->where('active_or_deactivate', '=', 'yes')->first();
            return view('checkout')->with('total', $total)->with('coupon', $coupon)->with('point', $point)->with('userguest', $userguest);
        } else {
            $coupon = "no";
            return view('checkout')->with('total', $total)->with('coupon', $coupon)->with('point', $point)->with('userguest', $userguest);
        }
        // $total=Cart::subtotal();

    }

    public function exampleHostedCheckoutUser(Request $request)
    {
        // dd($request->all());
        // start checking cart quantity are available or not
        foreach (Cart::content() as $cart) {
            $product = Product::find($cart->id);
            if ($cart->options['size'] != null) {
                $size = $cart->options['size'];
                if ($size == 's') {
                    if ($product->s < $cart->qty) {
                        $name = $cart->name;
                        Toastr::info($name . ' "S" size quantity is not available', '', ['name' => $name, "positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                        return back();
                    }
                } elseif ($size == 'm') {
                    if ($product->m < $cart->qty) {
                        $name = $cart->name;
                        Toastr::info($name . ' "M" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                        return back();
                    }
                } elseif ($size == 'l') {
                    if ($product->l < $cart->qty) {
                        $name = $cart->name;
                        Toastr::info($name . ' "L" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                        return back();
                    }
                } elseif ($size == 'xl') {
                    if ($product->xl < $cart->qty) {
                        $name = $cart->name;
                        Toastr::info($name . ' "XL" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                        return back();
                    }
                } elseif ($size == 'xxl') {
                    if ($product->xxl < $cart->qty) {
                        $name = $cart->name;
                        Toastr::info($name . ' "XXL" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                        return back();
                    }
                }
            } elseif ($cart->options['volume'] != null) {
                $volume = (int)($cart->options['volume']);

                $qty1 = $product->volumes()->where('product_id', '=', $product->id)->where('volume_id', '=', $volume)->first()->pivot->qty;
                // dd($qty1);
                if ((int)$qty1 < (int)$cart->qty) {
                    // dd("hello");
                    $name = $cart->name;
                    $option = $cart->options['volumename'];
                    Toastr::info($name . ' ' . $option . ' quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 1000, 'timeout' => 30000,]);
                    return back();
                }
            } else {
                if ($cart->qty > $product->total) {
                    $name = $cart->name;
                    Toastr::info($name . ' quantity is not available ss', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 1000, 'timeout' => 30000,]);
                    return back();
                }
            }
        }
        // end checking cart quantity are available or not

        // dd($request->all());
        $point = "not_apply";
        $user = Auth::User();

        $total = Cart::total();
        if (isset($request->coupon)) {
            $coupon = Coupon::where('coupon_name', '=', $request->coupon)->where('active_or_deactivate', '=', 'yes')->first();

            if (isset($coupon)) {
                $total = floatval(preg_replace("/[^-0-9\.]/", "", $total)) - floatval($coupon->coupon_price);
            } else {
                Toastr::info('Coupon code is not valid !', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 70, 'timeout' => 30000,]);
                return back();
            }
        } else {
            $total = Cart::total();
        }

        //check user point and detact taka 15% from user total money
        if ($user) {
            if ($user->userprofile->user_point >= 0) {
                if ($user->userprofile->user_point >= 100) {
                    $percentToGet = 15;
                    // dd("hello point");
                    //Convert our percentage value into a decimal.
                    $percentInDecimal = $percentToGet / 100;

                    //Get the result.

                    $totaltemp = floatval($percentInDecimal) * floatval(preg_replace("/[^-0-9\.]/", "", $total));
                    $totaltemp = floatval(preg_replace("/[^-0-9\.]/", "", $total)) - floatval($totaltemp);
                    // dd($percentInDecimal,$total,$totaltemp);
                    $total = floatval(preg_replace("/[^-0-9\.]/", "", $totaltemp));
                    $point = "apply";
                } elseif ($user->userprofile->user_point >= 0 && $user->userprofile->user_point < 100) {
                    $totaltemp = $total;
                    $total = floatval(preg_replace("/[^-0-9\.]/", "", $totaltemp));
                }
            }
        }
        //check user point and detact taka 15% from user total money end
        // set the user is guest or not
        $userguest = $request->user_or_guest;
        //set end the user is guest or not
        if (isset($request->coupon)) {
            $coupon = Coupon::where('coupon_name', '=', $request->coupon)->where('active_or_deactivate', '=', 'yes')->first();
            return view('checkout')->with('total', $total)->with('coupon', $coupon)->with('point', $point)->with('userguest', $userguest);
        } else {
            $coupon = "no";
            return view('checkout')->with('total', $total)->with('coupon', $coupon)->with('point', $point)->with('userguest', $userguest);
        }
        // $total=Cart::subtotal();

    }

    public function index(Request $request)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.
        // dd($request->all());
        if ($request->user_guest == "user") {
            if ($request->save_info == "on") {
                // dd($request->all());
                $user = Auth::User();
                $user->userprofile()->update([

                    'shipping_address' => $request->shipping_address,
                    'phone' => $request->phone,
                    'zip' => $request->zip,
                    'city' => $request->region,
                    'country' => $request->country,

                ]);
            }

            $user = Auth::User();
            if ($request->payment_option == "cash_on") {
                // dd($request->all());
                // start checking cart quantity are available or not
                foreach (Cart::content() as $cart) {
                    $product = Product::find($cart->id);
                    if ($cart->options['size'] != null) {
                        $size = $cart->options['size'];
                        if ($size == 's') {
                            if ($product->s < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "S" size quantity is not available.', '', ['name' => $name, "positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        } elseif ($size == 'm') {
                            if ($product->m < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "M" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        } elseif ($size == 'l') {
                            if ($product->l < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "L" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        } elseif ($size == 'xl') {
                            if ($product->xl < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "XL" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        } elseif ($size == 'xxl') {
                            if ($product->xxl < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "XXL" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        }
                    } elseif ($cart->options['volume'] != null) {
                        $volume = (int)($cart->options['volume']);

                        $qty1 = $product->volumes()->where('product_id', '=', $product->id)->where('volume_id', '=', $volume)->first()->pivot->qty;
                        // dd($qty1);
                        if ((int)$qty1 < (int)$cart->qty) {
                            // dd("hello");
                            $name = $cart->name;
                            $option = $cart->options['volumename'];
                            Toastr::info($name . ' ' . $option . ' quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 1000, 'timeout' => 30000,]);
                            return redirect()->route('cart');
                        }
                    } else {
                        if ($cart->qty > $product->total) {
                            $name = $cart->name;
                            Toastr::info($name . ' quantity is not available ss', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 1000, 'timeout' => 30000,]);
                            return redirect()->route('cart');
                        }
                    }
                }
                // end checking cart quantity are available or not

                //total amount calculation

                $total = Cart::total();
                $couponprice = 0;
                $point = "not_apply";
                $deliverycharge = 0;
                $deliveryoption = "";
                if ($request->couponcode != "null") {
                    //   dd($request->couponcode);
                    $coupon = Coupon::where('coupon_name', '=', $request->couponcode)->where('active_or_deactivate', '=', 'yes')->first();

                    //  dd($coupon);
                    $couponprice = $coupon->coupon_price;
                    if (isset($coupon)) {
                        $total = floatval(preg_replace("/[^-0-9\.]/", "", $total)) - floatval($couponprice);
                    }
                } else {
                    $totaltemp = Cart::total();
                    $total = floatval(preg_replace("/[^-0-9\.]/", "", $totaltemp));
                }
                // delivaery charge calculation
                if ($request->region != "Dhaka") {
                    $total = floatval(preg_replace("/[^-0-9\.]/", "", $total)) + floatval(preg_replace("/[^-0-9\.]/", "", 130));
                    $deliverycharge = 130;
                    $deliveryoption = "outside_dhaka"; //depends on city
                } else {
                    $total = floatval(preg_replace("/[^-0-9\.]/", "", $total)) + floatval(preg_replace("/[^-0-9\.]/", "", 60));;
                    $deliverycharge = 60;
                    $deliveryoption = "inside_dhaka"; //depends on city
                }
                // delivaery charge calculation end
                // dd($total, $deliverycharge, $deliveryoption);
                //check user point and detact taka 15% from user total money
                // if ($user->userprofile->user_point >= 0) {
                //     if ($user->userprofile->user_point >= 100) {
                //         $percentToGet = 15;

                //         //Convert our percentage value into a decimal.
                //         $percentInDecimal = $percentToGet / 100;

                //         //Get the result.
                //         $totaltemp = floatval($percentInDecimal) * floatval(preg_replace("/[^-0-9\.]/", "", $total));
                //         $totaltemp = floatval(preg_replace("/[^-0-9\.]/", "", $total)) - floatval($totaltemp);
                //         $total = floatval(preg_replace("/[^-0-9\.]/", "", $totaltemp));
                //         $point = "apply";
                //         // $user->userprofile->user_point = 0;
                //         $user->userprofile()->update([
                //             'user_point' => 0,
                //         ]);
                //     } elseif ($user->userprofile->user_point >= 0 && $user->userprofile->user_point < 100) {
                //         $totaltemp = $total;
                //         $total = floatval(preg_replace("/[^-0-9\.]/", "", $totaltemp));
                //         $pointtemp = $totaltemp / 100;
                //         $userpointtemp = $user->userprofile->user_point + $pointtemp;
                //         $user->userprofile()->update([
                //             'user_point' => $userpointtemp,
                //         ]);
                //     }
                // }
                //check user point and detact taka 15% from user total money
                //total amount calculation end
                $before_totaltemp = Cart::total();
                $before_total = floatval(preg_replace("/[^-0-9\.]/", "", Cart::total()));
                $order_unique_id = Helper::instance()->generateOrderUniqueId();
                $orderinternal = Orderinternal::create([
                    'user_id' => $user->id,
                    'order_unique_id' => $order_unique_id,
                    'payment_type' => $request->payment_option,
                    'status' => "pending",
                    'total_amount_before_cupon_point' => $before_total,
                    'total_amount' => $total,
                    'trems_policy' => "on",
                    'shipping_address' => $request->shipping_address,
                    'country' => $request->country,
                    'city' => $request->region,
                    'zip' => $request->zip,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'point' => $point,
                    'coupon' => $request->couponcode,
                    'coupon_price' => $couponprice,
                    'delivery_option' => $deliveryoption,
                    'delivery_charge' => $deliverycharge,
                    'transaction_id' => "null",
                ]);
                //cart item save individual by orderinternal id
                foreach (Cart::content() as $cart) {
                    Oderitem::create([
                        'orderinternal_id' => $orderinternal->id,
                        'user_id' => $user->id,
                        'product_id' => $cart->id,
                        'qty' => $cart->qty,
                        'name' => $cart->name,
                        'price' => $cart->price,
                        'size' => $cart->options['size'],
                        'volumename' => $cart->options['volumename'],
                        'totalprice' => $cart->options['totalprice'],
                        'image' => $cart->options['image'],
                        'slug' => $cart->options['slug'],

                    ]);
                    $product = Product::find($cart->id);
                    if ($cart->options['size'] != null) {
                        $size = $cart->options['size'];
                        // dd($size);
                        if ($size == 's') {

                            $product_qty = (int)$product->s - (int)$cart->qty;

                            $total_qty = (int)$product->total - (int)$cart->qty;

                            $product->s = $product_qty;
                            $product->total = $total_qty;
                            $product->save();
                        } elseif ($size == 'm') {
                            $product_qty = (int)$product->m - (int)$cart->qty;
                            $total_qty = (int)$product->total - (int)$cart->qty;
                            // dd((int)$cart->qty,$product_qty,$total_qty);
                            $product->m = $product_qty;
                            $product->total = $total_qty;
                            $product->save();
                        } elseif ($size == 'l') {
                            $product_qty = (int)$product->l - (int)$cart->qty;
                            $total_qty = (int)$product->total - (int)$cart->qty;
                            $product->l = $product_qty;
                            $product->total = $total_qty;
                            $product->save();
                        } elseif ($size == 'xl') {
                            $product_qty = (int)$product->xl - (int)$cart->qty;
                            $total_qty = (int)$product->total - (int)$cart->qty;
                            $product->xl = $product_qty;
                            $product->total = $total_qty;
                            $product->save();
                        } elseif ($size == 'xxl') {

                            $product_qty = (int)$product->xxl - (int)$cart->qty;
                            $total_qty = (int)$product->total - (int)$cart->qty;
                            $product->xxl = $product_qty;
                            $product->total = $total_qty;
                            $product->save();
                        }
                    } elseif ($cart->options['volume'] != null) {
                        $volume = (int)($cart->options['volume']);

                        $qty1 = $product->volumes()->where('product_id', '=', $product->id)->where('volume_id', '=', $volume)->first()->pivot->qty;
                        $product_qty = (int)$qty1 - (int)$cart->qty;
                        $total_qty = (int)$product->total - (int)$cart->qty;
                        $product->total = $total_qty;
                        $product->save();
                        $product->volumes()->updateExistingPivot($volume, ['qty' => $product_qty]);
                        // if((int)$qty1 < (int)$cart->qty){
                        //     // dd("hello");
                        //     $name=$cart->name;
                        //     $option=$cart->options['volumename'];
                        //     Toastr::info($name.' '.$option.' quantity is not available', '', ["positionClass" => "toast-top-center",'progressBar'=> true, 'showDuration'=> 1000,'timeout'=>30000,]);
                        //     return redirect()->route('cart');
                        // }
                        // dd("volume save");

                    } else {

                        $total_qty = (int)$product->total - (int)$cart->qty;
                        $product->total = $total_qty;
                        $product->save();
                    }
                }
                //cart item save individual by orderinternal id end
                foreach (Cart::content() as $cart) {
                    Cart::remove($cart->rowId);
                }
                // sending mail to fakhruddinassociates@gmail.com

                $data['app'] = Orderinternal::find($orderinternal->id);
                $pdf = PDF::loadView('invoicepdf', $data)->setPaper('A4', 'Potrait')->setOptions(['defaultFont' => 'sans-serif']);
                // $app=Orderinternal::find($id);

                $dat["email"] = "fakhruddinassociates@gmail.com";
                $dat["subject"] = "Invoice No:" . $data['app']->order_unique_id;
                $dat['pdf'] = $pdf->output();

                Mail::send([], $dat,  function ($message) use ($dat) {
                    $message->to($dat["email"])
                        ->subject($dat["subject"])
                        ->attachData($dat['pdf'], 'invoice.pdf', [
                            'mime' => 'application/pdf',
                        ])
                        ->setBody('
                                Dear Sir / Madam,
                                You have new order.Please check this order.

                                ');
                });
                $userdat["email"] = $data['app']->email;
                $userdat["subject"] = "Invoice mail";
                $userdat['pdf'] = $pdf->output();
                Mail::send([], $userdat,  function ($message) use ($userdat) {
                    $message->to($userdat["email"])
                        ->subject($userdat["subject"])
                        ->attachData($userdat['pdf'], 'invoice.pdf', [
                            'mime' => 'application/pdf',
                        ])
                        ->setBody('
                                Dear Sir / Madam,
                                Thank you for purchase. your order is placed successfully

                                ');
                });
                // mail is end

                Toastr::info('Your Order Successfully Placed', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
                return redirect()->route('userprofile');
            } elseif ($request->payment_option == "digital_pay") {


                // dd("ssl ");
                // start checking cart quantity are available or not
                foreach (Cart::content() as $cart) {
                    $product = Product::find($cart->id);
                    if ($cart->options['size'] != null) {
                        $size = $cart->options['size'];
                        if ($size == 's') {
                            if ($product->s < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "S" size quantity is not available.', '', ['name' => $name, "positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        } elseif ($size == 'm') {
                            if ($product->m < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "M" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        } elseif ($size == 'l') {
                            if ($product->l < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "L" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        } elseif ($size == 'xl') {
                            if ($product->xl < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "XL" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        } elseif ($size == 'xxl') {
                            if ($product->xxl < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "XXL" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        }
                    } elseif ($cart->options['volume'] != null) {
                        $volume = (int)($cart->options['volume']);

                        $qty1 = $product->volumes()->where('product_id', '=', $product->id)->where('volume_id', '=', $volume)->first()->pivot->qty;
                        // dd($qty1);
                        if ((int)$qty1 < (int)$cart->qty) {
                            // dd("hello");
                            $name = $cart->name;
                            $option = $cart->options['volumename'];
                            Toastr::info($name . ' ' . $option . ' quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 1000, 'timeout' => 30000,]);
                            return redirect()->route('cart');
                        }
                    } else {
                        if ($cart->qty > $product->total) {
                            $name = $cart->name;
                            Toastr::info($name . ' quantity is not available ss', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 1000, 'timeout' => 30000,]);
                            return redirect()->route('cart');
                        }
                    }
                }
                // end checking cart quantity are available or not

                //total amount calculation
                $point = "not_apply";
                $total = Cart::total();
                $couponprice = 0;
                $deliverycharge = 0;
                $deliveryoption = "";
                if ($request->couponcode != "null") {
                    //   dd($request->couponcode);
                    $coupon = Coupon::where('coupon_name', '=', $request->couponcode)->where('active_or_deactivate', '=', 'yes')->first();

                    //  dd($coupon);
                    $couponprice = $coupon->coupon_price;
                    if (isset($coupon)) {
                        $total = floatval(preg_replace("/[^-0-9\.]/", "", $total)) - floatval($couponprice);
                    }
                } else {
                    $totaltemp = Cart::total();
                    $total = floatval(preg_replace("/[^-0-9\.]/", "", $totaltemp));
                }
                // delivaery charge calculation
                if ($request->region != "Dhaka") {
                    $total = floatval(preg_replace("/[^-0-9\.]/", "", $total)) + floatval(preg_replace("/[^-0-9\.]/", "", 130));
                    $deliverycharge = 130;
                    $deliveryoption = "outside_dhaka"; //depends on city
                } else {
                    $total = floatval(preg_replace("/[^-0-9\.]/", "", $total)) + floatval(preg_replace("/[^-0-9\.]/", "", 60));;
                    $deliverycharge = 60;
                    $deliveryoption = "inside_dhaka"; //depends on city
                }
                // delivaery charge calculation end
                //check user point and detact taka 15% from user total money
                // if ($user->userprofile->user_point >= 0) {
                //     if ($user->userprofile->user_point >= 100) {
                //         $percentToGet = 15;

                //         //Convert our percentage value into a decimal.
                //         $percentInDecimal = $percentToGet / 100;

                //         //Get the result.
                //         $totaltemp = floatval($percentInDecimal) * floatval(preg_replace("/[^-0-9\.]/", "", $total));
                //         $totaltemp = floatval(preg_replace("/[^-0-9\.]/", "", $total)) - floatval($totaltemp);
                //         $total = floatval(preg_replace("/[^-0-9\.]/", "", $totaltemp));
                //         $point = "apply";
                //         $user->userprofile()->update([
                //             'user_point' => 0,
                //         ]);
                //     }
                // }
                //check user point and detact taka 15% from user total money
                //2.5 % taka add to total amount for digital pay
                $digital_pay_charge = floatval(2.5 / 100);
                $totaltempdigitalcharge = floatval($digital_pay_charge) * floatval(preg_replace("/[^-0-9\.]/", "", $total));
                $total = floatval(preg_replace("/[^-0-9\.]/", "", $total)) + floatval($totaltempdigitalcharge);

                //total amount calculation end
                $transaction_id = Helper::instance()->generateOrderNR();
                $order_unique_id = Helper::instance()->generateOrderUniqueId();
                // dd($order_unique_id);
                $user = Auth::User();
                $orderinternal = Orderinternal::create([
                    'user_id' => $user->id,
                    'order_unique_id' => $order_unique_id,
                    'payment_type' => $request->payment_option,
                    'status' => "pending",
                    'total_amount_before_cupon_point' => floatval(preg_replace("/[^-0-9\.]/", "", Cart::total())),
                    'total_amount' => $total,
                    'trems_policy' => "on",
                    'shipping_address' => $request->shipping_address,
                    'country' => $request->country,
                    'city' => $request->region,
                    'zip' => $request->zip,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'point' => $point,
                    'coupon' => $request->couponcode,
                    'coupon_price' => $couponprice,
                    'delivery_option' => $deliveryoption,
                    'delivery_charge' => $deliverycharge,
                    'digital_pay_charge' => 'yes',
                    'digital_pay_charge_amount' => $totaltempdigitalcharge,
                    'transaction_id' => $transaction_id,
                ]);

                foreach (Cart::content() as $cart) {
                    Oderitem::create([
                        'orderinternal_id' => $orderinternal->id,
                        'user_id' => $user->id,
                        'product_id' => $cart->id,
                        'qty' => $cart->qty,
                        'name' => $cart->name,
                        'price' => $cart->price,
                        'size' => $cart->options['size'],
                        'volumename' => $cart->options['volumename'],
                        'totalprice' => $cart->options['totalprice'],
                        'image' => $cart->options['image'],
                        'slug' => $cart->options['slug'],

                    ]);
                    // $product= Product::find($cart->id);
                    // if($cart->options['size']!=null){
                    //     $size=$cart->options['size'];

                    //     if($size == 's'){

                    //             $product_qty=(int)$product->s - (int)$cart->qty;

                    //             $total_qty=(int)$product->total - (int)$cart->qty;

                    //             $product->s = $product_qty;
                    //             $product->total = $total_qty;
                    //             $product->save();


                    //     }
                    //     elseif($size == 'm'){
                    //             $product_qty=(int)$product->m - (int)$cart->qty;
                    //             $total_qty=(int)$product->total - (int)$cart->qty;

                    //             $product->m = $product_qty;
                    //             $product->total = $total_qty;
                    //             $product->save();


                    //     }
                    //     elseif($size == 'l'){
                    //             $product_qty=(int)$product->l - (int)$cart->qty;
                    //             $total_qty=(int)$product->total - (int)$cart->qty;
                    //             $product->l = $product_qty;
                    //             $product->total = $total_qty;
                    //             $product->save();

                    //     }
                    //     elseif($size == 'xl'){
                    //         $product_qty=(int)$product->xl - (int)$cart->qty;
                    //             $total_qty=(int)$product->total - (int)$cart->qty;
                    //             $product->xl = $product_qty;
                    //             $product->total = $total_qty;
                    //             $product->save();

                    //     }
                    //     elseif($size == 'xxl'){

                    //         $product_qty=(int)$product->xxl - (int)$cart->qty;
                    //             $total_qty=(int)$product->total - (int)$cart->qty;
                    //             $product->xxl = $product_qty;
                    //             $product->total = $total_qty;
                    //             $product->save();
                    //     }

                    // }elseif($cart->options['volume']!=null){
                    //     $volume=(int)($cart->options['volume']);

                    //     $qty1=$product->volumes()->where('product_id','=',$product->id)->where('volume_id','=', $volume)->first()->pivot->qty;
                    //         $product_qty=(int)$qty1 - (int)$cart->qty;
                    //         $total_qty=(int)$product->total - (int)$cart->qty;
                    //         $product->total = $total_qty;
                    //         $product->save();
                    //         $product->volumes()->updateExistingPivot($volume,['qty'=>$product_qty]);


                    // }else{

                    //         $total_qty=(int)$product->total - (int)$cart->qty;
                    //         $product->total = $total_qty;
                    //         $product->save();
                    // }


                }

                // for ssl
                $post_data = array();
                $post_data['total_amount'] = $total; # You cant not pay less than 10
                $post_data['currency'] = "BDT";
                $post_data['tran_id'] = $transaction_id; // tran_id must be unique

                # CUSTOMER INFORMATION
                $post_data['cus_name'] = $request->name;
                $post_data['cus_email'] = $request->email;
                $post_data['cus_add1'] = $request->shipping_address;
                $post_data['cus_add2'] = "";
                $post_data['cus_city'] = $request->region;
                $post_data['cus_state'] = "";
                $post_data['cus_postcode'] = "";
                $post_data['cus_country'] = "Bangladesh";
                $post_data['cus_phone'] = $request->phone;
                $post_data['cus_fax'] = "";

                # SHIPMENT INFORMATION
                $post_data['ship_name'] = "Store Test";
                $post_data['ship_add1'] = "Dhaka";
                $post_data['ship_add2'] = "Dhaka";
                $post_data['ship_city'] = "Dhaka";
                $post_data['ship_state'] = "Dhaka";
                $post_data['ship_postcode'] = "1000";
                $post_data['ship_phone'] = "";
                $post_data['ship_country'] = "Bangladesh";

                $post_data['shipping_method'] = "NO";
                $post_data['product_name'] = "Computer";
                $post_data['product_category'] = "Goods";
                $post_data['product_profile'] = "physical-goods";

                # OPTIONAL PARAMETERS
                $post_data['value_a'] = $user->id;
                $post_data['value_b'] = $point;
                $post_data['value_c'] = $orderinternal->id;
                $post_data['value_d'] = "ref004";

                #Before  going to initiate the payment order status need to insert or update as Pending.
                $update_product = DB::table('orders')
                    ->where('transaction_id', $post_data['tran_id'])
                    ->updateOrInsert([
                        'name' => $post_data['cus_name'],
                        'orderinternal_id' => $post_data['value_c'],
                        'user_id' => $post_data['value_a'],
                        'email' => $post_data['cus_email'],
                        'phone' => $post_data['cus_phone'],
                        'amount' => $post_data['total_amount'],
                        'status' => 'pending',
                        'address' => $post_data['cus_add1'],
                        'transaction_id' => $post_data['tran_id'],
                        'currency' => $post_data['currency']
                    ]);
                foreach (Cart::content() as $cart) {
                    Cart::remove($cart->rowId);
                }
                // dd(Cart::content());
                $sslc = new SslCommerzNotification();
                # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
                $payment_options = $sslc->makePayment($post_data, 'hosted');

                if (!is_array($payment_options)) {
                    print_r($payment_options);
                    $payment_options = array();
                }
            }
        } elseif ($request->user_guest == "guest") {

            // if($request->save_info == "on")
            // {
            //     // dd($request->all());
            //     $user=Auth::User();
            //     $user->userprofile()->update([

            //         'shipping_address'=>$request->shipping_address,
            //         'phone'=>$request->phone,
            //         'zip'=>$request->zip,
            //         'city'=>$request->region,
            //         'country'=>$request->country,

            //     ]);

            // }

            // $user=Auth::User();
            if ($request->payment_option == "cash_on") {
                // dd($request->all());
                // start checking cart quantity are available or not
                foreach (Cart::content() as $cart) {
                    $product = Product::find($cart->id);
                    if ($cart->options['size'] != null) {
                        $size = $cart->options['size'];
                        if ($size == 's') {
                            if ($product->s < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "S" size quantity is not available.', '', ['name' => $name, "positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        } elseif ($size == 'm') {
                            if ($product->m < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "M" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        } elseif ($size == 'l') {
                            if ($product->l < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "L" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        } elseif ($size == 'xl') {
                            if ($product->xl < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "XL" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        } elseif ($size == 'xxl') {
                            if ($product->xxl < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "XXL" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        }
                    } elseif ($cart->options['volume'] != null) {
                        $volume = (int)($cart->options['volume']);

                        $qty1 = $product->volumes()->where('product_id', '=', $product->id)->where('volume_id', '=', $volume)->first()->pivot->qty;
                        // dd($qty1);
                        if ((int)$qty1 < (int)$cart->qty) {
                            // dd("hello");
                            $name = $cart->name;
                            $option = $cart->options['volumename'];
                            Toastr::info($name . ' ' . $option . ' quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 1000, 'timeout' => 30000,]);
                            return redirect()->route('cart');
                        }
                    } else {
                        if ($cart->qty > $product->total) {
                            $name = $cart->name;
                            Toastr::info($name . ' quantity is not available ss', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 1000, 'timeout' => 30000,]);
                            return redirect()->route('cart');
                        }
                    }
                }
                // end checking cart quantity are available or not

                //total amount calculation

                $total = Cart::total();
                $couponprice = 0;
                $point = "not_apply";
                $deliverycharge = 0;
                $deliveryoption = "";
                if ($request->couponcode != "null") {
                    //   dd($request->couponcode);
                    $coupon = Coupon::where('coupon_name', '=', $request->couponcode)->where('active_or_deactivate', '=', 'yes')->first();

                    //  dd($coupon);
                    $couponprice = $coupon->coupon_price;
                    if (isset($coupon)) {
                        $total = floatval(preg_replace("/[^-0-9\.]/", "", $total)) - floatval($couponprice);
                    }
                } else {
                    $totaltemp = Cart::total();
                    $total = floatval(preg_replace("/[^-0-9\.]/", "", $totaltemp));
                }
                // delivaery charge calculation
                if ($request->region != "Dhaka") {
                    $total = floatval(preg_replace("/[^-0-9\.]/", "", $total)) + floatval(preg_replace("/[^-0-9\.]/", "", 130));
                    $deliverycharge = 130;
                    $deliveryoption = "outside_dhaka"; //depends on city
                } else {
                    $total = floatval(preg_replace("/[^-0-9\.]/", "", $total)) + floatval(preg_replace("/[^-0-9\.]/", "", 60));;
                    $deliverycharge = 60;
                    $deliveryoption = "inside_dhaka"; //depends on city
                }
                // delivaery charge calculation end
                //check user point and detact taka 15% from user total money
                // if($user->userprofile->user_point>=0)
                // {
                //     if($user->userprofile->user_point>=100){
                //         $percentToGet = 15;

                //         //Convert our percentage value into a decimal.
                //         $percentInDecimal = $percentToGet / 100;

                //         //Get the result.
                //         $totaltemp =floatval( $percentInDecimal) * floatval(preg_replace("/[^-0-9\.]/","",$total));
                //         $totaltemp= floatval(preg_replace("/[^-0-9\.]/","",$total)) - floatval( $totaltemp);
                //         $total=floatval(preg_replace("/[^-0-9\.]/","",$totaltemp));
                //         $point="apply";
                //         // $user->userprofile->user_point = 0;
                //         $user->userprofile()->update([
                //             'user_point' => 0,
                //         ]);

                //     }elseif($user->userprofile->user_point>=0 && $user->userprofile->user_point<100){
                //         $totaltemp = $total;
                //         $total=floatval(preg_replace("/[^-0-9\.]/","",$totaltemp));
                //         $pointtemp=$totaltemp/100;
                //         $userpointtemp=$user->userprofile->user_point + $pointtemp;
                //         $user->userprofile()->update([
                //             'user_point' => $userpointtemp,
                //         ]);
                //     }
                // }
                //check user point and detact taka 15% from user total money
                //total amount calculation end
                $before_totaltemp = Cart::total();
                $before_total = floatval(preg_replace("/[^-0-9\.]/", "", Cart::total()));
                $order_unique_id = Helper::instance()->generateOrderUniqueId();
                $orderinternal = Orderinternal::create([
                    // 'user_id'=>$user->id,
                    'order_unique_id' => $order_unique_id,
                    'payment_type' => $request->payment_option,
                    'status' => "pending",
                    'total_amount_before_cupon_point' => $before_total,
                    'total_amount' => $total,
                    'trems_policy' => "on",
                    'shipping_address' => $request->shipping_address,
                    'country' => $request->country,
                    'city' => $request->region,
                    'zip' => $request->zip,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'point' => $point,
                    'coupon' => $request->couponcode,
                    'coupon_price' => $couponprice,
                    'delivery_option' => $deliveryoption,
                    'delivery_charge' => $deliverycharge,
                    'transaction_id' => "null",
                ]);
                //cart item save individual by orderinternal id
                foreach (Cart::content() as $cart) {
                    Oderitem::create([
                        'orderinternal_id' => $orderinternal->id,
                        // 'user_id'=>$user->id,
                        'product_id' => $cart->id,
                        'qty' => $cart->qty,
                        'name' => $cart->name,
                        'price' => $cart->price,
                        'size' => $cart->options['size'],
                        'volumename' => $cart->options['volumename'],
                        'totalprice' => $cart->options['totalprice'],
                        'image' => $cart->options['image'],
                        'slug' => $cart->options['slug'],

                    ]);
                    $product = Product::find($cart->id);
                    if ($cart->options['size'] != null) {
                        $size = $cart->options['size'];
                        // dd($size);
                        if ($size == 's') {

                            $product_qty = (int)$product->s - (int)$cart->qty;

                            $total_qty = (int)$product->total - (int)$cart->qty;

                            $product->s = $product_qty;
                            $product->total = $total_qty;
                            $product->save();
                        } elseif ($size == 'm') {
                            $product_qty = (int)$product->m - (int)$cart->qty;
                            $total_qty = (int)$product->total - (int)$cart->qty;
                            // dd((int)$cart->qty,$product_qty,$total_qty);
                            $product->m = $product_qty;
                            $product->total = $total_qty;
                            $product->save();
                        } elseif ($size == 'l') {
                            $product_qty = (int)$product->l - (int)$cart->qty;
                            $total_qty = (int)$product->total - (int)$cart->qty;
                            $product->l = $product_qty;
                            $product->total = $total_qty;
                            $product->save();
                        } elseif ($size == 'xl') {
                            $product_qty = (int)$product->xl - (int)$cart->qty;
                            $total_qty = (int)$product->total - (int)$cart->qty;
                            $product->xl = $product_qty;
                            $product->total = $total_qty;
                            $product->save();
                        } elseif ($size == 'xxl') {

                            $product_qty = (int)$product->xxl - (int)$cart->qty;
                            $total_qty = (int)$product->total - (int)$cart->qty;
                            $product->xxl = $product_qty;
                            $product->total = $total_qty;
                            $product->save();
                        }
                    } elseif ($cart->options['volume'] != null) {
                        $volume = (int)($cart->options['volume']);

                        $qty1 = $product->volumes()->where('product_id', '=', $product->id)->where('volume_id', '=', $volume)->first()->pivot->qty;
                        $product_qty = (int)$qty1 - (int)$cart->qty;
                        $total_qty = (int)$product->total - (int)$cart->qty;
                        $product->total = $total_qty;
                        $product->save();
                        $product->volumes()->updateExistingPivot($volume, ['qty' => $product_qty]);
                        // if((int)$qty1 < (int)$cart->qty){
                        //     // dd("hello");
                        //     $name=$cart->name;
                        //     $option=$cart->options['volumename'];
                        //     Toastr::info($name.' '.$option.' quantity is not available', '', ["positionClass" => "toast-top-center",'progressBar'=> true, 'showDuration'=> 1000,'timeout'=>30000,]);
                        //     return redirect()->route('cart');
                        // }
                        // dd("volume save");

                    } else {

                        $total_qty = (int)$product->total - (int)$cart->qty;
                        $product->total = $total_qty;
                        $product->save();
                    }
                }
                // sending mail to fakhruddinassociates@gmail.com

                $data['app'] = Orderinternal::find($orderinternal->id);
                $pdf = PDF::loadView('invoicepdf', $data)->setPaper('A4', 'Potrait')->setOptions(['defaultFont' => 'sans-serif']);
                // $app=Orderinternal::find($id);

                $dat["email"] = "fakhruddinassociates@gmail.com";
                $dat["subject"] = "Invoice No:" . $data['app']->order_unique_id;
                $dat['pdf'] = $pdf->output();

                Mail::send([], $dat,  function ($message) use ($dat) {
                    $message->to($dat["email"])
                        ->subject($dat["subject"])
                        ->attachData($dat['pdf'], 'invoice.pdf', [
                            'mime' => 'application/pdf',
                        ])
                        ->setBody('
                                Dear Sir / Madam,
                                You have new order.Please check this order.

                                ');
                });
                $userdat["email"] = $data['app']->email;
                $userdat["subject"] = "Invoice mail";
                $userdat['pdf'] = $pdf->output();
                Mail::send([], $userdat,  function ($message) use ($userdat) {
                    $message->to($userdat["email"])
                        ->subject($userdat["subject"])
                        ->attachData($userdat['pdf'], 'invoice.pdf', [
                            'mime' => 'application/pdf',
                        ])
                        ->setBody('
                                    Dear Sir / Madam,
                                    Thank you for purchase. your order is placed successfully

                                    ');
                });
                // mail is end
                //cart item save individual by orderinternal id end
                foreach (Cart::content() as $cart) {
                    Cart::remove($cart->rowId);
                }

                Toastr::info('Your Order Successfully Placed', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 20,]);
                return redirect()->route('index');
            } elseif ($request->payment_option == "digital_pay") {


                // dd("ssl ");
                // start checking cart quantity are available or not
                foreach (Cart::content() as $cart) {
                    $product = Product::find($cart->id);
                    if ($cart->options['size'] != null) {
                        $size = $cart->options['size'];
                        if ($size == 's') {
                            if ($product->s < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "S" size quantity is not available.', '', ['name' => $name, "positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        } elseif ($size == 'm') {
                            if ($product->m < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "M" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        } elseif ($size == 'l') {
                            if ($product->l < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "L" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        } elseif ($size == 'xl') {
                            if ($product->xl < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "XL" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        } elseif ($size == 'xxl') {
                            if ($product->xxl < $cart->qty) {
                                $name = $cart->name;
                                Toastr::info($name . ' "XXL" size quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 50, 'timeout' => 30000,]);
                                return redirect()->route('cart');
                            }
                        }
                    } elseif ($cart->options['volume'] != null) {
                        $volume = (int)($cart->options['volume']);

                        $qty1 = $product->volumes()->where('product_id', '=', $product->id)->where('volume_id', '=', $volume)->first()->pivot->qty;
                        // dd($qty1);
                        if ((int)$qty1 < (int)$cart->qty) {
                            // dd("hello");
                            $name = $cart->name;
                            $option = $cart->options['volumename'];
                            Toastr::info($name . ' ' . $option . ' quantity is not available', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 1000, 'timeout' => 30000,]);
                            return redirect()->route('cart');
                        }
                    } else {
                        if ($cart->qty > $product->total) {
                            $name = $cart->name;
                            Toastr::info($name . ' quantity is not available ss', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 1000, 'timeout' => 30000,]);
                            return redirect()->route('cart');
                        }
                    }
                }
                // end checking cart quantity are available or not

                //total amount calculation
                $point = "not_apply";
                $total = Cart::total();
                $couponprice = 0;
                $deliverycharge = 0;
                $deliveryoption = "";
                if ($request->couponcode != "null") {
                    //   dd($request->couponcode);
                    $coupon = Coupon::where('coupon_name', '=', $request->couponcode)->where('active_or_deactivate', '=', 'yes')->first();

                    //  dd($coupon);
                    $couponprice = $coupon->coupon_price;
                    if (isset($coupon)) {
                        $total = floatval(preg_replace("/[^-0-9\.]/", "", $total)) - floatval($couponprice);
                    }
                } else {
                    $totaltemp = Cart::total();
                    $total = floatval(preg_replace("/[^-0-9\.]/", "", $totaltemp));
                }
                // delivaery charge calculation
                if ($request->region != "Dhaka") {
                    $total = floatval(preg_replace("/[^-0-9\.]/", "", $total)) + floatval(preg_replace("/[^-0-9\.]/", "", 130));
                    $deliverycharge = 130;
                    $deliveryoption = "outside_dhaka"; //depends on city
                } else {
                    $total = floatval(preg_replace("/[^-0-9\.]/", "", $total)) + floatval(preg_replace("/[^-0-9\.]/", "", 60));;
                    $deliverycharge = 60;
                    $deliveryoption = "inside_dhaka"; //depends on city
                }
                // delivaery charge calculation end
                //check user point and detact taka 15% from user total money
                // if($user->userprofile->user_point>=0)
                // {
                //     if($user->userprofile->user_point>=100){
                //         $percentToGet = 15;

                //         //Convert our percentage value into a decimal.
                //         $percentInDecimal = $percentToGet / 100;

                //         //Get the result.
                //         $totaltemp =floatval( $percentInDecimal) * floatval(preg_replace("/[^-0-9\.]/","",$total));
                //         $totaltemp= floatval(preg_replace("/[^-0-9\.]/","",$total)) - floatval( $totaltemp);
                //         $total=floatval(preg_replace("/[^-0-9\.]/","",$totaltemp));
                //         $point="apply";
                //         $user->userprofile()->update([
                //             'user_point' => 0,
                //         ]);
                //     }elseif($user->userprofile->user_point>=0 && $user->userprofile->user_point<100){
                //         $totaltemp = $total;
                //         $total=floatval(preg_replace("/[^-0-9\.]/","",$totaltemp));
                //         $pointtemp=$totaltemp/100;
                //         $userpointtemp=$user->userprofile->user_point + $pointtemp;
                //         $user->userprofile()->update([
                //             'user_point' => $userpointtemp,
                //         ]);
                //     }
                // }
                //check user point and detact taka 15% from user total money
                //2.5 % taka add to total amount for digital pay
                $digital_pay_charge = floatval(2.5 / 100);
                $totaltempdigitalcharge = floatval($digital_pay_charge) * floatval(preg_replace("/[^-0-9\.]/", "", $total));
                $total = floatval(preg_replace("/[^-0-9\.]/", "", $total)) + floatval($totaltempdigitalcharge);

                //total amount calculation end
                $transaction_id = Helper::instance()->generateOrderNR();
                $order_unique_id = Helper::instance()->generateOrderUniqueId();
                // dd($order_unique_id);
                // $user=Auth::User();
                $orderinternal = Orderinternal::create([
                    // 'user_id'=>$user->id,
                    'order_unique_id' => $order_unique_id,
                    'payment_type' => $request->payment_option,
                    'status' => "pending",
                    'total_amount_before_cupon_point' => floatval(preg_replace("/[^-0-9\.]/", "", Cart::total())),
                    'total_amount' => $total,
                    'trems_policy' => "on",
                    'shipping_address' => $request->shipping_address,
                    'country' => $request->country,
                    'city' => $request->region,
                    'zip' => $request->zip,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'point' => $point,
                    'coupon' => $request->couponcode,
                    'coupon_price' => $couponprice,
                    'delivery_option' => $deliveryoption,
                    'delivery_charge' => $deliverycharge,
                    'digital_pay_charge' => 'yes',
                    'digital_pay_charge_amount' => $totaltempdigitalcharge,
                    'transaction_id' => $transaction_id,
                ]);

                foreach (Cart::content() as $cart) {
                    Oderitem::create([
                        'orderinternal_id' => $orderinternal->id,
                        // 'user_id'=>$user->id,
                        'product_id' => $cart->id,
                        'qty' => $cart->qty,
                        'name' => $cart->name,
                        'price' => $cart->price,
                        'size' => $cart->options['size'],
                        'volumename' => $cart->options['volumename'],
                        'totalprice' => $cart->options['totalprice'],
                        'image' => $cart->options['image'],
                        'slug' => $cart->options['slug'],

                    ]);
                }

                // for ssl
                $post_data = array();
                $post_data['total_amount'] = $total; # You cant not pay less than 10
                $post_data['currency'] = "BDT";
                $post_data['tran_id'] = $transaction_id; // tran_id must be unique

                # CUSTOMER INFORMATION
                $post_data['cus_name'] = $request->name;
                $post_data['cus_email'] = $request->email;
                $post_data['cus_add1'] = $request->shipping_address;
                $post_data['cus_add2'] = "";
                $post_data['cus_city'] = $request->region;
                $post_data['cus_state'] = "";
                $post_data['cus_postcode'] = "";
                $post_data['cus_country'] = "Bangladesh";
                $post_data['cus_phone'] = $request->phone;
                $post_data['cus_fax'] = "";

                # SHIPMENT INFORMATION
                $post_data['ship_name'] = "Store Test";
                $post_data['ship_add1'] = "Dhaka";
                $post_data['ship_add2'] = "Dhaka";
                $post_data['ship_city'] = "Dhaka";
                $post_data['ship_state'] = "Dhaka";
                $post_data['ship_postcode'] = "1000";
                $post_data['ship_phone'] = "";
                $post_data['ship_country'] = "Bangladesh";

                $post_data['shipping_method'] = "NO";
                $post_data['product_name'] = "Computer";
                $post_data['product_category'] = "Goods";
                $post_data['product_profile'] = "physical-goods";

                # OPTIONAL PARAMETERS
                $post_data['value_a'] = "null";
                $post_data['value_b'] = $point;
                $post_data['value_c'] = $orderinternal->id;
                $post_data['value_d'] = "ref004";

                #Before  going to initiate the payment order status need to insert or update as Pending.
                $update_product = DB::table('orders')
                    ->where('transaction_id', $post_data['tran_id'])
                    ->updateOrInsert([
                        'name' => $post_data['cus_name'],
                        'orderinternal_id' => $post_data['value_c'],
                        // 'user_id'=>$post_data['value_a'],
                        'email' => $post_data['cus_email'],
                        'phone' => $post_data['cus_phone'],
                        'amount' => $post_data['total_amount'],
                        'status' => 'pending',
                        'address' => $post_data['cus_add1'],
                        'transaction_id' => $post_data['tran_id'],
                        'currency' => $post_data['currency']
                    ]);

                // dd(Cart::content());
                $sslc = new SslCommerzNotification();
                # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
                $payment_options = $sslc->makePayment($post_data, 'hosted');

                if (!is_array($payment_options)) {
                    print_r($payment_options);
                    $payment_options = array();
                }
            }
        }
    }

    public function payViaAjax(Request $request)
    {

        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "orders"
        # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = '10'; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";


        #Before  going to initiate the payment order status need to update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency']
            ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }

    public function success(Request $request)
    {

        // echo "Transaction is Successful";
        // dd($request->all());
        // product qty reduce from database  & cart delete
        foreach (Cart::content() as $cart) {
            $product = Product::find($cart->id);
            if ($cart->options['size'] != null) {
                $size = $cart->options['size'];
                // dd($size);
                if ($size == 's') {

                    $product_qty = (int)$product->s - (int)$cart->qty;

                    $total_qty = (int)$product->total - (int)$cart->qty;

                    $product->s = $product_qty;
                    $product->total = $total_qty;
                    $product->save();
                } elseif ($size == 'm') {
                    $product_qty = (int)$product->m - (int)$cart->qty;
                    $total_qty = (int)$product->total - (int)$cart->qty;
                    // dd((int)$cart->qty,$product_qty,$total_qty);
                    $product->m = $product_qty;
                    $product->total = $total_qty;
                    $product->save();
                } elseif ($size == 'l') {
                    $product_qty = (int)$product->l - (int)$cart->qty;
                    $total_qty = (int)$product->total - (int)$cart->qty;
                    $product->l = $product_qty;
                    $product->total = $total_qty;
                    $product->save();
                } elseif ($size == 'xl') {
                    $product_qty = (int)$product->xl - (int)$cart->qty;
                    $total_qty = (int)$product->total - (int)$cart->qty;
                    $product->xl = $product_qty;
                    $product->total = $total_qty;
                    $product->save();
                } elseif ($size == 'xxl') {

                    $product_qty = (int)$product->xxl - (int)$cart->qty;
                    $total_qty = (int)$product->total - (int)$cart->qty;
                    $product->xxl = $product_qty;
                    $product->total = $total_qty;
                    $product->save();
                }
            } elseif ($cart->options['volume'] != null) {
                $volume = (int)($cart->options['volume']);

                $qty1 = $product->volumes()->where('product_id', '=', $product->id)->where('volume_id', '=', $volume)->first()->pivot->qty;
                $product_qty = (int)$qty1 - (int)$cart->qty;
                $total_qty = (int)$product->total - (int)$cart->qty;
                $product->total = $total_qty;
                $product->save();
                $product->volumes()->updateExistingPivot($volume, ['qty' => $product_qty]);
                // if((int)$qty1 < (int)$cart->qty){
                //     // dd("hello");
                //     $name=$cart->name;
                //     $option=$cart->options['volumename'];
                //     Toastr::info($name.' '.$option.' quantity is not available', '', ["positionClass" => "toast-top-center",'progressBar'=> true, 'showDuration'=> 1000,'timeout'=>30000,]);
                //     return redirect()->route('cart');
                // }
                // dd("volume save");

            } else {

                $total_qty = (int)$product->total - (int)$cart->qty;
                $product->total = $total_qty;
                $product->save();
            }
        }
        foreach (Cart::content() as $cart) {
            Cart::remove($cart->rowId);
        }
        // product qty reduce from database  & cart delete end
        // if the person is user he got point on purches
        if ($request->input('value_a') != "null") {
            $usertemp = $request->input('value_a');
            $user = User::find($usertemp);
            if ($user->userprofile->user_point >= 0 && $user->userprofile->user_point < 100) {
                $totaltemp = $request->input('amount');
                $total = floatval(preg_replace("/[^-0-9\.]/", "", $totaltemp));
                $pointtemp = $totaltemp / 100;
                $userpointtemp = $user->userprofile->user_point + $pointtemp;
                $user->userprofile()->update([
                    'user_point' => $userpointtemp,
                ]);
            }
        }

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $order_internal_id = $request->input('value_c');


        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'processing', 'card_type' => $request->card_type, 'bank_tran_id' => $request->bank_tran_id]);
                $update_order_internal = DB::table('orderinternals')
                    ->where('id', $order_internal_id)
                    ->update(['status' => 'processing']);
                // sending mail to fakhruddinassociates@gmail.com

                $data['app'] = Orderinternal::find($order_internal_id);
                $pdf = PDF::loadView('invoicepdf', $data)->setPaper('A4', 'Potrait')->setOptions(['defaultFont' => 'sans-serif']);
                // $app=Orderinternal::find($id);

                $dat["email"] = "fakhruddinassociates@gmail.com";
                $dat["subject"] = "Invoice No:" . $data['app']->order_unique_id;
                $dat['pdf'] = $pdf->output();

                Mail::send([], $dat,  function ($message) use ($dat) {
                    $message->to($dat["email"])
                        ->subject($dat["subject"])
                        ->attachData($dat['pdf'], 'invoice.pdf', [
                            'mime' => 'application/pdf',
                        ])
                        ->setBody('
                                Dear Sir / Madam,
                                You have new order.Please check this order.

                                ');
                });
                $userdat["email"] = $data['app']->email;
                $userdat["subject"] = "Invoice mail";
                $userdat['pdf'] = $pdf->output();
                Mail::send([], $userdat,  function ($message) use ($userdat) {
                    $message->to($userdat["email"])
                        ->subject($userdat["subject"])
                        ->attachData($userdat['pdf'], 'invoice.pdf', [
                            'mime' => 'application/pdf',
                        ])
                        ->setBody('
                                Dear Sir / Madam,
                                Thank you for purchase. your order is placed successfully

                                ');
                });
                // mail is end
                Toastr::info('Transaction is completed !', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 70,]);
                return redirect('/');
            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'cancelled']);
                $update_order_internal = DB::table('orderinternals')
                    ->where('id', $order_internal_id)
                    ->update(['status' => 'cancelled']);

                Toastr::info('Transaction is cancelled !', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 70,]);
                return redirect('/');
            }
        } else if ($order_detials->status == 'processing' || $order_detials->status == 'completed') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            Toastr::info('Transaction is completed !', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 70,]);
            return redirect('/');
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            Toastr::info('Transaction is invalid !', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 70,]);
            return redirect('/');
        }
    }

    public function fail(Request $request)
    {
        //cart data again add to the database
        // foreach(Cart::content() as $cart){
        //     $product= Product::find($cart->id);
        //     if($cart->options['size']!=null){
        //         $size=$cart->options['size'];
        //         // dd($size);
        //         if($size == 's'){

        //                 $product_qty=(int)$product->s + (int)$cart->qty;

        //                 $total_qty=(int)$product->total + (int)$cart->qty;

        //                 $product->s = $product_qty;
        //                 $product->total = $total_qty;
        //                 $product->save();


        //         }
        //         elseif($size == 'm'){
        //                 $product_qty=(int)$product->m + (int)$cart->qty;
        //                 $total_qty=(int)$product->total + (int)$cart->qty;
        //                 // dd((int)$cart->qty,$product_qty,$total_qty);
        //                 $product->m = $product_qty;
        //                 $product->total = $total_qty;
        //                 $product->save();


        //         }
        //         elseif($size == 'l'){
        //                 $product_qty=(int)$product->l + (int)$cart->qty;
        //                 $total_qty=(int)$product->total + (int)$cart->qty;
        //                 $product->l = $product_qty;
        //                 $product->total = $total_qty;
        //                 $product->save();

        //         }
        //         elseif($size == 'xl'){
        //             $product_qty=(int)$product->xl + (int)$cart->qty;
        //                 $total_qty=(int)$product->total + (int)$cart->qty;
        //                 $product->xl = $product_qty;
        //                 $product->total = $total_qty;
        //                 $product->save();

        //         }
        //         elseif($size == 'xxl'){

        //             $product_qty=(int)$product->xxl + (int)$cart->qty;
        //                 $total_qty=(int)$product->total + (int)$cart->qty;
        //                 $product->xxl = $product_qty;
        //                 $product->total = $total_qty;
        //                 $product->save();
        //         }

        //     }elseif($cart->options['volume']!=null){
        //         $volume=(int)($cart->options['volume']);

        //         $qty1=$product->volumes()->where('product_id','=',$product->id)->where('volume_id','=', $volume)->first()->pivot->qty;
        //             $product_qty=(int)$qty1 + (int)$cart->qty;
        //             $total_qty=(int)$product->total + (int)$cart->qty;
        //             $product->total = $total_qty;
        //             $product->save();
        //             $product->volumes()->updateExistingPivot($volume,['qty'=>$product_qty]);
        //         // if((int)$qty1 < (int)$cart->qty){
        //         //     // dd("hello");
        //         //     $name=$cart->name;
        //         //     $option=$cart->options['volumename'];
        //         //     Toastr::info($name.' '.$option.' quantity is not available', '', ["positionClass" => "toast-top-center",'progressBar'=> true, 'showDuration'=> 1000,'timeout'=>30000,]);
        //         //     return redirect()->route('cart');
        //         // }
        //         // dd("volume save");

        //     }else{

        //             $total_qty=(int)$product->total + (int)$cart->qty;
        //             $product->total = $total_qty;
        //             $product->save();
        //     }
        // }
        //cart data add in data base end
        // dd($request->all());
        $tran_id = $request->input('tran_id');
        $order_internal_id = $request->input('value_c');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'cancelled']);
            $update_order_internal = DB::table('orderinternals')
                ->where('id', $order_internal_id)
                ->update(['status' => 'cancelled']);
            Toastr::info('Transaction is cancelled !', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 70,]);
            return redirect('/');
        } else if ($order_detials->status == 'processing' || $order_detials->status == 'complete') {
            Toastr::info('Transaction is completed !', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 70,]);
            return redirect('/');
        } else {
            Toastr::info('Transaction is invalid !', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 70,]);
            return redirect('/');
        }
    }

    public function cancel(Request $request)
    {
        //cart data again add to the database
        // foreach(Cart::content() as $cart){
        //     $product= Product::find($cart->id);
        //     if($cart->options['size']!=null){
        //         $size=$cart->options['size'];
        //         // dd($size);
        //         if($size == 's'){

        //                 $product_qty=(int)$product->s + (int)$cart->qty;

        //                 $total_qty=(int)$product->total + (int)$cart->qty;

        //                 $product->s = $product_qty;
        //                 $product->total = $total_qty;
        //                 $product->save();


        //         }
        //         elseif($size == 'm'){
        //                 $product_qty=(int)$product->m + (int)$cart->qty;
        //                 $total_qty=(int)$product->total + (int)$cart->qty;
        //                 // dd((int)$cart->qty,$product_qty,$total_qty);
        //                 $product->m = $product_qty;
        //                 $product->total = $total_qty;
        //                 $product->save();


        //         }
        //         elseif($size == 'l'){
        //                 $product_qty=(int)$product->l + (int)$cart->qty;
        //                 $total_qty=(int)$product->total + (int)$cart->qty;
        //                 $product->l = $product_qty;
        //                 $product->total = $total_qty;
        //                 $product->save();

        //         }
        //         elseif($size == 'xl'){
        //             $product_qty=(int)$product->xl + (int)$cart->qty;
        //                 $total_qty=(int)$product->total + (int)$cart->qty;
        //                 $product->xl = $product_qty;
        //                 $product->total = $total_qty;
        //                 $product->save();

        //         }
        //         elseif($size == 'xxl'){

        //             $product_qty=(int)$product->xxl + (int)$cart->qty;
        //                 $total_qty=(int)$product->total + (int)$cart->qty;
        //                 $product->xxl = $product_qty;
        //                 $product->total = $total_qty;
        //                 $product->save();
        //         }

        //     }elseif($cart->options['volume']!=null){
        //         $volume=(int)($cart->options['volume']);

        //         $qty1=$product->volumes()->where('product_id','=',$product->id)->where('volume_id','=', $volume)->first()->pivot->qty;
        //             $product_qty=(int)$qty1 + (int)$cart->qty;
        //             $total_qty=(int)$product->total + (int)$cart->qty;
        //             $product->total = $total_qty;
        //             $product->save();
        //             $product->volumes()->updateExistingPivot($volume,['qty'=>$product_qty]);
        //         // if((int)$qty1 < (int)$cart->qty){
        //         //     // dd("hello");
        //         //     $name=$cart->name;
        //         //     $option=$cart->options['volumename'];
        //         //     Toastr::info($name.' '.$option.' quantity is not available', '', ["positionClass" => "toast-top-center",'progressBar'=> true, 'showDuration'=> 1000,'timeout'=>30000,]);
        //         //     return redirect()->route('cart');
        //         // }
        //         // dd("volume save");

        //     }else{

        //             $total_qty=(int)$product->total + (int)$cart->qty;
        //             $product->total = $total_qty;
        //             $product->save();
        //     }
        // }
        //cart data add in data base end

        $tran_id = $request->input('tran_id');
        $order_internal_id = $request->input('value_c');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'cancelled']);
            $update_order_internal = DB::table('orderinternals')
                ->where('id', $order_internal_id)
                ->update(['status' => 'cancelled']);
            Toastr::info('Transaction is cancelled !', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 70,]);
            return redirect('/');
        } else if ($order_detials->status == 'processing' || $order_detials->status == 'complete') {
            Toastr::info('Transaction is completed !', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 70,]);
            return redirect('/');
        } else {
            Toastr::info('Transaction is invalid !', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 70,]);
            return redirect('/');
        }
    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');
            $amount = $request->input('amount');
            $currency = $request->input('currency');
            $order_internal_id = $request->input('value_c');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == TRUE) {
                    // product qty reduce from database  & cart delete
                    foreach (Cart::content() as $cart) {
                        $product = Product::find($cart->id);
                        if ($cart->options['size'] != null) {
                            $size = $cart->options['size'];
                            // dd($size);
                            if ($size == 's') {

                                $product_qty = (int)$product->s - (int)$cart->qty;

                                $total_qty = (int)$product->total - (int)$cart->qty;

                                $product->s = $product_qty;
                                $product->total = $total_qty;
                                $product->save();
                            } elseif ($size == 'm') {
                                $product_qty = (int)$product->m - (int)$cart->qty;
                                $total_qty = (int)$product->total - (int)$cart->qty;
                                // dd((int)$cart->qty,$product_qty,$total_qty);
                                $product->m = $product_qty;
                                $product->total = $total_qty;
                                $product->save();
                            } elseif ($size == 'l') {
                                $product_qty = (int)$product->l - (int)$cart->qty;
                                $total_qty = (int)$product->total - (int)$cart->qty;
                                $product->l = $product_qty;
                                $product->total = $total_qty;
                                $product->save();
                            } elseif ($size == 'xl') {
                                $product_qty = (int)$product->xl - (int)$cart->qty;
                                $total_qty = (int)$product->total - (int)$cart->qty;
                                $product->xl = $product_qty;
                                $product->total = $total_qty;
                                $product->save();
                            } elseif ($size == 'xxl') {

                                $product_qty = (int)$product->xxl - (int)$cart->qty;
                                $total_qty = (int)$product->total - (int)$cart->qty;
                                $product->xxl = $product_qty;
                                $product->total = $total_qty;
                                $product->save();
                            }
                        } elseif ($cart->options['volume'] != null) {
                            $volume = (int)($cart->options['volume']);

                            $qty1 = $product->volumes()->where('product_id', '=', $product->id)->where('volume_id', '=', $volume)->first()->pivot->qty;
                            $product_qty = (int)$qty1 - (int)$cart->qty;
                            $total_qty = (int)$product->total - (int)$cart->qty;
                            $product->total = $total_qty;
                            $product->save();
                            $product->volumes()->updateExistingPivot($volume, ['qty' => $product_qty]);
                            // if((int)$qty1 < (int)$cart->qty){
                            //     // dd("hello");
                            //     $name=$cart->name;
                            //     $option=$cart->options['volumename'];
                            //     Toastr::info($name.' '.$option.' quantity is not available', '', ["positionClass" => "toast-top-center",'progressBar'=> true, 'showDuration'=> 1000,'timeout'=>30000,]);
                            //     return redirect()->route('cart');
                            // }
                            // dd("volume save");

                        } else {

                            $total_qty = (int)$product->total - (int)$cart->qty;
                            $product->total = $total_qty;
                            $product->save();
                        }
                    }
                    foreach (Cart::content() as $cart) {
                        Cart::remove($cart->rowId);
                    }
                    // product qty reduce from database  & cart delete end
                    // if the person is user he got point on purches
                    if ($request->input('value_a') != "null") {
                        $usertemp = $request->input('value_a');
                        $user = User::find($usertemp);
                        if ($user->userprofile->user_point >= 0 && $user->userprofile->user_point < 100) {
                            $totaltemp = $request->input('amount');
                            $total = floatval(preg_replace("/[^-0-9\.]/", "", $totaltemp));
                            $pointtemp = $totaltemp / 100;
                            $userpointtemp = $user->userprofile->user_point + $pointtemp;
                            $user->userprofile()->update([
                                'user_point' => $userpointtemp,
                            ]);
                        }
                    }
                    // person point add

                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */

                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'processing', 'card_type' => $request->card_type, 'bank_tran_id' => $request->bank_tran_id]);
                    $update_order_internal = DB::table('orderinternals')
                        ->where('id', $order_internal_id)
                        ->update(['status' => 'processing']);
                    // sending mail to fakhruddinassociates@gmail.com

                    $data['app'] = Orderinternal::find($order_internal_id);
                    $pdf = PDF::loadView('invoicepdf', $data)->setPaper('A4', 'Potrait')->setOptions(['defaultFont' => 'sans-serif']);
                    // $app=Orderinternal::find($id);

                    $dat["email"] = "fakhruddinassociates@gmail.com";
                    $dat["subject"] = "Invoice No:" . $data['app']->order_unique_id;
                    $dat['pdf'] = $pdf->output();

                    Mail::send([], $dat,  function ($message) use ($dat) {
                        $message->to($dat["email"])
                            ->subject($dat["subject"])
                            ->attachData($dat['pdf'], 'invoice.pdf', [
                                'mime' => 'application/pdf',
                            ])
                            ->setBody('
                                        Dear Sir / Madam,
                                        You have new order.Please check this order.

                                        ');
                    });
                    $userdat["email"] = $data['app']->email;
                    $userdat["subject"] = "Invoice mail";
                    $userdat['pdf'] = $pdf->output();
                    Mail::send([], $userdat,  function ($message) use ($userdat) {
                        $message->to($userdat["email"])
                            ->subject($userdat["subject"])
                            ->attachData($userdat['pdf'], 'invoice.pdf', [
                                'mime' => 'application/pdf',
                            ])
                            ->setBody('
                                        Dear Sir / Madam,
                                        Thank you for purchase. your order is placed successfully

                                        ');
                    });
                    // mail is end
                    Toastr::info('Transaction is completed !', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 70,]);
                    return redirect('/');
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'cancelled']);
                    $update_order_internal = DB::table('orderinternals')
                        ->where('id', $order_internal_id)
                        ->update(['status' => 'cancelled']);

                    Toastr::info('Transaction is cancelled !', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 70,]);
                    return redirect('/');
                    // $update_product = DB::table('orders')
                    //     ->where('transaction_id', $tran_id)
                    //     ->update(['status' => 'Failed']);

                    // echo "validation Fail";
                }
            } else if ($order_details->status == 'processing' || $order_details->status == 'complete') {

                #That means Order status already updated. No need to udate database.

                Toastr::info('Transaction is completed!', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 70,]);
                return redirect('/');
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                Toastr::info('Transaction is invalid !', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 70,]);
                return redirect('/');
            }
        } else {
            Toastr::info('Transaction is invalid !', '', ["positionClass" => "toast-top-center", 'progressBar' => true, 'showDuration' => 70,]);
            return redirect('/');
        }
    }
}
