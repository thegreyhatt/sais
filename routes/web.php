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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});



// ADMIN ROUTES GROUP
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){

	Route::get('/', function(){
		return view('admin.index');
	});

	Route::get('users', 'UserController@ShowUsers')->name('users');
	Route::post('users', 'UserController@AddNewUser');
	Route::get('users-list', 'UserController@UsersList')->name('users list');
	Route::get('user/{id}', 'UserController@User');
	Route::post('user/{id}', 'UserController@UpdateUser');

	Route::get('items', 'ItemController@ShowItems')->name('items');
	Route::post('items', 'ItemController@AddNewItem');
	Route::get('items-list', 'ItemController@ItemsList')->name('items list');

	Route::get('categories', 'CategoryController@ShowCategories')->name('categories');
	Route::post('categories', 'CategoryController@AddNewCategory');
	Route::get('category-list', 'CategoryController@CategoryList')->name('category list');
	Route::get('category/{id}', 'CategoryController@Category')->name('category');
	Route::post('category/{id}', 'CategoryController@UpdateCategory');

});

//CASHIER ROUTES GROUP
Route::group(['prefix' => 'cashier', 'middleware' => 'auth'], function(){
	Route::get('/', 'CashierController@index')->name('cashier');
	Route::get('item-info/{id}', 'CashierController@itemInfo')->name('item info');
});

