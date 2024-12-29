<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FilmController;


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
    return view('home');
});
Route::get('/data-table', function(){
    return view('plugin.datatable');
});
Route::get('/table', function(){
    return view('plugin.table');
});
Route::get('/review',[ReviewController::class,'index']);

Route::get('/cast',[CastController::class,'index']);
Route::get('/register',[AuthController::class,"register"]);
Route::post('/welcome',[AuthController::class,'welcome']);
Route::get('/genre',[GenreController::class,'index']);
Route::get('/genre/{genre_id}',[GenreController::class,'show']);
Route::get('/film',[FilmController::class,'index']);
Route::get('/film/{film_id}',[FilmController::class,'show']);
Route::middleware('auth')->group(function () {
    Route::get('/home', function(){
        return view('home');
    });
    Route::get('/cast/create',[CastController::class,'create']);
    Route::post('/cast',[CastController::class,'store']);
    Route::get('/cast/{cast_id}',[CastController::class,'show']);
    Route::get('/cast/{cast_id}/edit',[CastController::class,'edit']);
    Route::put('/cast/{cast_id}',[CastController::class,'update']);
    Route::delete( '/cast/{cast_id}',[CastController::class,'destroy']);
    Route::post('/review/{film_id}',[ReviewController::class,'store']);
    Route::resource('genre',GenreController::class)->except(['index','show']);
    Route::resource('film',FilmController::class)->except(['index','show']);
});
Auth::routes();

// Route::get('/home', action: [App\Http\Controllers\HomeController::class, 'index'])->name('home');
