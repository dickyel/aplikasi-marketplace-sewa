<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/recommendation', 'RecommendedController@index')->name('recommend');

Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/{id}', 'CategoryController@detail')->name('categories-detail');


Route::get('/detail-products/{id}', 'DetailProductController@index')->name('detail-product');
Route::post('/detail-products/{id}', 'DetailProductController@add')->name('detail-product-add');
Route::post('/detail-product/comment-product','DetailProductController@comment')->name('detail-product-comment');

Route::get('/stores', 'StoreController@index')->name('stores');
Route::get('/stores/{id}', 'StoreController@detail')->name('detail-store');
Route::get('/product-store/{id}', 'ProductStoreController@index')->name('product-store');

Route::get('/recommendation-store', 'RecommendationStoreController@index')->name('recommendation-store');

Route::get('/success', 'CartController@success')->name('success');

Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');

Route::group(['middleware' => ['auth']], function(){
    
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::delete('/cart/{id}', 'CartController@delete')->name('cart-delete');
    Route::post('/checkout', 'CheckoutController@process')->name('checkout');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    
    Route::get('/dashboard/products', 'DashboardProductController@index')->name('dashboard-product');    
    Route::get('/dashboard/products/create', 'DashboardProductController@create')->name('dashboard-product-create');
    Route::post('/dashboard/products', 'DashboardProductController@store')->name('dashboard-product-store');
    Route::get('/dashboard/products/{id}', 'DashboardProductController@details')->name('dashboard-product-details');
    Route::post('/dashboard/products/{id}', 'DashboardProductController@update')->name('dashboard-product-update');
    Route::get('/dashboard/products/delete/{id}', 'DashboardProductController@destroy')->name('dashboard-product-delete');

    Route::post('/dashboard/products/gallery/upload', 'DashboardProductController@uploadGallery')->name('dashboard-product-gallery-upload');
    Route::get('/dashboard/products/gallery/delete/{id}', 'DashboardProductController@deleteGallery')->name('dashboard-product-gallery-delete');

    Route::get('/dashboard/transactions', 'DashboardTransactionController@index')->name('dashboard-transaction');
    Route::get('/dashboard/transactions/{id}', 'DashboardTransactionController@details')->name('dashboard-transaction-details');
    Route::post('/dashboard/transactions/{id}', 'DashboardTransactionController@update')
        ->name('dashboard-transaction-update');
    
    Route::get('/dashboard/comment', 'DashboardCommentController@index')->name('dashboard-comment');
    

    Route::get('/dashboard/settings', 'DashboardSettingController@store')->name('dashboard-settings-store');
    Route::get('/dashboard/account', 'DashboardSettingController@account')->name('dashboard-settings-account');
    Route::post('/dashboard/account/{redirect}', 'DashboardSettingController@update')->name('dashboard-settings-redirect');
    Route::post('/dashboard/account/upload', 'DashboardSettingController@uploadStore')->name('dashboard-settings-upload');

    Route::get('/dashboard/upload', 'DashboardUploadController@index')->name('dashboard-upload');
    Route::post('/dashboard/upload/{id}', 'DashboardUploadController@update')->name('dashboard-upload-update');
});


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/','DashboardController@index')->name('admin-dashboard');
        Route::resource('category','CategoryController');
        Route::resource('user','UserController');
        Route::resource('product','ProductController');
        Route::resource('product-gallery','ProductGalleryController');
        Route::resource('comment','CommentController');
        Route::resource('transaction', 'TransactionController');
    });

Auth::routes();


