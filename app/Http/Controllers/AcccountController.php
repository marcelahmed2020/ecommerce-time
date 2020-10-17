<?php

namespace App\Http\Controllers;

use App\ShopingCart;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
use Session;
use function foo\func;
use App\Password_Back;
use App\Mail\GuestForgotPassword;
class AcccountController extends Controller
{
    public function register(){
        return view('user.register');
    }
    public function do_register(Request $request){
        $data =  $this->validate($request,[
                'title' => 'required|min:1',
                'first_name' => 'required|string|min:2',
                'last_name' => 'required|string|min:2',
                'email'    => 'required|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'city' => 'required|min:2',
                'state' => 'required|min:2',
                'zip' => 'required|min:2',
                'phone1' => 'required',
                'country' => 'required',
                'birth' => 'required',
                'address' => 'required',
            ]);
         $data['phone2'] = $request->phone2?:'0';
         $user = User::create(['first_name'=>$data['first_name'],'status'=>0,'last_name'=>$data['last_name'],'email'=>$data['email'],'password'=>bcrypt($data['password'])]);
         $user->usersinfos()->create(['title'=>$data['title'],'city'=>$data['city'],'state'=>$data['state'],'zip'=>$data['zip'],'phone1'=>$data['phone1'],'phone2'=>$data['phone2'],'birth'=>$data['birth'],'address'=>$data['address'],'country'=>$data['country']]);
         $messageData = ['name' => $request->first_name .' '. $request->last_name,'code'=>base64_encode($request->email),'email'=>$request->email];
        \Mail::to($request->email)->send(new \App\Mail\Registration($messageData));
        toastr()->success('Go To You Mail Conform To Your Registration..');
        return redirect()->route('user.login');
     }
    public function login(){
        return view('user.login');
    }
    public function do_login(Request $request){
        $data =  $this->validate($request,['email' => 'required|email','password' => 'required']);
//        $remember_me = $request->has('remember') ? true : false;
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'] , 'enabled'=>1,'status'=>1]))
        {
            $shopingcarts  = ShopingCart::where(['session_id'=>\Session::get('session_id')])->get();
            if ($shopingcarts->count() > 0){
              foreach ($shopingcarts as $shopingcart){
                $shopingcart->update(['email'=>auth()->user()->email,'user_id'=>auth()->user()->id]);
              }
             }
            toastr()->success('Welcome back Again');
            return  redirect(url('/'));
        } else {
            toastr()->error('Invalid Username Or Password');
            return  redirect(url('/user/login'));
        }

    }
    public function confirmEmail(Request $request,$code){
         $user = User::where('email',base64_decode($code))->first();
          if ($user->count() > 0){
              if ($user->status == 1){
                  toastr()->error('Your Email Already Confirmed :)');
                  return  redirect(url('/user/login'));
              }else{
                  $user->update(['status'=>1]);
                  toastr()->success('Success To Confirm Your E-mail :)');
                  return  redirect(url('/user/login'));
              }
          }else{abort(404);}

    }
    public function logout(){
        auth()->logout();
        Session::flush();
        toastr()->success('Logout Sussess.');
        return  redirect(url('/'));
    }
    public function forget_password()
    {
        return view('user.forgot_password');
    }
    public function send_mailt(Request $request)
    {
        $email = $request['email'];
        $exist_email = User::where(['email'=>$email])->first();
        if (isset($exist_email)) {
            $token = \Str::random(30);
            $data = ['email'=>$email,'token'=>$token];
            Password_Back::create($data);
            Mail::to($email)->send(new GuestForgotPassword($data));
            toastr()->success('Check Your [E-mail] Please');
            return  back();
        }else {
            toastr()->error('You Not Have [E-mail] Here..!');
            return  back();
        }

    }
    public function password_reset_t($token)
    {
        $check_ex = Password_Back::where(['token'=>$token])->first();
        if (isset($check_ex)) {
            $user = User::where(['email'=>$check_ex->email])->first();
            return view('user.change_password',compact('user'));
        }else {
            abort(404);
        }
    }
    public function change_password(Request $request,$id)
    {
        $user = User::where(['id'=>$id])->first();
        if (isset($user)) {
            $this->validate($request,[
                'password' => 'required|string|min:8|confirmed',

            ]);
            $password = \Hash::make($request['password']);
            $user->update(['password'=>$password]);
            Password_Back::where(['email'=>$user['email']])->delete();
            toastr()->success('Success Change Password , Login Now!!');
            return  redirect(url('/'));
        }
        // code...
    }



}
