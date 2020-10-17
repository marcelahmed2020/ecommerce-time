<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Start user.register
Route::group(['middleware'=>['guest']],function (){
Route::get('/user/register','AcccountController@register')->name('user.register');
Route::post('/do/register','AcccountController@do_register')->name('user.do_register');
Route::get('/user/login','AcccountController@login')->name('user.login');
Route::post('/do/login','AcccountController@do_login')->name('user.do_login');
Route::get('/account/confirm/{code}','AcccountController@confirmEmail')->name('account.confirm.email');// Profile Action

Route::get('/user/forgetpass','AcccountController@forget_password')->name('user.forgetpass');
Route::post('/user/send-password','AcccountController@send_mailt')->name('user.send_mail_password');
Route::get('/user/password-reset/{token}','AcccountController@password_reset_t')->name('user.password_reset_t');
Route::put('/user/change-password/{id}','AcccountController@change_password')->name('user.change_password');
//do_register
});
//End user.register
Route::group(['middleware'=>['auth']],function (){
    Route::get('/user/acouunt','UserController@account')->name('user.account');
    Route::put('/user/acouunt/{id}','UserController@do_account')->name('user.do_account');
    Route::get('/user/checkout','UserController@checkout')->name('user.checkout');
    Route::post('/delivery/address','UserController@deliveryaddress')->name('user.delivery_address');
    Route::get('/user/review/order','UserController@order_review')->name('user.order_review');
    Route::post('/user/place/order','UserController@place_order')->name('place.order');
    Route::get('/user/stripe','UserController@stripe')->name('user.stripe');
    Route::post('/user/charge','UserController@charge')->name('user.charge');

    Route::get('/user/orders','UserController@user_orders')->name('user.orders');
    Route::get('/user/view-order/{id}','UserController@view_order')->name('user.view_order');





    Route::get('/user/logout','AcccountController@logout')->name('user.logout');
});

Route::get('/','IndexController@index')->name('home');
Route::match(['get','post'],'/filter','IndexController@filter')->name('filter'); // contact

Route::get('/products','ProductsController@products');
Route::get('/product/details/{id}','ProductsController@details')->name('details');
Route::get('/get/price','ProductsController@get_price');
Route::get('/search/products','ProductsController@get_product');


Route::get('/tags','ProductsController@tags')->name('tags.product');
Route::get('/tag/{name}','ProductsController@tag')->name('tag.product');
Route::get('/category/{title}','ProductsController@category')->name('category.product');


Route::get('/cart','ShopingController@cart')->name('cart');
Route::post('/add/cart','ShopingController@AddCart')->name('add.cart');
Route::get('/delete/cart/{id}','ShopingController@DeleteCart')->name('delete.cart');
Route::get('/quantity/cart/{id}/{quantity}','ShopingController@QuantityCart')->name('quantity.cart');
//wishlist
Route::get('/wishlist','ShopingController@wishlist')->name('wishlist');
Route::get('/add/wishlist/{id}','ShopingController@AddWishlist')->name('product.wishlist');
Route::get('/delete/wishlist/{id}','ShopingController@DeleteWishlist')->name('delete.wishlist');

Route::post('/add/coupon','ShopingController@AddCoupons')->name('add.coupon');
Route::post('/add/pincode','ShopingController@AddPincode')->name('add.pincode');

Route::post('/add/subscribe','IndexController@AddSubscribe')->name('add.subscribe');


Route::get('/cms/page/{link}','IndexController@link')->name('cms.link');
Route::match(['get','post'],'/contact','IndexController@contact')->name('contact'); // contact
