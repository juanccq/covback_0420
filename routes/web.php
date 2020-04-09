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

Route::get('/', function () {
//    return view('welcome');
    return redirect()->route('login');
});
// Authentication Routes...
//$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
//$this->post('login', 'Auth\LoginController@login')->name('auth.login');
//$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');
//Route::group(['as' => 'auth.'], function() {
//});
    
    Auth::routes();
    Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('change_password');
    Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('change_password');
// Change Password Routes...

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::impersonate();
    
    Route::get('/', 'Admin\HomeController@index')->name('dashboard');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::resource('roles', 'Admin\RolesController');
    Route::resource('users', 'Admin\UsersController');
    Route::resource('clients', 'Admin\ClientController');
    
    Route::resource('invoices', 'Admin\InvoiceController');
    Route::get('invoices/{invoice}/pdf', 'Admin\InvoiceController@pdf')->name('invoices.pdf');
    Route::get('invoices/{invoice}/generate', 'Admin\InvoiceController@generate')->name('invoices.generate');    
    Route::get('invoices/{invoice}/invalidate', 'Admin\InvoiceController@invalidate')->name('invoices.invalidate');    
    Route::get('facilito', 'Admin\InvoiceController@facilito')->name('invoices.facilito');    
    Route::post('facilito', 'Admin\InvoiceController@facilito')->name('invoices.facilito-post');
    
    Route::get('test-control', 'Admin\InvoiceController@testControl')->name('test-control');
    Route::post('test-control', 'Admin\InvoiceController@testControl')->name('test-control-post');
    
    //Route::get('settings', 'Admin\SettingController@main')->name('settings');
    //Route::post('settings', 'Admin\SettingController@main')->name('settings-post');
    Route::resource('settings', 'Admin\SettingController');
});
