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

Route::get('tour/edit/{tour_id}',[
    'as'=>'edit',
    'uses'=>'TourController@edit'
]);

Route::post('tour/edit/{tour_id}','TourController@update');

Route::get('tour/create',[
    'as'=>'create',
    'uses'=>'TourController@create'
]);

Route::post('tour/create','TourController@store');

Route::get('destroy/{tour_id}',[
    'as'=>'destroy',
    'uses'=>'TourController@destroy'
]);

//group
Route::get('/group',[
    'as'=>'group',
    'uses'=>'GroupController@index'
]);
Route::get('/group/create',[
    'as'=>'group_create',
    'uses'=>'GroupController@create'
]);
Route::post('group/create','GroupController@store');
Route::get('/group/edit/{id}',[
    'as'=>'group_edit',
    'uses'=>'GroupController@edit'
]);
Route::get('/group/detail/{id}',[
    'as'=>'group_detail',
    'uses'=>'GroupController@show'
]);
Route::post('/group/edit/{id}',[
    'as'=>'group_update',
    'uses'=>'GroupController@update'
]);
Route::get('delete/{id}',[
    'as'=>'group_delete',
    'uses'=>'GroupController@destroy'
]);
Route::get('/participant/staff/group_{id}',[
    'as'=>'choose_staff',
    'uses'=>'GroupController@chooseStaff'
]);
//participant
Route::post('/participant/group_{id}',[
    'as'=>'participant_create',
    'uses'=>'ParticipantController@store'
]);
Route::get('/participant/group_{id}',[
    'as'=>'participant_edit',
    'uses'=>'ParticipantController@edit'
]);
Route::get('participant/delete/group_{id}',[
    'as'=>'participant_delete',
    'uses'=>'ParticipantController@destroy'
]);
Route::post('participant/staff/group_{id}',[
    'as'=>'update_staff',
    'uses'=>'ParticipantController@update'
]);
Route::get('/group/{id}/staff/{staff}',[
    'as'=>'update_list',
    'uses'=>'ParticipantController@update_list'
]);
//cost
Route::get('/cost',[
    'as'=>'cost',
    'uses'=>'CostController@index'
]);
Route::get('cost/edit_cost/{cost_id}',[
    'as'=>'edit_cost',
    'uses'=>'CostController@edit'
]);
Route::post('cost/edit_cost/{cost_id}','CostController@update');

Route::get('destroy_cost/{cost_id}',[
    'as'=>'destroy_cost',
    'uses'=>'CostController@destroy'
]);
Route::get('cost/create',[
    'as'=>'create_cost',
    'uses'=>'CostController@create'
]);
Route::post('cost/create','CostController@store');

Route::get('cost/detail_cost/{cost_id}',[
    'as'=>'show_cost',
    'uses'=>'CostController@show'
]);

Route::get('destroy_cost/{id}',[
    'as'=>'destroy_cost',
    'uses'=>'CostController@destroy'
]);
//end cost
//Customer
Route::get('/customer',[
    'as'=>'customer',
    'uses'=>'CustomerController@index'
]);
Route::get('edit_customer/{customer_id}',[
    'as'=>'edit_customer',
    'uses'=>'CustomerController@edit'
]);
Route::post('customer/edit_customer/{customer_id}','CustomerController@update');

Route::get('destroy_customer/{customer_id}',[
    'as'=>'destroy_customer',
    'uses'=>'CustomerController@destroy'
]);

Route::get('customer/create',[
    'as'=>'create_customer',
    'uses'=>'CustomerController@create'
]);
Route::post('customer/create','CustomerController@store');

Route::get('customer/detail_customer/{customer_id}',[
    'as'=>'show_customer',
    'uses'=>'CustomerController@show'
]);
Route::get('destroy_customer/{customer_id}',[
    'as'=>'destroy_customer',
    'uses'=>'CustomerController@destroy'
]);
//Staff
Route::get('/staff',[
    'as'=>'staff',
    'uses'=>'StaffController@index'
]);

Route::get('edit_staff/{staff_id}',[
    'as'=>'edit_staff',
    'uses'=>'StaffController@edit'
]);
Route::post('staff/edit_staff/{staff_id}','StaffController@update');

Route::get('destroy_staff/{staff_id}',[
    'as'=>'destroy_staff',
    'uses'=>'StaffController@destroy'
]);

Route::get('staff/create',[
    'as'=>'create_staff',
    'uses'=>'StaffController@create'
]);
Route::post('staff/create','StaffController@store');

Route::get('staff/detail_staff/{staff_id}',[
    'as'=>'show_staff',
    'uses'=>'StaffController@show'
]);

Route::get('destroy_staff/{staff_id}',[
    'as'=>'destroy_staff',
    'uses'=>'StaffController@destroy'
]);

//Login
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

Route::get('/price',[
    'uses'=>'PriceController@index'
]);
Route::get('/pricee',[
    'uses'=>'PriceController@Search'
]);

Route::get('price/create','PriceController@oncreate');

Route::post('price/create','PriceController@PriceCreate');

Route::get('/price/edit/{id}',[
    'uses'=>'PriceController@onedit'
]);

Route::post('/price/edit/{id}',[
    'uses'=>'PriceController@PriceEdit'
]);
