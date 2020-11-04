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

Route::get('/customer',[
    'as'=>'customer',
    'uses'=>'CustomerController@index'
]);

Route::get('/staff',[
    'as'=>'staff',
    'uses'=>'StaffController@index'
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
