<?php
/*
|--------------------------------------------------------------------------
| Admins Routes
| Go To Route -> App\Providers\RouteServiceProvider
|--------------------------------------------------------------------------
*/
// Start Guest
  Route::match(['get','post'],'/admin/login','IndexController@login')->name('admin.login')->middleware('guest'); //  Login Page
  // forgot password
  Route::get('/admin/forgot-password','IndexController@forgot_password')->name('admin.forgot_password');
  Route::post('/admin/send-password','IndexController@send_mail_password')->name('admin.send_mail_password');
  Route::get('/admin/password-reset/{token}','IndexController@password_reset_t')->name('admin.password_reset_t');
  Route::put('/admin/change-password/{id}','IndexController@change_password')->name('admin.change_password');
// End Guest

Route::group(['middleware'=>['auth','admin'],'prefix'=>'admin','name'=>'admin.'],function ()
{// Start For Admin Acces
   Route::get('/dashboard','IndexController@dashboard')->name('dashboard'); // dashboard

    // categories
   Route::resource('categories','CategoriesController');
    Route::get('/categories/restore/{id}','CategoriesController@restore')->name('categories.restore');
    Route::delete('/del/categories/{id}','CategoriesController@force_del')->name('categories.force_del');

//     currencies
    Route::resource('currencies','CurrenciesController');

    // Tages
   Route::resource('tag','TagController');
    Route::get('/tag/restore/{id}','TagController@restore')->name('tag.restore');
    Route::delete('/del/tag/{id}','TagController@force_del')->name('tag.force_del');
    Route::get('/tag/enabled/{id}','TagController@enabled')->name('tag.enabled');
    Route::get('/tag/disabled/{id}','TagController@disabled')->name('tag.disabled');

    // Coupons
    Route::resource('coupons','CouponsController');
    Route::get('/coupons/restore/{id}','CouponsController@restore')->name('coupons.restore');
    Route::delete('/del/coupons/{id}','CouponsController@force_del')->name('coupons.force_del');
    Route::get('/coupons/enabled/{id}','CouponsController@enabled')->name('coupons.enabled');
    Route::get('/coupons/disabled/{id}','CouponsController@disabled')->name('coupons.disabled');

//    charges
    Route::resource('charges','ChargesController');

    //products
    Route::resource('products','ProductsController');
    Route::get('/products/restore/{id}','ProductsController@restore')->name('products.restore');
    Route::get('/products/attribute/{id}','ProductsController@Attribute')->name('products.attribute');
    Route::post('/products/attribute/add','ProductsController@attribute_add')->name('products.attribute_add');
    Route::delete('/del/attribute/{id}','ProductsController@attribute_delete')->name('products.attribute_delete');
    Route::put('/put/attribute/{id}','ProductsController@attribute_update')->name('products.attribute_update');
    Route::post('/products/image/add','ProductsController@image_add')->name('products.image_add');
    Route::delete('/del/image/{id}','ProductsController@image_delete')->name('products.image_delete');

    Route::delete('/del/products/{id}','ProductsController@force_del')->name('products.force_del');

  // admins
    Route::resource('admins','AdminsController');
    Route::post('/admins/disabled/{id}','AdminsController@disabled')->name('admins.disabled'); // Admins/disabled/
    Route::put('/admins/image/{id}','AdminsController@image')->name('admins.image'); // Admins/image
    Route::put('/admins/info/{id}','AdminsController@infos')->name('admins.infos'); // Admins/info
    Route::get('/profile','AdminsController@show_me')->name('admin.profile');
    Route::put('/add/profile/{admin}','AdminsController@D_Profile')->name('admin.update_info');


    Route::get('/subscribes','SubscribeController@index')->name('admin.subscribes');
    Route::delete('/subscribes/{id}','SubscribeController@destroy')->name('admin.subscribes.destroy');
    Route::get('/subscribes/enable/{id}','SubscribeController@enable')->name('admin.subscribes.enable');
    Route::get('/subscribes/disable/{id}','SubscribeController@disable')->name('admin.subscribes.disable');
    Route::get('get/download/list','SubscribeController@getDownloadList')->name('admin.get.download.list');

    // users
    Route::resource('users','UsersController');
    Route::post('/users/disabled/{id}','UsersController@disabled')->name('users.disabled'); // Admins/disabled/
    Route::put('/users/image/{id}','UsersController@image')->name('users.image'); // Admins/image
    Route::put('/users/info/{id}','UsersController@infos')->name('users.infos'); // Admins/info
    Route::put('/profile/{user}','UsersController@D_Profile')->name('users.do_profile');// Profile Action


     // orders
    Route::get('/orders','OrdersController@index')->name('orders.index');
    Route::get('/orders/{id}','OrdersController@show')->name('orders.show');
    Route::get('/invoice/{id}','OrdersController@invoice')->name('orders.invoice'); // invoice View

    Route::get('/orders/create','OrdersController@create')->name('orders.create');
    Route::get('/orders/edit/{id}','OrdersController@edit')->name('orders.edit');
    Route::delete('/orders/destroy/{id}','OrdersController@destroy')->name('orders.destroy');
    Route::delete('/orders/pro/{id}','OrdersController@orders_prod')->name('orders_prod.destroy');
    Route::put('/udate/orders/{id}','OrdersController@udate_orders')->name('orders.udate_orders');//

   // cms  pages
   Route::resource('cms','CmsPageController');

//    pincodes
    Route::resource('pincodes','PincodesController');
    Route::get('/pincodes/disabled/{id}','PincodesController@disabled')->name('pincodes.disabled'); // Admins/disabled/
    Route::get('/pincodes/enabled/{id}','PincodesController@enabled')->name('pincodes.enabled'); // Admins/disabled/



    //  Route::get('/profile','IndexController@Profile')->name('admin.profile');
//  Route::put('/profile/{user}','IndexController@D_Profile')->name('admin.do_profile');// Profile Action
  Route::get('/logout','IndexController@logout')->name('admin.logout'); // logout
});  // End For Admin Acces
