<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    route::get('/login', 'Admin\AuthController@index')->name('login');
    route::post('/login', 'Admin\AuthController@login');
    route::get('/register', 'Admin\AuthController@register')->name('register');
    route::post('/register', 'Admin\AuthController@register_pro');
});

Route::prefix('/')->group(function () {
    Route::get('/', 'Admin\AuthController@index')->name('login');
    Route::post('/', 'Admin\AuthController@actionlogin');
    Route::get('/register', 'Admin\AuthController@register')->name('register');
    Route::post('/register', 'Admin\AuthController@register_pro');
});

Route::middleware(['auth'])->group(function () {

    Route::prefix('dashboard')->group(function () {
        Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
    });

    Route::prefix('daerah')->group(function () {
        Route::get('/', 'Admin\DaerahController@index')->name('daerah');
        Route::post('/', 'Admin\DaerahController@store');
        Route::post('/update/{d:id}', 'Admin\DaerahController@update');
        Route::get('/delete/{d:id}', 'Admin\DaerahController@delete');
    });

    Route::prefix('datakim')->group(function () {
        Route::get('/', 'Admin\DatakimController@index')->name('datakim');
        Route::post('/', 'Admin\DatakimController@store');
        Route::post('/update/{d:id}', 'Admin\DatakimController@update');
        Route::get('/delete/{d:id}', 'Admin\DatakimController@delete');
    });

    Route::prefix('anggota')->group(function () {
        Route::get('/', 'Admin\AnggotaController@index')->name('anggota');
        Route::post('/', 'Admin\AnggotaController@store');
        Route::post('/update/{d:id}', 'Admin\AnggotaController@update');
        Route::get('/delete/{d:id}', 'Admin\AnggotaController@delete');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', 'Admin\UserController@index')->name('user');
        Route::post('/', 'Admin\UserController@store');
        Route::post('/update/{d:id}', 'Admin\UserController@update');
        Route::get('/delete/{d:id}', 'Admin\UserController@delete');
    });

    Route::prefix('berita')->group(function () {
        Route::get('/', 'Admin\BeritaController@index')->name('berita');
        Route::post('/', 'Admin\BeritaController@store');
        Route::post('/update/{d:id}', 'Admin\BeritaController@update');
        Route::get('/delete/{d:id}', 'Admin\BeritaController@delete');
    });

    Route::prefix('gambar')->group(function () {
        Route::get('/', 'Admin\GambarController@index')->name('gambar');
        Route::post('/', 'Admin\GambarController@store');
        Route::post('/update/{d:id}', 'Admin\GambarController@update');
        Route::get('/delete/{d:id}', 'Admin\GambarController@delete');
    });


    Route::get('/logout', 'Admin\AuthController@logout')->name('logout');
});

Route::prefix('public')->group(function () {
    Route::get('/', 'Publik\PublikController@index')->name('public');
    Route::post('/', 'Publik\PublikController@store');
});

Route::prefix('berita')->group(function () {
    Route::get('/', 'BeritaController@index')->name('berita');
});

Route::prefix('dokumentasi')->group(function () {
    Route::get('/', 'DokumentasiController@index')->name('dokumentasi');
});
