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
Route::get('/api/inventaris','HomeController@getAllInventaris')->name('semua.api.inventaris');
Route::get('/api/inventaris/{search}','HomeController@getAllInventaris')->name('api.inventaris');
Route::get('/api/peminjamanuser','HomeController@getAllPeminjamanUser')->name('api.peminjamanuser');
Route::get('/api/operator/peminjamanuser/{search}','OperatorController@getAllPeminjamanUser')->name('operator.api.peminjamanuser');
Route::get('/api/operator/peminjamanuser','OperatorController@getAllPeminjamanUser')->name('semua.operator.api.peminjamanuser');
Route::get('/batalkanpeminjaman/{id_peminjaman}','HomeController@batalkanPeminjaman');
Route::get('/api/detailpinjam/{items}','HomeController@getDetailPeminjamanUser');
Route::get('/api/operator/detailpinjam/{items}','OperatorController@getDetailPeminjamanUser');
Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('/home')->group(function(){
    Route::get('/home/logout','Auth\LoginController@userLogout')->name('user.logout');
    Route::get('{path}','HomeController@index')->where('path','([A-z\d-\/_.]+)?');
    
});
Route::prefix('/operator')->group(function(){
    Route::get('/batalkanpeminjaman/{id_peminjaman}','OperatorController@batalkanPeminjaman');

    Route::get('/login','Auth\OperatorLoginController@showLoginForm')->name('operator.login');
    Route::post('/login','Auth\OperatorLoginController@login')->name('operator.login.submit');
    Route::get('/','OperatorController@index')->name('operator.dashboard');
    Route::get('/logout','Auth\OperatorLoginController@operatorLogout')->name('operator.logout');
    Route::get('/api/allpeminjam/{query}','OperatorController@listPeminjam');
    Route::get('/api/allpeminjam','OperatorController@listPeminjam');
    Route::get('/setujuipeminjaman/{id_peminjaman}','OperatorController@setujuipeminjaman');
    Route::post('/api/operator/kembalikanbarang','OperatorController@kembalikanBarang');
    Route::post('/api/tambahuser','OperatorController@tambahUser');
    Route::post('/api/edituser','OperatorController@editUser');
    Route::get('/api/getalluser/{search}','OperatorController@getAllUser');
    Route::get('/api/getalluser','OperatorController@getAllUser');
    Route::post('/api/kembalikanbarangsatuan','OperatorController@kembalikanBarangSatuan');
    Route::get('{path}','OperatorController@index')->where('path','([A-z\d-\/_.]+)?');

});
Route::get('/hapusadmin','hapusAdminController@hapusAdmin');
Route::prefix('/admin')->group(function(){

    Route::get('/jadikanlaporanpeminjaman/{bulan}/tahun/{tahun}','AdminController@generateLaporan');
    Route::get('/jadikanlaporanpeminjaman','AdminController@generateLaporan');
    Route::get('/generatelaporanview/{bulan}/tahun/{tahun}','AdminController@generateLaporanView');
    Route::get('/generatelaporanview','AdminController@generateLaporanView');


    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/loginsubmit','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/','AdminController@index')->name('admin.dashboard');
    Route::get('/logout','Auth\AdminLoginController@adminLogout')->name('admin.logout');
    Route::get('/api/getallinventaris','AdminController@getAllInventaris');
    Route::get('/api/getallinventaris/{search}','AdminController@getAllInventaris');
    Route::post('/api/tambahbarang','AdminController@tambahBarang');
    Route::post('/api/editbarang','AdminController@editBarang');

    //kelola ruang
    Route::get('/api/getallruang','AdminController@getAllRuang');
    Route::get('/api/getallruang/{search}','AdminController@getAllRuang');
    Route::post('/api/tambahruang','AdminController@tambahRuang');
    Route::post('/api/editruang','AdminController@editRuang');
    //kelola jenis

    Route::get('/api/getalljenis','AdminController@getAllJenis');
    Route::get('/api/getalljenis/{search}','AdminController@getAllJenis');
    Route::post('/api/tambahjenis','AdminController@tambahjenis');
    Route::post('/api/editjenis','AdminController@editjenis');

    //kelola operator
    Route::post('/api/tambahoperator','AdminController@tambahOperator');
    Route::post('/api/editoperator','AdminController@editOperator');
    Route::get('/api/getalloperator/{search}','OperatorController@getAllOperator');
    Route::get('/api/getalloperator','AdminController@getAllOperator');
    //Route::get('/inventarisir','Admin\InventarisController@index')->name('admin.inventarisir.index');
    Route::get('{path}','AdminController@index')->where('path','([A-z\d-\/_.]+)?');


});
