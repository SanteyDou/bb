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
Route::post('/', 'StoreController@store');

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\StoreController@index')->middleware(['auth', 'admin'])->name('admin');

    Route::get('/users', 'Admin\UserController@index')->middleware(['auth', 'admin'])->name('admin.users');
    Route::get('/user/add', 'Admin\UserController@addUserForm')->middleware(['auth', 'admin'])->name('admin.userAddForm');
    Route::post('/user/add', 'Admin\UserController@addUser')->middleware(['auth', 'admin'])->name('admin.userAdd');

    Route::get('/{loc?}', 'Admin\StoreController@storeByLocation')->middleware(['auth', 'admin'])->name('admin.store');
    Route::get('/{loc?}/add', 'Admin\StoreController@addPlaceForm')->middleware(['auth', 'admin'])->name('admin.addForm');
    Route::post('/{loc?}/add', 'Admin\StoreController@addPlace')->middleware(['auth', 'admin'])->name('admin.add');
    
});
