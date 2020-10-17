<?php
namespace App\Http\Controllers\Admin;
use App\Category;
use App\Product;
use App\Http\Controllers\Controller;
use App\ProductAttributes;
use App\ProductImages;
use App\Tag;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Str;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('enabled',1)->get();
        if (isset(request()->id)){
            $products = Product::where('id',request()->id)->get();
        }
//        dd(json_decode(json_encode($products)));
        return view('admin.products.index',compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('enabled',1)->get();
        $tags = Tag::where('enabled',1)->get();
        return view('admin.products.create',compact(['categories','tags']));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd(Str::lower($request->color));
        $data =  $this->validate($request,[
            'title' => 'required|string|min:2|max:255',
            'short_desc' => 'required|string|min:2|max:250',
            'desc' => 'required|string|min:2',
            'price' => 'required',
            'cat_id' => 'required',
            'stock' => 'required',
            'purchasing_price' => 'required',
            'image'                 => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $data['color']    = $request->color?:'0';
        $data['sleeve']    = $request->sleeve?:'None';
        $data['brand']    = $request->brand?:'None';


        $data['featured'] = $request->featured;
        $data['diffrent_size'] = $request->diffrent_size;
        $data['code']     = Str::random(40);
//        $product = Product::create($data);
        $product = auth()->user()->products()->create($data);
        if ($request->hasFile('image')) {
            $image_tmp =  $request->file('image');
            if ($image_tmp->isValid()) {
                $extension =  $image_tmp->getClientOriginalExtension();
//                $filename = rand(111,99999).'.'.$extension;
                $filename = Str::random(40).'.'.$extension;

                $product_path_large = "backend/products_images/large/".$filename;
                Image::make($image_tmp)->save($product_path_large);
                $product_path_medium = "backend/products_images/medium/".$filename;
                Image::make($image_tmp)->resize(600,600)->save($product_path_medium);
               $product_path_small = "backend/products_images/small/".$filename;
                Image::make($image_tmp)->resize(160,160)->save($product_path_small);

                $image   =  $filename;
            }
        }
        $product->image()->create(['image'=>$image]);
        if (! empty($request->tag)){
            $product->tags()->sync($request->tag);
        }
        toastr()->success('Add Product Sussessfully..');
        return redirect()->route('products.show',$product->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show',compact(['product']));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('enabled',1)->where('parent','!=', 0)->get();
        $tags = Tag::where('enabled',1)->get();

        return view('admin.products.edit',compact(['categories','product','tags']));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $data =  $this->validate($request,[
            'title' => 'required|string|min:2|max:255',
            'short_desc' => 'required|string|min:2',
            'desc' => 'required|string|min:2',
            'price' => 'required',
            'cat_id' => 'required',
            'stock' => 'required',
            'purchasing_price' => 'required',
            'image'                 => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg',

        ]);
        $data['color']    = $request->color?:'0';
        $data['sleeve']    = $request->sleeve?:'None';
        $data['featured'] = $request->featured;
        $data['diffrent_size'] = $request->diffrent_size;
        $data['brand']    = $request->brand?:'None';

        $data['code']     = Str::random(40);
        $data['edit']     = auth()->id();
//        productseditable
        $product->update($data);
//        $product = auth()->user()->productseditable()->create($data);

        if ($request->hasFile('image')) {
            $image_tmp =  $request->file('image');
            if ($image_tmp->isValid()) {
                $product_path_large = "backend/products_images/large/";
                $product_path_medium = "backend/products_images/medium/";
                $product_path_small = "backend/products_images/small/";
                if (file_exists($product_path_large.$product->image->image)) {
                    unlink($product_path_large.$product->image->image);
                }
                if (file_exists($product_path_medium.$product->image->image)) {
                    unlink($product_path_medium.$product->image->image);
                }
                if (file_exists($product_path_small.$product->image->image)) {
                    unlink($product_path_small.$product->image->image);
                }
                $extension =  $image_tmp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $product_path_large = "backend/products_images/large/".$filename;
                Image::make($image_tmp)->save($product_path_large);
                $product_path_medium = "backend/products_images/medium/".$filename;
                Image::make($image_tmp)->resize(600,600)->save($product_path_medium);
                $product_path_small = "backend/products_images/small/".$filename;
                Image::make($image_tmp)->resize(160,160)->save($product_path_small);
                $image   =  $filename;
            }
        }else{
            $image = $request->old_image;
        }
        $product->image()->update(['image'=>$image]);
        if (! empty($request->tag)){
            $product->tags()->sync($request->tag);
        }
        toastr()->success('Update Product Sussessfully..');
        return redirect()->route('products.show',$product->id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['enabled'=>0,'delete'=>auth()->id()]);
        toastr()->success('Delete Product Sussessfully..');
        return redirect()->route('products.index');
    }
    public function restore($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['enabled'=>1]);
        toastr()->success('Restore Product Sussessfully..');
        return redirect()->route('products.show',$product->id);
    }
    public function force_del($id)
    {
        $product = Product::findOrFail($id);
        $product_path_large = "backend/products_images/large/";
        $product_path_medium = "backend/products_images/medium/";
        $product_path_small = "backend/products_images/small/";
        if (file_exists($product_path_large.$product->image->image)) {
            unlink($product_path_large.$product->image->image);
        }
        if (file_exists($product_path_medium.$product->image->image)) {
            unlink($product_path_medium.$product->image->image);
        }
        if (file_exists($product_path_small.$product->image->image)) {
            unlink($product_path_small.$product->image->image);
        }
        $product->delete();
        toastr()->success('Delete Product Sussessfully..');
        return redirect()->route('products.index');
    }
    public function Attribute(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        $attribute = 0;
        if (request()->has('attribute')){
            $attribute = ProductAttributes::findOrFail($request->attribute);
        }
//        dd( boolval($attribute) == 0?'NO':'MO');
        return view('admin.products.attribute',compact(['product','attribute']));
    }
    public function attribute_add(Request $request)
    {
        $data =  $this->validate($request,[
            'sku'              => 'required|min:1|max:255',
            'size'             => 'required|min:1|max:255',
            'stock'            => 'required|min:1|max:255',
            'price'            => 'required|min:1|max:255',
            'purchasing_price' => 'required|min:1|max:255',
        ]);
        $data['product_id'] = $request->product_id;
        $exist_sku = ProductAttributes::where(['sku'=>$request->sku,'product_id'=>$request->product_id])->get();
        if ($exist_sku->count() > 0){
            toastr()->error('This (SKU) Attribute Already Exist ..');
            return back();
        }
        $exist_size = ProductAttributes::where(['size'=>$request->size,'product_id'=>$request->product_id])->get();
        if ($exist_size->count() > 0){
            toastr()->error('This (SIZE) Attribute Already Exist ..');
            return back();
        }
        ProductAttributes::create($data);
        toastr()->success('Sussessfully To Add Attribute..');
        return back();
    }
    public function attribute_update(Request $request,$id){
       $productattributes = ProductAttributes::findOrFail($id);
        $data =  $this->validate($request,[
            'sku'              => 'required|min:1|max:255',
            'size'             => 'required|min:1|max:255',
            'stock'            => 'required|min:1|max:255',
            'price'            => 'required|min:1|max:255',
            'purchasing_price' => 'required|min:1|max:255',
        ]);
        $data['product_id'] = $request->product_id;
        $productattributes->update($data);
        toastr()->success('Sussessfully To Update Attribute..');
        return redirect()->route('products.attribute',$productattributes->product_id);
    }
    public function attribute_delete($id){
        $productattributes = ProductAttributes::findOrFail($id);
        $productattributes->delete();
        toastr()->success('Sussessfully To Delete Attribute..');
        return back();
    }
    public function image_add(Request $request)
    {
        $request->validate([
//            'image'                 => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        if ($request->hasFile('image')) {
            $image_tmps =  $request->file('image');
            foreach($image_tmps as $image_tmp){
                    if ($image_tmp->isValid()) {
                        $extension =  $image_tmp->getClientOriginalExtension();
                        $filename = rand(111,99999).'.'.$extension;
                        $product_path = "backend/products_images/".$filename;
                        Image::make($image_tmp)->save($product_path);
                        $image   =  $filename;
                    }
                 ProductImages::create([
                    'image' => $image,
                    'product_id' => $request->product_id,
                ]);
            }
            toastr()->success('Image uploaded successfully :)');
        }
        return redirect()->back();
    }
      public function image_delete($id)
    {
        $product = ProductImages::findOrFail($id);
        $product_path_large = "backend/products_images/";
        if (file_exists($product_path_large.$product->image)) {
            unlink($product_path_large.$product->image);
        }
        $product->delete();
        toastr()->success('Delete Product Image Sussessfully..');
        return back();
    }
}
