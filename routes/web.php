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
    return view('welcome');
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


