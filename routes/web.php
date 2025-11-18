<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//landing page
Route::get('/', 'App\Http\Controllers\LandingController@index')->name('landing.index');



//auth
Route::group(['prefix' => 'auth', 'namespace' => 'App\Http\Controllers\Auth'], function () {
    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/login-actiion', 'AuthController@login_action')->name('login_action');
    Route::get('/regis', 'AuthController@regis')->name('regis');
    Route::post('/regisStore', 'AuthController@regisStore')->name('regisStore');
    // /regisStore
    Route::get('/logout', function () {
        Session::flush();
        return redirect()->route('login');
    })->name('logout');
});
Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'ValidasiUser'], function () {

    Route::redirect('/', 'dashboard/admin');

    // Dashboard
    Route::prefix('dashboard')->group(function () {

        Route::get('/general', 'DashboardController@index')->name('dashboard');
        Route::get('/admin', 'UserController@index')->name('admin');

        Route::prefix('laporan')->group(function () {
            Route::get('/owner', 'laporanController@owner')->name('laporan.owner');
            Route::get('/admin', 'laporanController@admin')->name('laporan.admin');
            Route::get('/penjual', 'laporanController@penjual')->name('laporan.penjual');
            Route::get('/member', 'laporanController@member')->name('laporan.member');
        });

        Route::prefix('user')->group(function () {
            Route::get('/', 'UserController@index')->name('user.index');
            Route::get('/create', 'UserController@create')->name('user.create');
            Route::post('/store', 'UserController@store')->name('user.store');
            Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
            Route::put('/update', 'UserController@update')->name('user.update');
            Route::post('/hapus/{id}', 'UserController@hapus')->name('user.hapus');
            Route::get('/tambah', 'UserController@viewBaru')->name('user.tambah');
            // /
        });
        Route::prefix('warga')->group(function () {
            Route::get('/', 'wargaController@index')->name('warga.index');
            Route::get('/create', 'wargaController@create')->name('warga.create');
            Route::post('/store', 'wargaController@store')->name('warga.store');
            Route::get('/edit/{id}', 'wargaController@edit')->name('warga.edit');
            Route::put('/update', 'wargaController@update')->name('warga.update');
            Route::post('/hapus/{id}', 'wargaController@hapus')->name('warga.hapus');
            Route::get('/tambah', 'wargaController@viewBaru')->name('warga.tambah');
            Route::get('/obserwarga/{id}', 'obserController@indexna')->name('warga.observasi');
            // /
        });

        Route::prefix('disabilitas')->group(function () {
            Route::get('/', 'disabilitasController@index')->name('disabilitas.index');
            Route::get('/create', 'disabilitasController@create')->name('disabilitas.create');
            Route::post('/store', 'disabilitasController@store')->name('disabilitas.store');
            Route::get('/edit/{id}', 'disabilitasController@edit')->name('disabilitas.edit');
            Route::put('/update', 'disabilitasController@update')->name('disabilitas.update');
            Route::post('/hapus/{id}', 'disabilitasController@hapus')->name('disabilitas.hapus');
            Route::get('/tambah', 'disabilitasController@viewBaru')->name('disabilitas.tambah');
            // /
        });

        Route::prefix('obser')->group(function () {
            Route::get('/', 'obserController@index')->name('obser.index');
            Route::get('/create', 'obserController@create')->name('obser.create');
            Route::post('/store/{id}', 'obserController@store')->name('obser.store');
            Route::get('/edit/{id}/{id2}', 'obserController@edit')->name('obser.edit');
            Route::put('/update', 'obserController@update')->name('obser.update');
            Route::post('/hapus/{id}', 'obserController@hapus')->name('obser.hapus');
            Route::get('/tambah/{id}', 'obserController@viewBaru')->name('obser.tambah');
            // /
        });

        Route::prefix('kodepos')->group(function () {
            Route::get('/', 'kodeposController@index')->name('kodepos.index');
        });
        Route::prefix('uji')->group(function () {
            Route::get('/', 'sawMethodController@index')->name('uji.index');
            Route::get('/create', 'sawMethodController@create')->name('uji.create');
            // /
        });
        // Blank
        Route::get('blank', function () {
            return view('pages.blank.layout-blank', ['menu' => 'blank']);
        })->name('blank');
    });
});
