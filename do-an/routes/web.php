<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')->name('ckfinder_connector');
Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')->name('ckfinder_browser');
// Route::get('/', function(){
//     return view('website/modules/homes/page_home');
// });
Route::group(['namespace'=>'Website'],function()
{
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('tin-tuc.html', 'NewsController@index')->name('news');
    Route::get('chi-tiet-tin-tuc/{slug?}.html', 'NewDetailController@index')->name('new_detail');
    Route::get('the-loai/{slug?}.html', 'CategoryController@index')->name('category');
    Route::get('thuong-hieu/{slug?}.html', 'CategoryController@brand')->name('brand');
    Route::get('san-pham/{slug?}.html', 'ProductController@index')->name('product');
    Route::get('gio-hang.html', 'CartController@index')->name('cart');
    Route::get('xac-nhan-don-hang/{uuid}.html', 'CartController@confirm')->name('cart_confirm');
    Route::get('tim-kiem.html', 'SearchController@index')->name('search');

    Route::post('ajax-filter/', 'CategoryController@ajax')->name('ajax-filter');
    Route::post('ajax-news/', 'NewsController@ajax_news')->name('ajax-news');
    Route::post('ajax-category/', 'CategoryController@ajax_category')->name('ajax-category');
    Route::post('get-card', 'CartController@addRowCart')->name('getCart');
    Route::post('get-district', 'AjaxController@getDistrict')->name('getDistrict');
    Route::post('get-ward', 'AjaxController@getWard')->name('getWard');
    Route::post('check-voucher', 'AjaxController@checkVoucher')->name('checkVoucher');
    Route::post('store-cart', 'CartController@store')->name('storeCart');
    Route::post('get-district-showroom', 'AjaxController@getDistrictShowroom')->name('getDistrictShowroom');
    Route::post('get-ward-showroom', 'AjaxController@getWardShowroom')->name('getWardShowroom');
    Route::post('store-Review', 'AjaxController@storeReview')->name('storeReview');
    Route::post('store-Contact', 'AjaxController@storeContact')->name('storeContact');
    Route::post('store-Reply', 'AjaxController@storeReply')->name('storeReply');
    Route::get('getReview', 'ProductController@getReview')->name('getReview');

    Route::get('/clearcache', function() {

            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('config:cache');
            Artisan::call('view:clear');
     
        return "Cleared!";
     
     });
});


