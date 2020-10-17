<?php
namespace App\Http\View\Composer;
use App\Country;
use App\Product;
use App\ProductAttributes;
use App\Settings;
use App\Category;
use App\CmsPage;
use Illuminate\View\View;
class SettingsComposer
{
    public function compose(View $view)
    {
        $view->with('settings',Settings::get()->first());
        $view->with('categories_aside',Category::where(['enabled'=>1,'parent'=>0])->get());
        $view->with('product_Rated',Product::where(['enabled'=>1,'status'=>1,'rated'=>5])->orderBy('rated','DESC')->take(6)->get());
        $view->with('countries',Country::where(['enabled'=>1,'status'=>1])->get());
        $view->with('cmspage_all',CmsPage::where(['enabled'=>1,'status'=>1])->get());
        $view->with('all_color',collect(json_decode(json_encode(Product::select('color')->get()),true))->unique());
        $view->with('all_brand',collect(json_decode(json_encode(Product::select('brand')->get()),true))->unique());
        $view->with('all_sizes',collect(json_decode(json_encode(ProductAttributes::select('size')->get()),true))->unique());
//        dd(collect(json_decode(json_encode(ProductAttributes::select('size')->get()),true))->unique());

        // trash

        $view->with('categories_trash',Category::where(['enabled'=>0])->get());


    }
}
