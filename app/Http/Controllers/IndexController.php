<?php
namespace App\Http\Controllers;
use App\Product;
use App\CmsPage;
use App\ProductAttributes;
use App\Subscribe;
use Illuminate\Http\Request;
use App\Mail\Contact;
class IndexController extends Controller
{
    public function index()
    {
         $colors =   collect(json_decode(json_encode(Product::select('color')->get()),true))->unique();
         $products  = Product::where(['enabled'=>1,'featured'=>0])->get();
        $products;
        $features = Product::where(['enabled'=>1,'featured'=>1])->get();
        $products_saa  = Product::where(['enabled'=>1,'featured'=>0])->latest();
        if (!empty($_GET['color'])){
            $color_array = explode('-',$_GET['color']);
            $products_saa = Product::where(['enabled'=>1,'featured'=>0])->whereIn('color',$color_array);
        }
        if (!empty($_GET['sleeve'])){
            $sleeve_array = explode('-',$_GET['sleeve']);
            $products_saa = Product::where(['enabled'=>1,'featured'=>0])->whereIn('sleeve',$sleeve_array);
        }
        if (!empty($_GET['brand'])){
            $brand_array = explode('-',$_GET['brand']);
            $products_saa = Product::where(['enabled'=>1,'featured'=>0])->whereIn('brand',$brand_array);
        }
        if (!empty($_GET['size'])){
            $size_array = explode('-',$_GET['size']);
            $products_saa =Product::where(['enabled'=>1,'featured'=>0])->join('product_attributes', 'product_attributes.product_id', '=', 'products.id')->whereIn('product_attributes.size',$size_array);
        }
        $products_saa =  $products_saa->get();
        return view('user.index',compact(['products','features','products_saa']));
    }
    public function filter(Request $request)
    {
        $data = $request->all();
        if (! empty($data['ALL']) && $data['ALL'] == 'ALL' ){
            return redirect()->route('home');
        }
        $colorEx =  "";
        if (! empty($data['color'])){
            foreach ($data['color'] as $color){
                if (empty($colorEx)){
                    $colorEx = "&color=".$color;
                }else{
                    $colorEx .= "-".$color;
                }
            }
        }
        $sleeveEx =  "";
        if (! empty($data['sleeve'])){
            foreach ($data['sleeve'] as $sleeve){
                if (empty($sleeveEx)){
                    $sleeveEx = "&sleeve=".$sleeve;
                }else{
                    $sleeveEx .= "-".$sleeve;
                }
            }
        }
        $brandEx =  "";
        if (! empty($data['brand'])){
            foreach ($data['brand'] as $brand){
                if (empty($brandEx)){
                    $brandEx = "&brand=".$brand;
                }else{
                    $brandEx .= "-".$brand;
                }
            }
        }
        $sizeEx =  "";
        if (! empty($data['size'])){
            foreach ($data['size'] as $size){
                if (empty($brandEx)){
                    $sizeEx = "&size=".$size;
                }else{
                    $sizeEx .= "-".$size;
                }
            }
        }


        $finalUrl = '/?'.$colorEx.$sleeveEx.$brandEx.$sizeEx;
        return redirect()->to($finalUrl);

    }
    public function link(Request $request,$link)
    {
      $cms = CmsPage::where('link',$link)->firstOrFail();
      
      return view('user.cms',compact(['cms']));

    }
    public function contact(Request $request)
    {
       if ($request->isMethod('post')) {
         $data = $this->validate($request,[
             'name'           => 'required|string|min:3|max:30',
             'email'           => 'required|email|max:225',
             'subject'           => 'required|string|min:3|max:100',
             'telephone'           => 'required|min:3|max:30',
             'message'           => 'required|string|min:3|max:300'
         ]);
         $details = [
           'subject' =>   $request->subject,
           'telephone' =>   $request->telephone,
             'name' =>   $request->name,
             'email' =>   $request->email,
             'message' =>   $request->message,
             'site_name' => sitesetting()->site_name
         ];
         $resec = filter_var(sitesetting()->email, FILTER_SANITIZE_EMAIL); // site e-mail from database in dir app\OurSt\Helpers.php
         \Mail::to($resec)->send(new Contact($details));
         toastr()->success('Success To Send Email ,We Will Contact with you Soon As Possible');
         return redirect()->back();

       }
        return view('user.contact');
    }
    public function AddSubscribe(Request $request){
        if ($request->ajax()){
         $emailEx =  Subscribe::where('email',$request->email)->get();
         if ($emailEx->count() > 0){
           echo  '<span style=\'color:red;padding: 5px\'>You Had Subscribe Before..</span>'; die();
         }else{
         $data = $this->validate($request,['email'    => 'required|email|max:255|unique:subscribes']);
         Subscribe::create($data);
             echo  '<span style=\'color:green;padding: 5px\'>Success To Subscribe..</span>'; die();

         }
     }
  }

}
