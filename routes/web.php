<?php

//http://127.0.0.1:8000/dashboard_admin
//http://127.0.0.1:8000/analisacpi


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontendController;

Route::get('/detailrk/{id}', 'App\Http\Controllers\DashboardController@detailrk')->name('detail.detailrk');

Route::get('/', function () {
    return view('layouts.master');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/daftar', function () {
    return view('daftar');
});

Route::get('/cpanel', function () {
    return view('v_login');
});

Route::get('/tentang', [FrontendController::class, 'tentang']);
Route::get('/kontak', [FrontendController::class, 'kontak']);
Route::get('/hasil', [FrontendController::class, 'hasil']);
Route::get('/register', [DaftarController::class, 'index']);

Route::get('/fpenilaian', 'App\Http\Controllers\DashboardController@fpenilaian')->name('frontend.fpenilaian');
Route::get('/flokasi', 'App\Http\Controllers\FrontendController@flokasi')->name('flokasi');
Route::get('/fhasil', 'App\Http\Controllers\HasilController@fhasil')->name('fhasil');
Route::get('/lokasi', 'App\Http\Controllers\DashboardController@plokasi')->name('lokasi');

Route::post('/cari1', 'App\Http\Controllers\DashboardController@cari1')->name('cari1');
Route::post('/cari2', 'App\Http\Controllers\DashboardController@cari2')->name('cari2');

Route::get('/register', 'App\Http\Controllers\DaftarController@index')->name('register');
Route::post('/register/submit', 'App\Http\Controllers\DaftarController@register');
Route::post('/login/submit', 'App\Http\Controllers\LoginController@Loginuser');
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@dashboard_user');
Route::get('plogout', 'App\Http\Controllers\LoginController@plogout');

Route::get('/profile', 'App\Http\Controllers\ProfileController@edit')
    ->name('profile.edit');

Route::patch('profile', 'App\Http\Controllers\ProfileController@update')
    ->name('profile.update');

//http://127.0.0.1:8000/detail/proses
Route::post('/detail/fproses', 'App\Http\Controllers\DetailController@fadd')->name('detail.fadd');

Route::post('/detail/proses', 'App\Http\Controllers\DetailController@add')->name('detail.add');
Route::get('/analisacpi', 'App\Http\Controllers\DetailController@analisacpi')->name('detail.proses');
Route::get('/fanalisacpi', 'App\Http\Controllers\DetailController@fanalisacpi')->name('detail.fproses');
Route::get('/analisacpihapus', 'App\Http\Controllers\DetailController@analisacpihapus')->name('details.analisacpihapus');


Route::post('/cpanel/submit', 'App\Http\Controllers\LoginController@LoginAdmin');
Route::get('/dashboard_admin', 'App\Http\Controllers\DashboardController@dashboard_Admin');
Route::get('logout', 'App\Http\Controllers\LoginController@logout');

Route::get('/admins', 'App\Http\Controllers\AdminController@index');
Route::get('/admin/add', 'App\Http\Controllers\AdminController@getAdd');

Route::post('/admin', 'App\Http\Controllers\AdminController@postAdd')->name('admin.postAdd');
Route::post('/admin/update/{id}', 'App\Http\Controllers\AdminController@postUpdate');
Route::get('/admin/delete/{id}', 'App\Http\Controllers\AdminController@delete');

Route::resource('/lokasis', 'App\Http\Controllers\LokasiController');
Route::resource('/users', 'App\Http\Controllers\userController');
Route::resource('/penilaians', 'App\Http\Controllers\PenilaianController');
Route::resource('/hasils', 'App\Http\Controllers\HasilController');
Route::resource('/details', 'App\Http\Controllers\DetailController');

Route::get('/details/{id}', 'App\Http\Controllers\DetailController@index');
Route::get('/detail/{id}', 'App\Http\Controllers\DetailController@getDetail');