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
Route::get('/eventos/criar', [EventController::class, 'criar'] ) ;

Route::get('/contato',function(){
    return view('contato');
});

Route::get('/produtos/{id}',function($id = null){
    $buscar = request('search');
    return view('produtos', ['id'=>$id, 'buscar'=> $buscar]);
});

Route::get('/produto',function(){

    $busca = request('search');

    return view('produto', ['busca'=>$busca]);

});