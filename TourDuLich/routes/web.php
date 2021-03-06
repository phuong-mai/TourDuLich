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
])->middleware('auth');

Route::get('/booktour',[
    'as'=>'booktour',
    'uses'=>'BookTourController@index'
])->middleware('auth');

Route::get('/tour',[
    'as'=>'tour',
    'uses'=>'TourController@index'
])->middleware('auth');

Route::get('tour/edit/{tour_id}',[
    'as'=>'edit',
    'uses'=>'TourController@edit'
])->middleware('auth');

Route::post('tour/edit/{tour_id}','TourController@update');

Route::get('tour/create',[
    'as'=>'create',
    'uses'=>'TourController@create'
])->middleware('auth');

Route::post('tour/create','TourController@store');

Route::get('destroy/{tour_id}',[
    'as'=>'destroy',
    'uses'=>'TourController@destroy'
])->middleware('auth');

//group
Route::get('/group',[
    'as'=>'group',
    'uses'=>'GroupController@index'
])->middleware('auth');
Route::get('/group/create',[
    'as'=>'group_create',
    'uses'=>'GroupController@create'
])->middleware('auth');
Route::post('group/create','GroupController@store');
Route::get('/group/edit/{id}',[
    'as'=>'group_edit',
    'uses'=>'GroupController@edit'
])->middleware('auth');
Route::get('/group/detail/{id}',[
    'as'=>'group_detail',
    'uses'=>'GroupController@show'
])->middleware('auth');
Route::post('/group/edit/{id}',[
    'as'=>'group_update',
    'uses'=>'GroupController@update'
]);
Route::get('delete/{id}',[
    'as'=>'group_delete',
    'uses'=>'GroupController@destroy'
])->middleware('auth');
Route::get('/participant/staff/group_{id}',[
    'as'=>'choose_staff',
    'uses'=>'GroupController@chooseStaff'
])->middleware('auth');
//participant
Route::post('/participant/group_{id}',[
    'as'=>'store',
    'uses'=>'ParticipantController@store'
]);
Route::post('/customer_file',[
    'as'=>'customer_file',
    'uses'=>'ParticipantController@customerfile'
]);
Route::get('/participant/group_{id}',[
    'as'=>'participant_edit',
    'uses'=>'ParticipantController@edit'
])->middleware('auth');
Route::get('participant/delete/group_{id}',[
    'as'=>'participant_delete',
    'uses'=>'ParticipantController@destroy'
])->middleware('auth');
Route::post('participant/staff/group_{id}',[
    'as'=>'update_staff',
    'uses'=>'ParticipantController@update'
]);
Route::get('/group/{id}/staff/{staff}',[
    'as'=>'update_list',
    'uses'=>'ParticipantController@update_list'
])->middleware('auth');
//cost
Route::get('/cost',[
    'as'=>'cost',
    'uses'=>'CostController@index'
])->middleware('auth');
Route::get('cost/edit_cost/{cost_id}',[
    'as'=>'edit_cost',
    'uses'=>'CostController@edit'
])->middleware('auth');
Route::post('cost/edit_cost/{cost_id}','CostController@update');

Route::get('destroy_cost/{cost_id}',[
    'as'=>'destroy_cost',
    'uses'=>'CostController@destroy'
])->middleware('auth');
Route::get('cost/create',[
    'as'=>'create_cost',
    'uses'=>'CostController@create'
])->middleware('auth');
Route::post('cost/create','CostController@store');

Route::get('cost/detail_cost/{cost_id}',[
    'as'=>'show_cost',
    'uses'=>'CostController@show'
])->middleware('auth');

Route::get('destroy_cost/{id}',[
    'as'=>'destroy_cost',
    'uses'=>'CostController@destroy'
])->middleware('auth');
//end cost
//Customer
Route::get('/customer',[
    'as'=>'customer',
    'uses'=>'CustomerController@index'
])->middleware('auth');
Route::get('edit_customer/{customer_id}',[
    'as'=>'edit_customer',
    'uses'=>'CustomerController@edit'
])->middleware('auth');
Route::post('customer/edit_customer/{customer_id}','CustomerController@update');

Route::get('destroy_customer/{customer_id}',[
    'as'=>'destroy_customer',
    'uses'=>'CustomerController@destroy'
])->middleware('auth');

Route::get('customer/create',[
    'as'=>'create_customer',
    'uses'=>'CustomerController@create'
])->middleware('auth');
Route::post('customer/create','CustomerController@store');

Route::get('customer/detail_customer/{customer_id}',[
    'as'=>'show_customer',
    'uses'=>'CustomerController@show'
])->middleware('auth');
Route::get('destroy_customer/{customer_id}',[
    'as'=>'destroy_customer',
    'uses'=>'CustomerController@destroy'
]);
//Staff
Route::get('/staff',[
    'as'=>'staff',
    'uses'=>'StaffController@index'
])->middleware('auth');

Route::get('edit_staff/{staff_id}',[
    'as'=>'edit_staff',
    'uses'=>'StaffController@edit'
])->middleware('auth');
Route::post('staff/edit_staff/{staff_id}','StaffController@update');

Route::get('destroy_staff/{staff_id}',[
    'as'=>'destroy_staff',
    'uses'=>'StaffController@destroy'
])->middleware('auth');

Route::get('staff/create',[
    'as'=>'create_staff',
    'uses'=>'StaffController@create'
])->middleware('auth');
Route::post('staff/create','StaffController@store');

Route::get('staff/detail_staff/{staff_id}',[
    'as'=>'show_staff',
    'uses'=>'StaffController@show'
])->middleware('auth');

Route::get('destroy_staff/{staff_id}',[
    'as'=>'destroy_staff',
    'uses'=>'StaffController@destroy'
])->middleware('auth');

//Login
Route::get('/login',[
    'as'=>'login',
    'uses'=>'LoginController@getlogin'
]);
Route::post('/login',[
    'as'=>'login',
    'uses'=>'LoginController@postlogin'
]);
Route::get('/logout',[
    'as'=>'logout',
    'uses'=>'LoginController@logout'
]);
Route::get('/register',[
    'as'=>'register',
    'uses'=>'LoginController@getregister'
]);
Route::post('/register',[
    'as'=>'register',
    'uses'=>'LoginController@postregister'
]);

//price
Route::get('/price',[
    'as'=>'price',
    'uses'=>'PriceController@index'
])->middleware('auth');
Route::get('price/edit_price/{price_id}',[
    'as'=>'edit_price',
    'uses'=>'PriceController@edit'
])->middleware('auth');
Route::post('price/edit_price/{price_id}','PriceController@update');

Route::get('destroy_price/{price_id}',[
    'as'=>'destroy_price',
    'uses'=>'PriceController@destroy'
])->middleware('auth');
Route::get('price/create',[
    'as'=>'create_price',
    'uses'=>'PriceController@create'
])->middleware('auth');
Route::post('price/create','PriceController@store');

Route::get('price/detail_price/{price_id}',[
    'as'=>'show_price',
    'uses'=>'PriceController@show'
])->middleware('auth');

Route::get('destroy_price/{id}',[
    'as'=>'destroy_price',
    'uses'=>'PriceController@destroy'
])->middleware('auth');
//end price
//Auth::routes();
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
