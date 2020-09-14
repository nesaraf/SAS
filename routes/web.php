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

Route::get('/', function(){
	return view('auth.login');
});

Route::get('/accessdenied','AccessDeniedController@index');

Route::get('/register', 'Auth/RegisterController@showRegistrationForm')->name('register');

Auth::routes();
//


Route::get('/home', 'ProductController@index')->name('home');
Route::resource('employee', 'EmpContoller');

Route::get('ajax/{barcode}','AjaxController@index');

Route::get('billnumber','NumberController@updateAmount');

Route::get('billnumbershow','NumberController@getNumber');


Route::put('ajx/{barcode}/{amount}','AjxController@updateAmount');
Route::put('ajxm/{barcode}/{amt}','AjxController@updateAmount');
Route::put('setdate','SetDateController@updateAmount');
Route::POST('addsalesdetail/{barcode}/{amount}/{bill_no}','AddSalesDetailController@index');
Route::resource('pdf','PdfController');

 Route::resource('user','UserController');
Route::resource('customer','CustomerController');
Route::resource('product','ProductController');
route::post('LoadData','ProductController@LoadData')->name('LoadData');
route::get('FileDelete/{name}','ProductController@Deletefile');
Route::get('EditProduct/{id}','ProductController@edit');
Route::get('getemp/{id}','EmpContoller@edit');
Route::get('findEmp/{id}','EmpContoller@find');

Route::post('UpdateProduct','ProductController@update');
Route::post('UpdateEmp/{id}','EmpContoller@update');
Route::post('Upload','ProductController@upload');
// Route::post('login','UserController@login');
Route::delete('deleteprod/{id}','ProductController@destroy',['middleware' => 'admin']);
Route::resource('category','CategoryController');
Route::resource('unit','UnitController');
Route::resource('sale','SaleController');
Route::resource('sale_detail','SaleDetailController');



// Route::get('logout','UserController@logout')->name('logout');
Route::get('CriExpDate','NotificationController@criexpdate')->name('CriExpDate');
Route::get('LowExpDate','NotificationController@lowexpdate')->name('LowExpDate');
Route::get('LowAmount','NotificationController@lowamount')->name('LowAmount');




