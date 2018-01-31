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

Route::get('/', 'StoreController@index')->name('main');

Route::post('/store', 'StoreController@store')->name('store');

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\StoreController@index')->middleware(['auth', 'admin'])->name('admin');
    Route::get('/{loc?}', 'Admin\StoreController@storeByLocation')->middleware(['auth', 'admin'])->name('admin.store');
    Route::get('/{loc?}/add', 'Admin\StoreController@addPlaceForm')->middleware(['auth', 'admin'])->name('admin.add');
    Route::post('/{loc?}/add', 'Admin\StoreController@addPlace')->middleware(['auth', 'admin'])->name('admin.add');
});
