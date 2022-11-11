<?php

use Illuminate\Support\Facades\Route;

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


use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);
Route::get('/eventos/criar', [EventController::class, 'criar'])->middleware('auth');

Route::get('/eventos/cadastrar', [EventController::class, 'cadastrar']);

Route::get('/contato',function(){
    return view('contato');
});

Route::post('/eventos',[EventController::class,'store']);
Route::delete('/eventos/{id}',[EventController::class, 'destroy']);

Route::get('/eventos/{id}',[EventController::class, 'show']);

Route::get('/dashboard',[EventController::class, 'dashboard'])->middleware('auth');



