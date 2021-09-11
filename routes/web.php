<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\ContentController;

use App\Http\Controllers\FoodbankController;

use App\Http\Controllers\CompanyController;

use App\Http\Controllers\SettingsController;
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


Route::get('getusersnow', [UserController::class, 'anyData'])->name('get.users');

Route::get('/get-user-info/{id}', [UserController::class, 'userinfo']);

Route::get('/create_user', [UserController::class, 'createuser'])->name('user.creates');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [UserController::class, 'viewroles'])->name('user.roles');

    Route::post('/users_update', [UserController::class, 'user_update'])->name('user.update');

    Route::post('/store-users', [UserController::class, 'user_store'])->name('store.users');   

    Route::post('/roles_store', [UserController::class, 'roles_store'])->name('roles.store');

	Route::get('/user_destroy/{id}', [UserController::class, 'user_destroy'])->name('user.destroy');

	Route::get('/roles_destroy/{id}', [UserController::class, 'destroy'])->name('roles.destroy');

	Route::post('/permissions_store', [UserController::class, 'permissions_store'])->name('permissions.store');


  
#Cash Disbursement Routes Begins Here

Route::get('company-new',[CompanyController::class,'create']);

Route::post('store_company',[CompanyController::class,'store'])->name('store-company');

Route::get('get-cashdis',[CompanyController::class,'cashdis'])->name('ngo.index');;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('new-foodbank',[FoodbankController::class,'index']);

Route::get('view-foodbank',[FoodbankController::class,'foodbank'])->name('foodbank.index');;;

Route::post('store-foodbank',[FoodbankController::class,'store']);

Route::get('drop-foodbank/{id}',[FoodbankController::class,'drop_food_bank']);

Route::post('get-foodbank/{id}',[FoodbankController::class,'get_food_bank']);




#Setting Routes Begins Here

Route::get('dropdown-settings',[SettingsController::class,'dropdownsettings']);

Route::post('store-dropdowns',[SettingsController::class,'storedropdowns']);

Route::get('delete-dropdown/{id}',[SettingsController::class,'drop_delete']);

Route::get('getdropdowns', [SettingsController::class, 'dropdownsindex'])->name('dropdowns.index');


Route::get('get-column/{id}',[SettingsController::class,'getcolumns']);




Route::get('news-upload',[ContentController::class,'news']);
Route::get('news-view/{id}',[ContentController::class,'view']);
Route::get('news-drop/{id}',[ContentController::class,'drop']);
Route::get('news-content',[ContentController::class,'content'])->name('ekecontent.index');;
Route::post('store-news',[ContentController::class,'store']);