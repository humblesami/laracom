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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('checkout','OrderController');
Route::post('paypal','OrderController@paypal')->name('checkout.paypal');
Route::get('processPaypal','OrderController@processPaypal')->name('process.paypal');
Route::get('cancelPaypal','OrderController@cancelPaypal')->name('cancel.paypal');
//Front Routes
Route::group(['as'=>'products.','prefix'=>'products'],function(){
    Route::get('/','ProductController@show')->name('all');
    Route::get('/{product}','ProductController@single')->name('single');
    Route::get('/addToCart/{product}','ProductController@addToCart')->name('addToCart');
});

//Cart Routes
Route::group(['as'=>'cart.','prefix'=>'cart'],function(){
    Route::get('/','ProductController@cart')->name('all');
    Route::post('/remove/{product}','ProductController@removeProduct')->name('remove');
    Route::post('/update/{product}','ProductController@updateProduct')->name('update');
});


//Admin Routes
Route::group(['as' => 'admin.','middleware' =>['auth','admin'],'prefix'=>'admin'], function(){
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    //Category Controller
    Route::get('category/{category}/remove','CategoryController@remove')->name('category.remove');
    Route::get('category/trash','CategoryController@trash')->name('category.trash');
    Route::get('category/recover/{id}','CategoryController@recoverCat')->name('category.recover');
    
    //Product Controller
    Route::get('product/{product}/remove','ProductController@remove')->name('product.remove');
    Route::get('product/trash','ProductController@trash')->name('product.trash');
    Route::get('product/recover/{id}','ProductController@recoverPro')->name('product.recover');
    
    //User Controller
    Route::get('profile/{profile}/remove','ProfileController@remove')->name('profile.remove');
    Route::get('profile/trash','ProfileController@trash')->name('profile.trash');
    Route::get('profile/recover/{id}','ProfileController@recoverPro')->name('profile.recover');
    
    //Get Address
    Route::get('Profile/states/{id?}','ProfileController@getStates')->name('profile.states');
    Route::get('Profile/cities/{id?}','ProfileController@getCities')->name('profile.cities');

    //Resource Controller
    Route::resource('/product','ProductController');
    Route::resource('/category','CategoryController');
    Route::resource('/profile','ProfileController');
    Route::resource('/user','UserController');
});