<?php

use App\Http\Controllers\ApiController;


use Illuminate\Support\Facades\Route;
Route::get('category',[ApiController::class,'showCat']);
Route::get('product',[ApiController::class,'showPro']);
Route::get('users',[ApiController::class,'showUser']);
Route::get('colors',[ApiController::class,'showcolor']);
