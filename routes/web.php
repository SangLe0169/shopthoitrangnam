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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/trangchu','HomeController@index');
Route::get('/detail/{id}','HomeController@chitietsanpham');
Route::post('/detail/{id}','HomeController@postComment');
Route::get('/danhsachsanpham/{id}/{slug}.html','HomeController@list_product');
Route::get('/search','HomeController@getSearch');
Route::get('/carts','HomeController@getCart');
Route::get('/contact','HomeController@getContact');
Route::post('/contact','HomeController@postContact');
Route::get('/blog','HomeController@getBlog');
Route::get('/blog_detail/{id}','HomeController@getBlogdetail');
Route::group(['prefix' => 'cart'], function () {
    Route::get('add/{id}','CartController@getAddCart');
    Route::get('show','CartController@getShow');
    Route::get('delete/{id}','CartController@getDelete');
    Route::get('update','CartController@getUpdate');
    Route::get('checkout','CartController@getCheckout');
    Route::post('checkout','CartController@postCheckout');
    Route::post('postcheckout','CartController@postPay');
    Route::post('seclect-delivery-home','CartController@postDelivery');
    Route::post('calculate-fee','CartController@postCalculate');
    Route::get('delete-fee','CartController@getDelfee');
    Route::get('create','CartController@getCreate');
    Route::post('create','CartController@postCreate');
    Route::post('return','CartController@Return');
    Route::get('pay-with-paypal','CartController@paywithPayPal')->name('checkout.paypal');

});

Route::resource('payment','PaymentController');
Route::get('/thanhtoan','CartController@getThanhtoan');
Route::get('/thuonghieu/{id}','HomeController@trademark');
Route::get('/forgot_password','LoginController@getforgot');
Route::post('/forgot_password','LoginController@postforgot');
Route::get('/password_reset','LoginController@getReset')->name('reset_password');
Route::post('/password_reset','LoginController@postReset');

Route::get('dangky',[
    'as' =>'signin',
    'uses'=>'LoginController@getSignin'
]);
Route::post('dangky',[
    'as' =>'signin',
    'uses'=>'LoginController@postSignin'
]);
Route::get('dangnhap',[
    'as' =>'login',
    'uses'=>'LoginController@getLogin'
]);
Route::post('dangnhap',[
    'as' =>'login',
    'uses'=>'LoginController@postLogin'
]);
Route::get('dangxuat',[
    'as' =>'logout',
    'uses'=>'LoginController@getLogout'
]);




Route::group(['namespace' => 'Admin'], function () {
    
   // Route::get('logout','HomeController@getLogout');
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/login','LoginController@getLogin');
        Route::get('/home', 'LoginController@getHome')->middleware("LoginAdmin");
        Route::get('/logout', 'LoginController@getLogout');
        Route::post('/home', 'LoginController@postLogin');

        Route::group(['prefix' => 'category'], function () {
            Route::get('/','CategoryController@getCate');
            Route::post('/','CategoryController@postCate');

            Route::get('edit/{id}','CategoryController@getEdit');
            Route::post('edit/{id}','CategoryController@postEdit');

            Route::get('delete/{id}','CategoryController@getDeleteCate');
        });
        Route::group(['prefix' => 'product'], function () {
            Route::get('/','ProductController@getProduct');
            Route::post('/','ProductController@postProduct');

            Route::get('edit/{id}','ProductController@getEdit');
            Route::post('edit/{id}','ProductController@postEdit');

            Route::get('delete/{id}','ProductController@getDeleteProduct');
        });
        Route::group(['prefix' => 'customer'], function () {
            Route::get('/','CustomerController@getCustomer');
            Route::post('/','CustomerController@postCustomer');

            Route::get('edit/{id}','CustomerController@getEdit');
            Route::post('edit/{id}','CustomerController@postEdit');

            Route::get('delete/{id}','CustomerController@getDeleteCustomer');
        });
        Route::group(['prefix' => 'posts'], function () {
            Route::get('/','PostsController@getPosts');
            Route::post('/','PostsController@postPosts');

            Route::get('edit/{id}','PostsController@getEdit');
            Route::post('edit/{id}','PostsController@postEdit');

            Route::get('delete/{id}','PostsController@getDeletePosts');
        });
        Route::group(['prefix' => 'orders'], function () {
            Route::get('/','OrdersController@getOrders');
            Route::post('/','OrdersController@postOrders');
            
            Route::get('view/{or_code}','OrdersController@view_order');
            
            Route::post('/update-order-quantity','OrdersController@post_Update_quantity');
            Route::post('/update-qty','OrdersController@post_Update_Qty');
            Route::get('/delete-oder/{id}','OrdersController@del_Oder');
            
            //Route::get('detail/{detail_Order}','OrdersController@view_order');
            Route::get('/print_order/{checkout_code}','OrdersController@getPrint_order');
          

            Route::get('delete/{id}','OrdersController@getDeleteOrders');
        });
        Route::group(['prefix' => 'orders_detail'], function () {
            Route::get('/','OrdersController@getOrdersdetail');
            Route::post('/','OrdersController@postOrders');
           
            //Route::get('detail/{detail_Order}','OrdersController@orderid');

            Route::get('delete/{id}','OrdersController@getDeleteOrders');
        });
      
       Route::group(['prefix' => 'delivery'], function () {
            Route::get('/','DeliveryController@getDelivery');
            Route::post('/seclect-delivery','DeliveryController@postDelivery');
            Route::post('/insert-delivery','DeliveryController@insert_delivery');
            Route::post('/seclect-fee','DeliveryController@seclect_fee');
            Route::post('/update-delivery','DeliveryController@update_delivery');
            

           
        });
        Route::group(['prefix' => 'slider'], function () {
            Route::get('/','SliderController@getSlider');
            Route::post('/','SliderController@postSlider');

            Route::get('edit/{id}','SliderController@getEdit');
            Route::post('edit/{id}','SliderController@postEdit');

            Route::get('delete/{id}','SliderController@getDeleteSlide');
        });

    });

});
