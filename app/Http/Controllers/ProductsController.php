<?php
namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\ProductAttributes;
use App\Tag;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
     public function details($id)
     {
          $product  = Product::where(['enabled'=>1,'id'=>$id])->first();
         abort_if(! $product,404);
         $RelatedProducts  = Product::where(['enabled'=>1,'cat_id'=>$product->cat_id])
             ->get()
             ->where('id','!=',$product->id);
         $product->increment('viewer');
//         ظproduct->viewer += 1;

         return view('user.details',compact(['product','RelatedProducts']));
     }
     public function products()
     {
         $products  = Product::where(['enabled'=>1])->get();
         return view('user.products',compact('products'));

     }
     public function get_price(Request $request){
        $data      = $request->all();
        $size      = explode('-',$data['size']);
        $attribute =  ProductAttributes::where(['id'=>$size[0],'size'=>$size[1]])->first();
         $currencies =  \App\Product::getCurrencyRates($attribute->price);
         foreach ($currencies as $key => $val){
             $attribute[$key] = $val;
         }
//         return $attribute; die;
         echo $attribute;
     }
     public function get_product(Request $request){
        $data      = $request->all();
        $products = Product::where('title','like','%' .$data['input_search'] .'%')
             ->orWhere('desc','like','%' .$data['input_search'] .'%')
            ->orWhere('price','like','%' .$data['input_search'] .'%')->get();
         echo json_encode($products);
         exit;
     }
     public function tags(){
         $tags  = Tag::where(['enabled'=>1])->get();
         return view('user.tags',compact(['tags']));
     }
     public function tag($name){
        $tag  = Tag::where(['enabled'=>1,'name'=>$name])->first();
        $products = $tag->products;
        return view('user.tag',compact(['tag','products']));

    }
     public function category($title){
        $category  = Category::where(['enabled'=>1,'title'=>$title])->first();
        $products = $category->products;
        return view('user.category',compact(['category','products']));

    }

}
