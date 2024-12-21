<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastController;


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

Route::get('/', function(){
    return view('master');
});
Route::get('/data-table', function(){
    return view('plugin.datatable');
});
Route::get('/table', function(){
    return view('plugin.table');
});

Route::get('/register',[AuthController::class,"register"]);
Route::post('/welcome',[AuthController::class,'welcome']);
Route::get('/home', function(){
    return view('home');
});
Route::get('/cast',[CastController::class,'index']);
Route::get('/cast/create',[CastController::class,'create']);
Route::post('/cast',[CastController::class,'store']);
Route::get('/cast/{cast_id}',[CastController::class,'show']);
Route::get('/cast/{cast_id}/edit',[CastController::class,'edit']);
Route::put('/cast/{cast_id}',[CastController::class,'update']);
Route::delete('/cast/{cast_id}',[CastController::class,'destroy']);

