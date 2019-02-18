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
    return view('welcome');
});

Auth::routes();
Route::get('/contohrouter','ContohController@contoh');
Route::get('/api/jenis','ContohController@jenis')->name('api.jenis');
Route::post('/api/tambahPeminjaman','HomeController@tambahPeminjaman');
Route::get('/api/inventaris','HomeController@getAllInventaris')->name('api.inventaris');
Route::get('/api/peminjamanuser','HomeController@getAllPeminjamanUser')->name('api.peminjamanuser');
Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('/home')->group(function(){
    Route::get('{path}','HomeController@index')->where('path','([A-z\d-\/_.]+)?');
});
Route::prefix('/operator')->group(function(){

    Route::get('/login','Auth\OperatorLoginController@showLoginForm')->name('operator.login');
    Route::post('/login','Auth\OperatorLoginController@login')->name('operator.login.submit');
    Route::get('/','OperatorController@index')->name('operator.dashboard');
    Route::get('/logout','Auth\OperatorLoginController@adminLogout')->name('operator.logout');

   


});
Route::get('/hapusadmin','hapusAdminController@hapusAdmin');
Route::prefix('/admin')->group(function(){

    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/loginsubmit','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/','AdminController@index')->name('admin.dashboard');
    Route::get('/logout','Auth\AdminLoginController@adminLogout')->name('admin.logout');
 
    Route::get('/inventarisir','Admin\InventarisController@index')->name('admin.inventarisir.index');
    

});
