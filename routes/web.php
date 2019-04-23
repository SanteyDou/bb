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

<<<<<<< HEAD
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
=======
Route::get('/', 'StoreController@index')->name('main');
Route::post('/add', 'StoreController@store')->name('main.post');

Route::get('/ajaxRequestUser', 'Admin\UserController@ajaxRequest');
Route::get('/ajaxRequestByPlace', 'StoreController@ajaxRequestByPlace');
Route::get('/ajaxRequestByMatchcode', 'StoreController@ajaxRequestByMatchcode');
Route::get('/ajaxRequestSearch', 'StoreController@ajaxRequestSearch');


Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\StoreController@index')->middleware(['auth', 'admin'])->name('admin');

    Route::get('/users', 'Admin\UserController@index')->middleware(['auth', 'admin'])->name('admin.users');
    Route::get('/user/add', 'Admin\UserController@addUserForm')->middleware(['auth', 'admin'])->name('admin.userAddForm');
    Route::post('/user/add', 'Admin\UserController@addUser')->middleware(['auth', 'admin'])->name('admin.userAdd');
    Route::get('/user/edit/{personal_id}', 'Admin\UserController@editUserForm')->middleware(['auth', 'admin'])->name('admin.userEditForm');
    Route::post('/user/edit/{personal_id}', 'Admin\UserController@editUser')->middleware(['auth', 'admin'])->name('admin.userEdit');
    Route::get('/user/delete/{personal_id}', 'Admin\UserController@deleteUser')->middleware(['auth', 'admin'])->name('admin.userDelete');
    
    Route::get('/getcsv/{loc}', 'Admin\StoreController@getCSV')->middleware(['auth', 'admin'])->name('admin.store.getcsv');
    
    Route::get('/cat', 'Admin\CategoryController@index')->middleware(['auth', 'admin'])->name('admin.cat');
    Route::get('/cat/add', 'Admin\CategoryController@addCategoryForm')->middleware(['auth', 'admin'])->name('admin.catAddForm');
    Route::post('/cat/add', 'Admin\CategoryController@addCategory')->middleware(['auth', 'admin'])->name('admin.catAdd');
    Route::get('/cat/edit/{id}', 'Admin\CategoryController@editCategoryForm')->middleware(['auth', 'admin'])->name('admin.catEditForm');
    Route::post('/cat/edit/{id}', 'Admin\CategoryController@editCategory')->middleware(['auth', 'admin'])->name('admin.catEdit');

    Route::get('/{loc}', 'Admin\StoreController@storeByLocation')->middleware(['auth', 'admin'])->name('admin.store');
    Route::post('/{loc}', 'Admin\StoreController@storeSearch')->middleware(['auth', 'admin'])->name('admin.search');
    Route::get('/{loc}/add', 'Admin\StoreController@addPlaceForm')->middleware(['auth', 'admin'])->name('admin.addForm');
    Route::post('/{loc}/add', 'Admin\StoreController@addPlace')->middleware(['auth', 'admin'])->name('admin.add');
    Route::get('/{loc}/edit/{place}', 'Admin\StoreController@editPlaceForm')->middleware(['auth', 'admin'])->name('admin.editForm');
    Route::post('/{loc}/edit/{place}', 'Admin\StoreController@editPlace')->middleware(['auth', 'admin'])->name('admin.edit');

    Route::get('/{loc}/toorder', 'Admin\StoreController@toorder')->middleware(['auth', 'admin'])->name('admin.toorder');
    Route::get('/{loc}/toorder/getcsv', 'Admin\StoreController@toOrderGetCSV')->middleware(['auth', 'admin'])->name('admin.toorder.getcsv');
    Route::get('/{loc}/editorder/{place}', 'Admin\StoreController@editToOrderForm')->middleware(['auth', 'admin'])->name('admin.editOrderForm');
    Route::post('/{loc}/editorder/{place}', 'Admin\StoreController@editToOrder')->middleware(['auth', 'admin'])->name('admin.editOrder');
    Route::get('/{loc}/eraseordercomments/{place}', 'Admin\StoreController@eraseToOrderComment')->middleware(['auth', 'admin'])->name('admin.eraseOrderComment');

    Route::get('/{loc}/logs', 'Admin\LogController@logs')->middleware(['auth', 'admin'])->name('admin.logs');
    // Route::post('/{loc}/logs', 'Admin\LogController@logsSearch')->middleware(['auth', 'admin'])->name('admin.logsSearch');
    Route::get('/{loc}/logs/getcsv', 'Admin\LogController@getCSV')->middleware(['auth', 'admin'])->name('admin.logs.getCSV');
    
});
>>>>>>> v1.0
