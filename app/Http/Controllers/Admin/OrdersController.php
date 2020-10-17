<?php
namespace App\Http\Controllers\Admin;
use App\DeliveryAddress;
use App\Http\Controllers\Controller;
use App\OrderProducts;
use App\Orders;
use App\User;
use Illuminate\Http\Request;
class OrdersController extends Controller
{
    public function index(){
         $orders = Orders::where('enabled',1)->get();
        if (isset(request()->id)){
            $orders = Orders::where('id',request()->id)->get();
        }
        return view('admin.orders.index',compact('orders'));
    }

    public function show($id){
        $order = Orders::findOrFail($id);
        $billing  = User::findOrFail($order->user_id);
        $shipping = DeliveryAddress::where('user_id',$order->user_id)->first();

         return view('admin.orders.show',compact(['order','billing','shipping']));

    }
    public function invoice($id){
        $order = Orders::findOrFail($id);
        $billing  = User::findOrFail($order->user_id);
        $shipping = DeliveryAddress::where('user_id',$order->user_id)->first();
        return view('admin.orders.invoice',compact(['order','billing','shipping']));

    }
    public function udate_orders(Request $request,$id){
        $data = $this->validate($request,['arrived' => 'required|string|min:2','order_status'=>'required']);
        $order = Orders::findOrFail($id);
        $order->update($data);
        toastr()->success('Success Update Order Status');
        return back();


    }
    public function create(){
        return view('admin.orders.create');
    }

    public function destroy($id){

    }
    public function orders_prod($id){
         $OrderProducts = OrderProducts::findOrFail($id);
         $order = Orders::findOrFail($OrderProducts->order_id);
         $order->update([ 'grand_total' => $order->grand_total - ($OrderProducts->price* $OrderProducts->quntity)]);
         $OrderProducts->delete();
        toastr()->success('Success Delete Order Product');
       return back();
    }




}
