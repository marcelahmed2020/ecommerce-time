<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Image;
class AdminsController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_admins'])->only(['index','show']);
        $this->middleware(['permission:create_admins'])->only(['create','store']);
        $this->middleware(['permission:update_admins'])->only(['edit','image','infos']);
        $this->middleware(['permission:delete_trash'])->only('destroy');
        $this->middleware(['permission:delete_admins'])->only('disabled');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::whereRoleIs('admin')->where(['enabled'=>1,'admin'=>1])->latest()->get();
//        if (! empty(request()->id)){  $id = request()->id; $admins->orWhere('id',request()->id); }
        return view('admin.admins.index',compact('admins'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['first_name' => 'required|string|min:2','last_name' => 'required|string|min:2',
            'email'    => 'required|string|email|max:255|unique:users',
            'permissions'=>'required','password' => 'required|string|min:6' ]);
        $user = auth()->user()->users()->create(['admin'=>1,'first_name'=> $request['first_name'],'last_name'=> $request['last_name'],'email'=> $request['email'],'password'  => \Hash::make($request['password'])]);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);
        toastr()->success('Add Success New Admin');
        return redirect()->route('admins.show',$user->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = User::whereRoleIs('admin')->findOrFail($id);
        abort_if($admin->id == auth()->id(),404);


        return view('admin.admins.show',compact('admin'));
    }

    /**
     * Add Image
     *
     */
    public function image(Request $request,$id)
    {
        $admin = User::findOrFail($id);
        $data = $this->validate($request,[
            'image'    =>   'required|mimes:png,gif,jpeg,pdf,doc,docx,rtf,xls,xlsx,csv|max:20000'
        ]);
        $image = '';
        if ($request->hasFile('image')) {
            $image_tmp =  $request->file('image');
            if ($image_tmp->isValid()) {
                $image_ab = 'backend/user_images/';
                if ($admin->user_image != 'default.png'){
                    if (file_exists($image_ab.$admin->user_image)) {
                        unlink($image_ab.$admin->user_image);
                    }
                }
                $extension =  $image_tmp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $news_path = "backend/user_images/".$filename;
                Image::make($image_tmp)->save($news_path);
                $image           =  $filename;
            }
        }
        if ($admin->user_image != 'default.png'){
            $admin->image()->update(['image'=>$image]);
        }else{
            $admin->image()->create(['image'=>$image]);
        }
        toastr()->success('Success To Update Image..');
        return back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::whereRoleIs('admin')->findOrFail($id);

        return  view('admin.admins.edit',compact('admin'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = User::whereRoleIs('admin')->findOrFail($id);
        $this->validate($request,['first_name' => 'required|string|min:2','last_name' => 'required|string|min:2',
            'email'    =>'required|max:255|unique:users,email,'.$id,
            'permissions'=>'required']);
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

            $password = \Hash::make($request['password']);

        }
        $admin->update(['edit'=>auth()->id(),'first_name'=> $request['first_name'],'last_name'=> $request['last_name'],'email'=> $request['email'],'password'  =>$password]);
        $admin->syncPermissions($request->permissions);
        toastr()->success('Success To Update Admin');
        return back();
    }
    public function disabled($id)
    {
        $user = User::findOrFail($id);
        abort_if($user->id == auth()->id(),404);
        $user->update(['enabled'=>0,'delete'=>auth()->id()]);
        toastr()->error('Success To Delete Admin');
        return back();
    }
    /*     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        abort_if($admin->id == auth()->id(),404);
        $image_ab = 'backend/user_images/';
        if ($admin->user_image != 'default.png'){
            if (file_exists($image_ab.$admin->user_image)) {
                unlink($image_ab.$admin->user_image);
            }
        }
        $admin->image()->delete();
        $admin->delete();
        toastr()->error('Success To Delete Admin For Good');
        return back();
    }
    public function show_me()
    {
        $id = auth()->id();
        $admin  = User::findOrFail($id);
         // dd($admin);
        return view('admin.admins.profile',compact('admin'));
    } // Profile View
    public function D_Profile(Request $request,$id){
        $user = User::findOrFail($id);
        $this->validate($request,['first_name' => 'required|string|min:2','last_name' => 'required|string|min:2',
            'email'         => 'required|max:255|unique:users,email,'.$id,]);
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
//        if ($request->hasFile('image')) {
//            $image_tmp =  $request->file('image');
//            if ($image_tmp->isValid()) {
//                $image_ab = 'backend/user_images/';
//                if (file_exists($image_ab.$user->image)) {
//                    unlink($image_ab.$user->image);
//                }
//                $extension =  $image_tmp->getClientOriginalExtension();
//                $filename = rand(111,99999).'.'.$extension;
//                $bannner_path = "backend/user_images/".$filename;
//                Image::make($image_tmp)->resize(200,200)->save($bannner_path);
//                $image   =  $filename;
//            }
//        }else {
//            $image   =  $request->old_image;
//        }
        $user->update([
            'first_name'        => $request['first_name'],
            'last_name'        => $request['last_name'],
            'email'        => $request['email'],
            'password'                => $password
        ]);
        toastr()->success('Update Success!');
        return back();

    }// Profile Update
    public function infos(Request $request,$id)
    {
        $data = $this->validate($request,[
            'address'           => 'required|min:2',
            'zip'               => 'required',
            'country'           => 'required|min:2',
            'city'            => 'required|min:2',
            'phone1'        => 'required|min:2',
            'phone2'        => 'required|min:2',
            'state'         => 'required|min:2',
           ]);

        $admin = User::findOrFail($id);
        if (! empty($admin->usersinfos)){
            $admin->usersinfos()->update($data);
        }else{
            $admin->usersinfos()->create($data);
        }
        toastr()->success('Success To Update Admin Information..');
        return  back();

    }
}
