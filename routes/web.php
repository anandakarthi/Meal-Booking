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

Route::get('/login', function () {
    return view('auth');
});
Route::get('/', function () {
    return view('auth/login');
});
Route::get('/logout', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/create_order', 'MenuController@order')->name('menus.order');
Route::get('/dashboard', 'DashboardController@index');
// Route::get('/profile', 'ProfileController@index');
// Route::get('/menus_item', 'MenuController@index');
// // Route::get('/create_order', 'MenuController@order');
// Route::get('/create_order', 'MenuController@order')->name('menus.order');
// Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
// Route::resource('user-management', 'UserManagementController');
// Route::resource('employee-management', 'EmployeeManagementController');
// Route::post('employee-management/search', 'EmployeeManagementController@search')->name('employee-management.search');
// Route::resource('system-management/department', 'DepartmentController');
// Route::post('system-management/department/search', 'DepartmentController@search')->name('department.search');
// Route::resource('system-management/division', 'DivisionController');
// Route::post('system-management/division/search', 'DivisionController@search')->name('division.search');
// Route::resource('system-management/country', 'CountryController');
// Route::post('system-management/country/search', 'CountryController@search')->name('country.search');
// Route::resource('system-management/state', 'StateController');
// Route::post('system-management/state/search', 'StateController@search')->name('state.search');
// Route::resource('system-management/city', 'CityController');
// Route::post('system-management/city/search', 'CityController@search')->name('city.search');
// Route::get('system-management/report', 'ReportController@index');
// Route::post('system-management/report/search', 'ReportController@search')->name('report.search');
// Route::post('system-management/report/excel', 'ReportController@exportExcel')->name('report.excel');
// Route::post('system-management/report/pdf', 'ReportController@exportPDF')->name('report.pdf');
// Route::get('avatars/{name}', 'EmployeeManagementController@load');

Auth::routes();

Route::get('/logout', 'HomeController@logout')->name('logout');
Route::get('/autocomplete', 'HomeController@autocomplete')->name('autocomplete');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/empolyee_details', 'HomeController@empolyee_details')->name('empolyee_details');
Route::get('/meal_booking/{id}/{auth_id}', 'HomeController@meal_booking')->name('meal_booking');
Route::get('/meal_booking_delete/{id}/{auth_id}', 'HomeController@meal_booking_delete')->name('meal_booking_delete');
