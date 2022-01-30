<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WatchController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
Route::group(['middle'=>['LoginAuth']],function(){
Route::get('/admin/login',[AuthController::class,'getLogin']);
Route::post('/admin/login',[AuthController::class,'postLogin']);
Route::get('/admin/logout',[AuthController::class,'logout']);
});

Route::group(['prefix'=>'admin','middleware'=>['AdminAuth']],function(){
    Route::get('/',[AdminController::class,'home'])->name('home');
    Route::resource('category', CategoryController::class);
    Route::resource('product', WatchController::class);
    
});