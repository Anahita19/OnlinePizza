<?php
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Route::group(['middleware'=>'admin'], function(){
Route::prefix('administrator')->group(function(){
    Route::get('/', 'Backend\MainController@mainPage');

    Route::resource('users', 'Backend\AdminUserController');
    Route::resource('photos', 'Backend\PhotoController');
    Route::resource('products', 'Backend\ProductController');
    Route::post('photos/upload', 'Backend\PhotoController@upload')->name('photos.upload');
    Route::get('orders', 'Backend\OrderController@index');
    Route::get('orders/lists/{id}', 'Backend\OrderController@getOrderLists')->name('orders.lists');


});
//});


//Route::prefix('api')->group(function () {
//    Route::get('/products/{id}/', 'Frontend\ProductController@apiGetProduct');
//
//});

//
Route::group(['middleware'=>'auth'], function() {
    Route::get('/profile', 'Frontend\UserController@profile')->name('user.profile');
    Route::get('/order-verify', 'Frontend\OrderController@verify')->name('order.verify');
    Route::get('/payment-verify/{id}', 'Frontend\PaymentController@verify')->name('payment.verify');
    Route::get('orders', 'Frontend\OrderController@index')->name('profile.orders');
    Route::get('orders/lists/{id}', 'Frontend\OrderController@getOrderLists')->name('profile.orders.lists');
});

Route::get('/', 'Frontend\HomeController@index')->name('index');

Route::post('/register-user', 'Frontend\UserController@register')->name('user.register');
Route::get('/add-to-cart/{id}', 'Frontend\CartController@addToCart')->name('cart.add');
Route::post('/remove-item/{id}', 'Frontend\CartController@removeItem')->name('cart.remove');
Route::get('/cart', 'Frontend\CartController@getCart')->name('cart.cart');
//Route::get('products/{slug}', 'Frontend\ProductController@getProduct')->name('product.single');



