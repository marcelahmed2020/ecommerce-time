<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ProductMore;
class Product extends Model
{
    use ProductMore;
    protected $guarded = [];
    protected $fillable = ['title', 'sleeve','brand','featured', 'stock','diffrent_size','purchasing_price','short_desc','color','code','desc','cat_id','price','viewer','enabled'];
    protected $appends = ['product_image'];
    public static function getCurrencyRates($price){
        $getCurrencyRates = \App\Currency::where(['enabled'=>1,'status'=>1])->get();
        foreach ($getCurrencyRates as $key => $val){
            if ($val->code == "EUR"){
               $EUR = rand($price/$val->exchange_rate,2);
            } elseif ($val->code == "BYR"){
                $BYR = rand($price*$val->exchange_rate,2);
            } elseif ($val->code == "EGP"){
                $EGP = rand($price*$val->exchange_rate,2);
            }
        }
        $currencies = ['EUR'=>isset($EUR)?$EUR:'','BYR'=>isset($BYR)?$BYR:'','EGP'=>isset($EGP)?$EGP:''];
         return $currencies;
      }
}
// isset($val->code == "BYR") 