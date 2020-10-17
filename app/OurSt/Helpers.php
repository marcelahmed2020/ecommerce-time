<?php

use App\Charges;
use App\Orders;
use App\Product;
use App\ShopingCart;
use App\ShopingWishlist;
if (! function_exists('aurl')) {
    function aurl($aurl = null)
    {
        return url('admin/'.$aurl);
    }
}
if (! function_exists('sitesetting')) {
    function sitesetting()
    {
        return  \App\Settings::latest()->first();
    }
}
if (! function_exists('lang_list')) {
    function lang_list()
    {
        return  \App\Languages::where('lang_enable','1')->get();
    }
}
if (! function_exists('pages_role')) {
    function pages_role($val)
    {
        return  \App\PagesRole::where('name',$val)->first();
    }
}
if (! function_exists('carts')) {
    function carts()
    {
        $sessionID = \Session::get('session_id');
        if (! isset($sessionID)){
            $sessionID = \Str::random(50);
            \Session::put('session_id',$sessionID);
        }
        if (auth()->check()){
            $carts = \App\ShopingCart::where('user_id',auth()->user()->id)->get();
        }else{
            $carts = \App\ShopingCart::where('session_id',$sessionID)->get();
        }
        return $carts;
    }
}
if (! function_exists('wishlist')) {
    function wishlist()
    {
        $sessionID = \Session::get('session_id');
        if (! isset($sessionID)){
            $sessionID = \Str::random(50);
            \Session::put('session_id',$sessionID);
        }
        if (auth()->check()){
            $wishlist = \App\ShopingWishlist::where('user_id',auth()->user()->id)->get();
        }else{
            $wishlist = \App\ShopingWishlist::where('session_id',$sessionID)->get();
        }
        return $wishlist;
    }
}
if (! function_exists('OrdersTime')) {
    function OrdersTime($val)
    {
        return  Orders::findOrFail($val);
    }
}
// check for stock
if (! file_exists('getProductStock')){
    function getProductStock($product_id,$product_size = null){
       $productCount =  \App\Product::find($product_id);
       if ($productCount->diffrent_size ==0){
           $product_att = $productCount->stock;
       }elseif ($product_size == 0) {

           $product_att = $productCount->stock;

       }else{
           $product_att =  \App\ProductAttributes::select('stock')->where(['product_id'=>$product_id,'size'=>$product_size])->first();
           $product_att = $product_att->slock;
       }
        return $product_att;
    }
}
if (! file_exists('getSlInfo')){
    function getSlInfo(){
        $carts = ShopingCart::where('user_id',auth()->user()->id)->get();
        foreach ($carts as $cart) {
            $product_s = Product::findOrFail($cart->product_id);
            if ($product_s->diffrent_size != 0){
            $checkStock =  getProductStock($cart->product_id,$cart->size);
            dd($checkStock);
            if ($checkStock == 0){
                toastr()->error('This Product Is Already Solid Out , Deleted..');
                $cart->delete();
                return redirect()->route('details',$cart->product_id);
            }elseif (($checkStock - $cart->quantity) <= 0){
                toastr()->error('This Alot Quantity Add Again ..');
                $cart->delete();
                return redirect()->route('details',$cart->product_id);
            }
           } else {

                if ($product_s->stock == 0){
                    toastr()->error('This Product Is Already Solid Out , Deleted..');
                    $cart->delete();
                    return redirect()->route('details',$cart->product_id);
                }elseif (($product_s->stock - $cart->quantity) <= 0){
                    toastr()->error('This Alot Quantity Add Again ..');
                    $cart->delete();
                    return redirect()->route('details',$cart->product_id);
                }
            }
        }
    }
}
if (! file_exists('getcharges')){
    function getcharges($country,$city = false)
    {
        $Charges =  Charges::where(['Country'=>$country,'City'=>$city])->first();
         return (empty($Charges))?100:$Charges->charges;
    }
}


if (! file_exists('getCurrencyRates')){
   function getCurrencyRates($price){
        $getCurrencyRates = \App\Currency::where(['enabled'=>1,'status'=>1])->get();
        foreach ($getCurrencyRates as $key => $val){
            if ($val->code == "EUR"){
               $EUR = rand($price/$val->exchange_rate,2);
            } elseif ($val->code == "BYR"){
                $BYR = rand($price*$val->exchange_rate,2);
            } elseif ($val->code == "EGP"){
                $EGP = rand($price*$val->exchange_rate,2);
            }
        }
        $currencies = ['EUR'=>isset($EUR)?$EUR:'','BYR'=>isset($BYR)?$BYR:'','EGP'=>isset($EGP)?$EGP:''];
         return $currencies;
      }
}

