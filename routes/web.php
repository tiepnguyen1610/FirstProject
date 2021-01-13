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

Route::get('/', function () {
    return view('admin.master');
    //return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test', function () {
    return view('admin.category.edit');
});

Route::group(['prefix'=>'admin'], function(){

	Route::group(['prefix'=>'category'], function(){

		Route::get('create', ['as'=> 'admin.category.create', 'uses'=> 'CategoryController@create']);
		Route::post('create', ['as'=> 'admin.category.store', 'uses'=> 'CategoryController@store']);
		Route::get('index', ['as'=> 'admin.category.index', 'uses'=> 'CategoryController@index']);
		Route::get('edit/{id}', ['as'=> 'admin.category.edit', 'uses'=> 'CategoryController@edit']);
		Route::post('edit/{id}', ['as'=> 'admin.category.update', 'uses'=> 'CategoryController@update']);
		Route::get('delete/{id}', ['as'=> 'admin.category.destroy', 'uses'=> 'CategoryController@destroy']);
	});

	Route::group(['prefix' =>'slide'], function(){
		Route::get('create', ['as'=> 'admin.slide.create', 'uses'=> 'SildesController@create']);
		Route::post('create', ['as'=> 'admin.slide.store', 'uses'=> 'SildesController@store']);
		Route::get('index', ['as'=> 'admin.slide.index', 'uses'=> 'SildesController@index']);
		Route::get('edit/{id}', ['as'=> 'admin.slide.edit', 'uses'=> 'SildesController@edit']);
		Route::post('edit/{id}', ['as'=> 'admin.slide.update', 'uses'=> 'SildesController@update']);
		Route::get('delete/{id}', ['as'=> 'admin.slide.destroy', 'uses'=> 'SildesController@destroy']);
	});

	Route::group(['prefix' =>'product'], function(){
		Route::get('create', ['as'=> 'admin.product.create', 'uses'=> 'ProductController@create']);
		Route::post('create', ['as'=> 'admin.product.store', 'uses'=> 'ProductController@store']);
		Route::get('index', ['as'=> 'admin.product.index', 'uses'=> 'ProductController@index']);
		Route::get('edit/{id}', ['as'=> 'admin.product.edit', 'uses'=> 'ProductController@edit']);
		Route::post('edit/{id}', ['as'=> 'admin.product.update', 'uses'=> 'ProductController@update']);
		Route::get('delete/{id}', ['as'=> 'admin.product.destroy', 'uses'=> 'ProductController@destroy']);
	});

});

Route::get('trang-chu', ['as' => 'index', 'uses' => 'PageController@getIndex']);
Route::get('loai-san-pham/{catid}', ['as' => 'typeproduct', 'uses' => 'PageController@getTypeProduct']);
Route::get('chi-tiet-san-pham/{id}', ['as' => 'detailproduct', 'uses' => 'PageController@getDetailProduct']);
Route::get('lien-he', ['as' => 'contact', 'uses' => 'PageController@getContact']);
Route::get('gioi-thieu', ['as' => 'about', 'uses' => 'PageController@getAbout']);
Route::get('dat-hang', ['as' => 'getCheckout', 'uses' => 'PageController@getCheckout']);
Route::post('dat-hang', ['as' => 'postCheckout', 'uses' => 'PageController@postCheckout']);

Route::group(['prefix' => 'cart'], function(){
	Route::get('index', ['as' => 'cart.index', 'uses' => 'CartController@index']);
	Route::get('add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
	Route::get('delete/{id}', ['as' => 'cart.delete', 'uses' => 'CartController@delete']);
});

Route::get('dang-ky', ['as' => 'getSignup', 'uses' => 'UserController@getSignup']);
Route::post('dang-ky', ['as' => 'postSignup', 'uses' => 'UserController@postSignup']);
Route::get('dang-nhap', ['as' => 'getLogin', 'uses' => 'UserController@getLogin']);
Route::post('dang-nhap', ['as' => 'postLogin', 'uses' => 'UserController@postLogin']);


