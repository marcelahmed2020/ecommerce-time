<?php
namespace App\Http\Controllers;
use App\DeliveryAddress;
use App\OrderProducts;
use App\Orders;
use App\Pincodes;
use App\ShopingCart;
use Illuminate\Http\Request;
use App\User;
use Session;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
class UserController extends Controller
{
     public function account(){
         $user = User::findOrFail(auth()->user()->id);
         return view('user.account',compact('user'));
     }
     public function do_account(Request $request,$id){
         if (empty($request->password)) {
             $password = $request->old_password;
         }else {
             if (strlen($request->password) < 6) {
                 toastr()->error('Should Password Be More Than 6 Char'); // i want to display this one
                 return redirect()->back();
             }
             if (strlen($request->password) > 100) {
                 toastr()->error('Should Password Be Less Than 100 Char!'); // i want to display this one
                 return redirect()->back();
             }

             $password =  bcrypt($request['password']);

         }
         $user = User::findOrFail($id);
         $user->update(['first_name'=>$request->first_name,'last_name'=>$request->last_name,'email'=>$request->email,'password'=>$password]);

         $user->usersinfos()->update(['title'=>$request->title,'city'=>$request->city,'state'=>$request->state,'zip'=>$request->zip,
         'phone1'=>$request->phone1,'phone2'=>$request->phone2?:'0','birth'=>$request->birth,
         'address'=>$request->address,'country'=>0]);
         toastr()->success('Sussess Update Account..');
         return back();
     }
     public function checkout(){
         $carts = ShopingCart::where('user_id',auth()->user()->id)->get();
         if ($carts->count() == 0){
             toastr()->error('Sorry You Not Have Anything In Your Cart To CheckOut ..');
             return redirect()->route('cart');
         }
         $user = User::findOrFail(auth()->user()->id);
         $delivery_address  = DeliveryAddress::where('user_id',auth()->user()->id)->first();
         // if (empty($delivery_address)) {
         //     # code...
         //    return redirect('/user/acouunt');
         //   // return view('user.account',compact('user'));

         // }
         return view('user.checkout',compact(['user','delivery_address']));
     }
     public function deliveryaddress(Request $request){
         getSlInfo();
//         if (getSlInfo() == false){
//             exit();
//         }

         $allow = Pincodes::where('pincodes',$request->ship_zip)->count();
         if ($allow > 0){
         $delivery_address  = DeliveryAddress::where('user_id',auth()->user()->id)->first();
         if (! empty($delivery_address)){
             DeliveryAddress::where(['user_id'=>auth()->user()->id])->update(['ship_first_name'=>$request->ship_first_name,
                 'ship_last_name'=>$request->ship_last_name,'ship_email'=>$request->ship_email,
                 'ship_country'=>$request->ship_country,'ship_address'=>$request->ship_address,
                 'ship_city'=>$request->ship_city,'ship_state'=>$request->ship_state,'ship_zip'=>$request->ship_zip,'ship_phone1'=>$request->ship_phone1]);
         }else{
             DeliveryAddress::create(['user_id'=>auth()->user()->id,'ship_first_name'=>$request->ship_first_name,
                 'ship_last_name'=>$request->ship_last_name,'ship_email'=>$request->ship_email,
                 'ship_country'=>$request->ship_country,'ship_address'=>$request->ship_address,
                 'ship_city'=>$request->ship_city,'ship_state'=>$request->ship_state,'ship_zip'=>$request->ship_zip,'ship_phone1'=>$request->ship_phone1]);
         }
         toastr()->success('Sussess To CheckOut..');
         return redirect()->route('user.order_review');
         } else{
             toastr()->error('We Can not Deliver To This Place ..');
             return back();
         }
     }
     public function order_review(){
        $check_ex1 = ShopingCart::where(['user_id'=>auth()->user()->id])->get();
        if ($check_ex1->count() == 0){
            toastr()->error('Sorry You Not Have Anything In Your Cart To CheckOut ..');
            return back();
        }
        $delivery_address  = DeliveryAddress::where('user_id',auth()->user()->id)->first();
        if (empty($delivery_address)){
            toastr()->error('Sorry You Not Have Anything In Your Delivery Address To CheckOut ..');
            return back();
        }

        $user = User::findOrFail(auth()->user()->id);
        return view('user.order_review',compact(['user','delivery_address','check_ex1']));
    }
     public function place_order(Request $request){
         if ($request->isMethod('post')){
           // "payment_method" => "Bank" // total_price
             Session::put('total_price_time',$request->total_price);

             if ($request->payment_method == "Bank") {
                      return redirect()->route('user.stripe');
               } elseif($request->payment_method == "Paypal") {

               echo "'Paypal'";;
               // code...
             }
              $this->putOrders($request);
             $this->forget_session();
             $messageData = ['order_id'=>$order->id,'name' => $delivery_address->ship_first_name .' '. $delivery_address->ship_last_name,'email'=>$delivery_address->ship_email];
//             \Mail::to($delivery_address->ship_email)->send(new \App\Mail\SendOrder($messageData));
             Session::put('order_id',$order->id);
             Session::put('total_price',$order->grand_total);
             Session::put('payment_method',$order->payment_method);
             toastr()->success('Success To Make Order ..');
             return redirect()->route('user.orders');
         }
    }
    // stripe
    public function stripe(){
      if (Session::get('total_price_time')) {
         return view('user.stripe');
       }
    }
    public function charge(Request $request)
    {
// dd($request->stripeToken);
        $charge = Stripe::charges()->create([
        'source' => $request->stripeToken,
       'currency' => 'USD',
       'amount'   => $request->total_price,
        'description' => 'He/She Success To Pay !',
           ]);
       $charge['id'];
       if ($charge) {
         // Accept Payment /putOrders
         $request['payment_method'] = 'Bank';
         $request['total_price'] = $request->total_price;
         $this->putOrders($request);
         toastr()->success('Accept Your Payment..');
         return redirect()->route('user.orders');
       }else {
         // Not Accept Payment
         toastr()->error('Something wrong you should check your bank account first and try again..');
       }
    }
    public function putOrders($request)
    {
      $carts = ShopingCart::where('user_id',auth()->user()->id)->get();
      foreach ($carts as $cart) {
          $checkStock =  getProductStock($cart->product_id,$cart->size);
          if ($checkStock == 0){
              toastr()->error('This Product Is Already Solid Out , Deleted..');
              $cart->delete();
              return redirect()->route('details',$cart->product_id);
          }elseif (($checkStock - $cart->quantity) <= 0){
              toastr()->error('This Alot Quantity Add Again ..');
              $cart->delete();
              return redirect()->route('details',$cart->product_id);
          }
      }
      $delivery_address  = DeliveryAddress::where('user_id',auth()->user()->id)->first();
      if (empty($delivery_address)){
          toastr()->error('Sorry You Not Have Anything In Your Delivery Address To CheckOut ..');
          return back();
      }
    $order =  Orders::create([
          'first_name'=>$delivery_address->ship_first_name,'arrived' =>"Preparing" ,'last_name' => $delivery_address->ship_last_name,'user_email'=>$delivery_address->ship_email,'user_id'=>auth()->user()->id,
          'country'=>$delivery_address->ship_country,'address'=>$delivery_address->ship_address
          ,'city'=>$delivery_address->ship_city,'zip'=>$delivery_address->ship_zip,'state'=>$delivery_address->ship_state
          ,'phone1'=>$delivery_address->ship_phone1,'shiping_charges'=>getcharges(auth()->user()->usersinfos->country),'coupon_code'=>Session::get('CouponCode')?:'0','coupon_amount'=>Session::get('CouponAmount')?:'0','order_status'=>'new'
          ,'payment_method'=>$request->payment_method,'grand_total'=>$request->total_price]);
//          $carts = ShopingCart::where('user_id',auth()->user()->id)->get();
      foreach ($carts as $ca) {
          OrderProducts::create(['user_id'=>auth()->user()->id,'order_id'=>$order->id,
              'product_id'=>$ca->product_id,'title'=>$ca->title,'short_desc'=>$ca->short_desc,'code'=>$ca->code,'quntity'=>$ca->quantity,'size'=>$ca->size,'desc'=>0,'price'=>$ca->price]);
          $ca->delete();
      }

    }
     public function user_orders(){
        $orders = Orders::where('user_id',auth()->user()->id)->get();
        return view('user.orders',compact(['orders']));
    }
     public function view_order($id){
        $order = Orders::findOrFail($id);
         return view('user.view_order',compact(['order']));
    }
     public function forget_session()
    {
        Session::forget('CouponCode');
        Session::forget('CouponAmount');
        Session::forget('price');

    }
}
