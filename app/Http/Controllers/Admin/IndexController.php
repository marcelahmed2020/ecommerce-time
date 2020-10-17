<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Password_Back;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;
use Intervention\Image\Facades\Image as Image;
class IndexController extends Controller
{ // Start IndexController
    public function dashboard(Request $request)
    {
        $users       = User::whereRoleIs('admin')->where('enabled','1')->get();
        $user_limit  = User::whereRoleIs('admin')->where('enabled','1')->orderBy('id','desc')->limit(5)->get();
        return view('admin.dashboard',compact(['users','user_limit']));
    } // dashboard
    public function login(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (\Auth::attempt(['email'=>$data['email'],'password'=>$data['password'], 'enabled'=>1,'status'=>1,'admin'=>1])) {
                toastr()->success('Welcome back Again');
                return  redirect(url('/admin/dashboard'));
            } else {
                toastr()->error('Invalid Username Or Password');
                return  redirect(url('/admin/login'));
            }
        }
        return view('admin.guest.login');
    } // login View&Action
    public function forgot_password()
    {
        return view('admin.guest.login');
    }// Forgot Password View
    public function send_mail_password(Request $request)
    {
        $email = $request['email'];
        $exist_email = User::where(['email'=>$email])->first();
        if (isset($exist_email)) {
            $token = Str::random(30);
            $data = ['email'=>$email,'token'=>$token];
            Password_Back::create($data);
            Mail::to($email)->send(new ForgotPassword($data));
            toastr()->success('Check Your [E-mail] Please');
            return  back();
        }else {
            toastr()->error('You Not Have [E-mail] Here..!');
            return  back();
        }

    } // Send Mail Password
    public function password_reset_t($token)
    {
        $check_ex = Password_Back::where(['token'=>$token])->first();
        if (isset($check_ex)) {
            $user = User::where(['email'=>$check_ex->email])->first();
            return view('admin.guest.change_password',compact('user'));
        }else {
            abort(404);
        }
    } // password_reset_t View
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
            return  redirect(url('/admin/login'));
        }
        // code...
    } // Change Password View&Action
    public function logout()
    {
        auth()->logout();
        \Session::flush();
        toastr()->success('Logged Out Sussessfully');
        return  redirect('/admin/login');
    } // logout
    public function Profile()
    {
        $id = auth()->id();
        $user = User::findOrFail($id);
        return view('admin.profile.index',compact('user'));
    } // Profile View
    public function D_Profile(Request $request,User $user){
        $this->validate($request,['name' => 'required|string|min:2',
            'email'         => 'required|max:255|unique:users,email,'.$user->id,]);
        if (empty($request->password)) {
            $password = $request->old_password;
        }else {
            if (strlen($request->password) < 5) {
                toastr()->error('Should Password Be More Than 5 Char!');
                return redirect()->back();
            }
            if (strlen($request->password) > 100) {
                toastr()->error('Should Password Be Less Than 100 Char!');
                return redirect()->back();
            }
            $password = \Hash::make($request['password']);
        }
        if ($request->hasFile('image')) {
            $image_tmp =  $request->file('image');
            if ($image_tmp->isValid()) {
                $image_ab = 'backend/user_images/';
                if (file_exists($image_ab.$user->image)) {
                    unlink($image_ab.$user->image);
                }
                $extension =  $image_tmp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $bannner_path = "backend/user_images/".$filename;
                Image::make($image_tmp)->resize(200,200)->save($bannner_path);
                $image   =  $filename;
            }
          } else {
            $image   =  $request->old_image;
        }
        $user->update([
            'name'        => $request['name'],
            'email'        => $request['email'],
            'image'        => $image,
            'password'                => $password
        ]);
        toastr()->success('Update Success!');
        return back();

    }// Profile Update

} // End IndexController
