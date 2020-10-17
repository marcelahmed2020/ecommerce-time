<?php
namespace App\Http\Controllers;
use App\Coupon;
use App\Pincodes;
use App\Product;
use App\ProductAttributes;
use App\ShopingCart;
use App\ShopingWishlist;
use Illuminate\Http\Request;
use Session;

class ShopingController extends Controller
{
      public function cart(){
          return view('user.cart');
      }
      public function getSlInfo(){
        $carts = ShopingCart::where('user_id',auth()->user()->id)->get();
        foreach ($carts as $cart) {
            $checkStock =  getProductStock($cart->product_id,$cart->size);
            if ($checkStock->stock == 0){
                toastr()->error('This Product Is Already Solid Out , Deleted..');
                $cart->delete();
                return redirect()->route('details',$cart->product_id);
                exit();
            }elseif (($checkStock->stock - $cart->quantity) <= 0){
                toastr()->error('This Alot Quantity Add Again ..');
                $cart->delete();
                return redirect()->route('details',$cart->product_id);
                exit();
            }
        }
    }
      public function AddCart(Request $request){

          $sessionID = Session::get('session_id');
           if (empty($sessionID)){
               $sessionID = \Str::random(50);
               Session::put('session_id',$sessionID);
           }
           $product_s = Product::findOrFail($request->product_id);
           if ($product_s->diffrent_size != 0){
                 $checkStock =  getProductStock($request->product_id,! empty($request->size)?$request->size:'');

               if ($checkStock != null && $checkStock == 0){
                   toastr()->error('The Produect Already Solid Out ..');
                   return back();
               }
           }
          if (auth()->check()){
              $check_ex1 = ShopingCart::where(['product_id'=>$request->product_id,'size'=>! empty($request->size)?$request->size:'0','code'=>$request->code,  'user_id'=>auth()->user()->id, 'email'=>auth()->user()->email])->get();
               if ($check_ex1->count() > 0){
                   toastr()->error('The Produect Already Exist In Cart ..');
                   return back();
               }

              $carts = ShopingCart::create(['title'=>$request->title,'short_desc'=>$request->short_desc,
                  'image'=>$request->image,'size'=>! empty($request->size)?$request->size:'0','code'=>$request->code,
                  'color'=>$request->color?:0,'quantity'=>$request->quantity,'session_id'=>$sessionID,
                  'email'=>auth()->user()->email,'price'=>$request->price,'product_id'=>$request->product_id,
                  'user_id'=>auth()->user()->id]);
              ShopingWishlist::where(['product_id'=>$request->product_id,'code'=>$request->code,  'user_id'=>auth()->user()->id, 'email'=>auth()->user()->email])->delete();


          }else{
              $check_ex2 = ShopingCart::where(['product_id'=>$request->product_id,'size'=>! empty($request->size)?$request->size:'0','code'=>$request->code,'session_id'=>$sessionID])->get();

              if ($check_ex2->count() > 0){
                  toastr()->error('The Produect Already Exist In Cart ..');
                  return back();
              }
              $carts = ShopingCart::create(['title'=>$request->title,'short_desc'=>$request->short_desc,
                  'image'=>$request->image,'size'=>! empty($request->size)?$request->size:'0','code'=>$request->code,
                  'color'=>$request->color?:0,'quantity'=>$request->quantity,'session_id'=>$sessionID,
                  'email'=>0,'price'=>$request->price,'product_id'=>$request->product_id,
                  'user_id'=>0]);
              ShopingWishlist::where(['product_id'=>$request->product_id,'code'=>$request->code,'session_id'=>$sessionID])->delete();

          }
          \Session::forget('CouponAmount');
          \Session::forget('CouponCode');

          toastr()->success('Success To Add New Produect In Cart ..');
           return redirect()->route('cart');

      }
      public function DeleteCart($id){

          $delete = ShopingCart::findOrFail($id);
          $delete->delete();
          \Session::forget('CouponAmount');
          \Session::forget('CouponCode');
          toastr()->success('Success To Delete Produect In Cart ..');
          return redirect()->route('cart');
      }
      public function QuantityCart($id,$quantity){
          $QuantityCart = ShopingCart::findOrFail($id);
          $update_quantity = $QuantityCart->quantity + ($quantity);
          $produect = Product::findOrFail($QuantityCart->product_id);
          if ($QuantityCart->size == 0){
              if ($produect->stock >= $update_quantity){
                  $QuantityCart->increment('quantity',$quantity);
                  toastr()->success('Success To Update Produect In Cart ..');
                  return back();
              }else{
                  toastr()->error('Required Product Quntity Is Not Available ..');
                  return back();
              }
           }else {
           if ($produect->product_attributes->count() > 0){
           $ProductAttributes = ProductAttributes::where(['product_id'=>$QuantityCart->product_id])->first();
             if ($ProductAttributes->stock >= $update_quantity){
                 $QuantityCart->increment('quantity',$quantity);
                 toastr()->success('Success To Update Produect In Cart ..');
//                 return redirect()->route('cart');
                 return back();
             }else{
                 toastr()->error('Required Product Quntity Is Not Available ..');
                  return back();
             }
          }else{
                  if ($produect->stock >= $update_quantity) {
                  $QuantityCart->increment('quantity',$quantity);
                  toastr()->success('Success To Update Produect In Cart ..');
                      return back();
              }else{
                  toastr()->error('Required Product Quntity Is Not Available ..');
                      return back();
              }
          }

        }
       }
      public function AddCoupons(Request $request){

          $date = date("Y-m-d");
         $ExCode = Coupon::where('coupon_code',$request->coupon_code)->where('status',1)->first();
        if (! empty($ExCode)){
           if (strtotime($date) < strtotime($ExCode->expire_date)){
            // Start v
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
               $total_pr  = 0;
               foreach ($carts as $cart){
                   $total_pr  = $total_pr + ($cart->price * $cart->quantity);
               }
               if ($ExCode->amount_type =="Fixed"){
                   $couponAm = $ExCode->amount;
               }else{
                   $couponAm = $total_pr * ($ExCode->amount/100);

               }
               \Session::put('CouponAmount',$couponAm);
               \Session::put('CouponCode',$request->coupon_code);
                  // Status 2 Mean Its Taken
                $ExCode->update(['status'=>2]);

                toastr()->success('Success To Applied, You Have Discount Now ..');
               return back();
            // End V

           }else{
               toastr()->error('Coupons Is Not Available ..');
               return back();
           }
        }else{
            toastr()->error('Coupons Is Not Available ..');
            return back();
        }


      }
      public function wishlist(){
          return view('user.wishlist');
      }
      public function AddWishlist(Request $request,$id){
          $produect = Product::findOrFail($id);
                     $sessionID = Session::get('session_id');
          if (empty($sessionID)){
              $sessionID = \Str::random(50);
              Session::put('session_id',$sessionID);
          }
          if (auth()->check()){
              $check_ex1 = ShopingWishlist::where(['product_id'=>$produect->id,
                  'code'=>$produect->code,  'user_id'=>auth()->user()->id,
                  'email'=>auth()->user()->email])->get();
              if ($check_ex1->count() > 0){
                  toastr()->error('The Produect Already Exist In Wishlist ..');
                  return back();
              }
              $carts = ShopingWishlist::create(['title'=>$produect->title,
                  'short_desc'=>$produect->short_desc,
                  'image'=>$produect->product_image,'size'=>! empty($request->size)?$request->size:'0',
                  'code'=>$produect->code,
                  'color'=>$produect->color?:0,'quantity'=>! empty($request->quantity)?$request->quantity:'0',
                  'session_id'=>$sessionID,
                  'email'=>auth()->user()->email,'price'=>$produect->price,'product_id'=>$produect->id,
                   'user_id'=>auth()->user()->id]);
              ShopingCart::where(['product_id'=>$produect->id,
                  'code'=>$produect->code,  'user_id'=>auth()->user()->id,
                  'email'=>auth()->user()->email])->delete();
          }else{
              $check_ex2 = ShopingWishlist::where(['product_id'=>$produect->id,
                  'code'=>$produect->code,'session_id'=>$sessionID])->get();
              if ($check_ex2->count() > 0){
                  toastr()->error('The Produect Already Exist In Wishlist ..');
                  return back();
              }
              $carts = ShopingWishlist::create(['title'=>$produect->title,'short_desc'=>$produect->short_desc,
                  'image'=>$produect->product_image,'size'=>! empty($request->size)?$request->size:'0','code'=>$produect->code,
                  'color'=>$produect->color?:0,'quantity'=>! empty($request->quantity)?$request->quantity:'0','session_id'=>$sessionID,
                  'email'=>0,'price'=>$produect->price,'product_id'=>$produect->id,
                  'user_id'=>0]);
              ShopingCart::where(['product_id'=>$produect->id,'code'=>$produect->code,'session_id'=>$sessionID])->delete();

          }

          toastr()->success('Success To Add New Produect In Wishlist ..');
          return redirect()->route('wishlist');

      }
      public function DeleteWishlist($id){
        $delete = ShopingWishlist::findOrFail($id);
        $delete->delete();
        \Session::forget('CouponAmount');
        \Session::forget('CouponCode');
        toastr()->success('Success To Delete Produect In Wishlist ..');
        return redirect()->route('wishlist');
    }
      public function  AddPincode(Request $request){
          $this->validate($request,[
              'pincode' => 'required'
          ]);
       $allow = Pincodes::where('pincodes',$request->pincode)->count();
       if ($allow > 0){
           toastr()->success('We Can Deliver To This Place..');
           return back();
       } else{
           toastr()->error('We Can not Deliver To This Place ..');
           return back();
       }
      }
 }










