<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;

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

/**
 * Route::get    |consultar
 * Route::post   |guardar
 * Route::delete |eliminar
 * Route::put    |actualizar
 */

/*
1. Gestionando sin controller
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('blog/',function(){
    return 'estamos en blog';
})->name('blog');

Route::get('blog/{slug}',function($slug){
    return "Estamos enviando un slug: ".$slug;
})->name('post');

Route::get('buscar', function(Request $request){
    //Lista todo la petición
    return $request->all();
});

2. Forma para llamar un controllador con las rutas
Route::get('/', [PageController::class,'home'])->name('home');
Route::get('blog',[PageController::class,'blog'])->name('blog');
Route::get('blog/{slug}', [PageController::class, 'post'])->name('post');
*/

Route::controller(PageController::class)->group(function(){

    Route::get('/', 'home')->name('home');
    Route::get('blog','blog')->name('blog');
    Route::get('blog/{post:slug}','post')->name('post');

});