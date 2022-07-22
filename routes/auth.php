<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
//use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    //se envía a una ruta , en caso no esté logueado
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

});

Route::middleware('auth')->group(function () { 
    //asegura las rutas, solo se accede si está autenticado. Sino, login.
    //cuando esté el usuario autenticado
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
    //Route::resource('posts', PostController::class)->except(['show']);
});
