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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//ประเภทบริการ
Route::get('/Spa/SpaCategoryDashboard','Spa\SpaCategoryController@index');
Route::get('/Spa/SpaCategoryForm', 'Spa\SpaCategoryController@create');
Route::post('/Spa/createSpaCategory', 'Spa\SpaCategoryController@insert');
Route::get('/Spa/editSpaCategory/{spa_id_category}', 'Spa\SpaCategoryController@edit');
Route::post('/Spa/updateSpaCategory/{spa_id_category}', 'Spa\SpaCategoryController@update');
Route::get('/Spa/removeSpaCategory/{spa_id_category}', 'Spa\SpaCategoryController@remove');
Route::get('/Spa/SearchSpaCategory','Spa\SpaCategoryController@search');
//บริการสปาเดี่ยว
Route::get('/Spa/SpaDashboard','Spa\SpaController@index');
Route::get('/Spa/createSpa','Spa\SpaController@create');
Route::post('/Spa/createSpa','Spa\SpaController@insert');
Route::get('/Spa/editSpa/{spa_id}', 'Spa\SpaController@edit');
Route::post('/Spa/editSpa/{spa_id}', 'Spa\SpaController@update');
Route::get('/Spa/removeSpa/{spa_id}', 'Spa\SpaController@remove');
Route::get('/Spa/SearchSpa','Spa\SpaController@search');
//ห้องสปา
Route::get('/Room/RoomDashboard','Room\RoomController@index');
Route::get('/Room/createRoom', 'Room\RoomController@create');
Route::post('/Room/createRoom', 'Room\RoomController@insert');
Route::get('/Room/editRoom/{room_id}', 'Room\RoomController@edit');
Route::post('/Room/updateRoom/{room_id}', 'Room\RoomController@update');
Route::get('/Room/removeRoom/{room_id}', 'Room\RoomController@remove');
//ตำแหน่งพนักงาน
Route::get('/User/createEmployeePosition','User\EmployeePositionController@index');
Route::post('/User/createEmployeePosition', 'User\EmployeePositionController@create');
Route::get('/User/editEmployeePosition/{emp_position_id}', 'User\EmployeePositionController@edit');
Route::post('/User/updateEmployeePosition/{emp_position_id}', 'User\EmployeePositionController@update');
Route::get('/User/removeEmployeePosition/{emp_position_id}', 'User\EmployeePositionController@remove');
//พนักงาน
Route::get('/User/EmployeeDashboard','User\EmployeeController@index');
Route::get('/User/createEmployee','User\EmployeeController@create');
Route::post('/User/createEmployee','User\EmployeeController@insert');
Route::get('/User/editEmployee/{emp_id}','User\EmployeeController@edit');
Route::post('/User/updateEmployee/{emp_id}','User\EmployeeController@update');
Route::get('/User/removeEmployee/{emp_id}','User\EmployeeController@remove');
Route::get('/User/searchEmployee','User\EmployeeController@search');
//ผลิตภัณฑ์
Route::get('/Product/ProductDashboard','Product\ProductController@index');
Route::get('/Product/createProduct','Product\ProductController@create');
Route::post('/Product/createProduct','Product\ProductController@insert');
Route::get('/Product/editProduct/{pro_id}','Product\ProductController@edit');
Route::post('/Product/updateProduct/{pro_id}','Product\ProductController@update');
Route::get('/Product/removeProduct/{pro_id}','Product\ProductController@remove');
Route::get('/Product/searchProduct','Product\ProductController@search');
//dynamic dropdown พนักงาน
Route::post('/User/createEmployee/fetch_amphur','User\EmployeeController@fetch_amphur')->name('EmployeeForm.fetch_amphur');
Route::post('/User/createEmployee/fetch_district','User\EmployeeController@fetch_district')->name('EmployeeForm.fetch_district');
Route::post('/User/createEmployee/fetch_postcode','User\EmployeeController@fetch_postcode')->name('EmployeeForm.fetch_postcode');

