<?php
namespace App\Helper;
use App\Models\Orderinternal;
use App\Models\Oderitem;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use App\Helper\Helper;
class Helper
{
    public function generateOrderNR()
    {
        // $orderObj =Orderinternal::select('transaction_id')->latest('id')->first();
        // if ($orderObj) {
        //     $orderNr = $orderObj->order_nr;
        //     $removed1char = substr($orderNr, 1);
        //     $generateOrder_nr = $stpad = '#' . str_pad((int)$removed1char + 1, 8, "0", STR_PAD_LEFT);
        // } else {
        //     $generateOrder_nr = '#' . str_pad(1, 8, "0", STR_PAD_LEFT);
        // }
        // $generateOrder_nr = '#' . str_pad(1, 8, "10", STR_PAD_LEFT);

        $generateOrder_nr=uniqid();
        $orderObj = Order::where('transaction_id','=',$generateOrder_nr)->first();
        // $orderObj=rand(1,3);
        if($orderObj){
           return $this->generateOrderNR();
        }else{
            return $generateOrder_nr;
        }
        // return $orderObj;
    }
    public function generateOrderUniqueId()
    {
        $orderObj =Orderinternal::select('order_unique_id')->latest('id')->first();
        // $orderObj="#12999999";
        // dd($orderObj);
        if ($orderObj) {
            $orderNr = $orderObj->order_unique_id;
            $removed1char = substr($orderNr, 1);
            
            $generateOrder_nr = $stpad = '#' . str_pad((int)$removed1char + 1, 8, "0", STR_PAD_LEFT);
        } else {
            $generateOrder_nr = '#' . str_pad(1, 8, "0", STR_PAD_LEFT);
        }
        // $generateOrder_nr = '#' . str_pad(1, 8, "10", STR_PAD_LEFT);

        // $generateOrder_nr=uniqid();
        // $orderObj = Order::where('transaction_id','=',$generateOrder_nr)->first();
        // // $orderObj=rand(1,3);
        // if($orderObj){
        //    return $this->generateOrderNR();
        // }else{
        //     return $generateOrder_nr;
        // }
        return $generateOrder_nr;
    }
    public static function instance()
    {
        return new Helper();
    }
}