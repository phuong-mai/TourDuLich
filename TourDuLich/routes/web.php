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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[
    'as'=>'index',
    'uses'=>'IndexController@index'
]);

Route::get('/booktour',[
    'as'=>'booktour',
    'uses'=>'BookTourController@index'
]);

Route::get('/tour',[
    'as'=>'tour',
    'uses'=>'TourController@index'
]);

Route::get('/group',[
    'as'=>'group',
    'uses'=>'GroupController@index'
]);

Route::get('/cost',[
    'as'=>'cost',
    'uses'=>'CostController@index'
]);

Route::get('/price',[
    'as'=>'price',
    'uses'=>'PriceController@index'
]);

Route::get('/customer',[
    'as'=>'customer',
    'uses'=>'CustomerController@index'
]);

Route::get('/staff',[
    'as'=>'staff',
    'uses'=>'StaffController@index'
]);

Route::get('/login',[
    'as'=>'login',
    'uses'=>'LoginController@getlogin'
]);

Route::post('/login',[
    'as'=>'login',
    'uses'=>'LoginController@postlogin'
]);
Route::get('/register',[
    'as'=>'register',
    'uses'=>'LoginController@getregister'
]);
Route::post('/register',[
    'as'=>'register',
    'uses'=>'LoginController@postregister'
]);