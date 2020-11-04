<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

Route::get('/group/create',[
    'as'=>'group',
    'uses'=>'GroupController@create'
]);
Route::post('group/create','GroupController@store');
Route::get('/group/edit/{id}',[
    'as'=>'group',
    'uses'=>'GroupController@edit'
]);
Route::post('/group/edit/{id}',[
    'as'=>'group',
    'uses'=>'GroupController@update'
]);
Route::get('/cost',[
    'as'=>'cost',
    'uses'=>'CostController@index'
]);
Route::get('destroy_cost/{id}',[
    'as'=>'destroy_cost',
    'uses'=>'CostController@destroy'
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

Route::get('/TourPrice',[
    'as'=>'tourprice',
    'uses'=>'TourPriceController@index'
]);

Route::get('TourPrice/create','TourPriceController@oncreate');

Route::post('TourPrice/create','TourPriceController@PriceCreate');

Route::get('/TourPrice/edit/{id}',[
    'as'=>'tourprice',
    'uses'=>'TourPriceController@onedit'
]);

Route::post('/TourPrice/edit/{id}',[
    'as'=>'tourprice',
    'uses'=>'TourPriceController@PriceEdit'
]);
