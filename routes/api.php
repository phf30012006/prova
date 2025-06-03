<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ReviewController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(LivroController::class)->group(function () {
    Route::get('/livros/completo', 'getWithAutorGeneroReviews');
    Route::get('/livros', 'get');
    Route::get('/livros/{id}', 'details');
    Route::post('/livros','store');
    Route::put('/livros/{id}', 'update');
    Route::delete('/livros/{id}', 'delete');
    Route::get('/livros/{id}/reviews','getReviews');
});

Route::controller(AutorController::class)->group(function () {
    Route::get('/autores/com-livros', 'getAutoresComLivros');
    Route::get('/autores', 'get');
    Route::get('/autores/{id}', 'details');
    Route::post('/autores', 'store');
    Route::put('/autores/{id}', 'update');
    Route::delete('/autores/{id}', 'delete');
    Route::get('/autores/{id}/livros', 'getLivrosPorAutor');
});

Route::controller(GeneroController::class)->group(function () {
    Route::get('/generos/com-livros', 'getGenerosComLivros');
    Route::get('/generos', 'get');
    Route::get('/generos/{id}', 'details');
    Route::post('/generos', 'store');
    Route::put('/generos/{id}', 'update');
    Route::delete('/generos/{id}', 'delete');
    Route::get('/generos/{id}/livros', 'getLivrosPorGenero');
});

Route::controller(UsuarioController::class)->group(function () {
    Route::get('/usuarios', 'get');
    Route::get('/usuarios/{id}', 'details');
    Route::post('/usuarios', 'store');
    Route::put('/usuarios/{id}', 'update');
    Route::delete('/usuarios/{id}', 'delete');
    Route::get('/usuarios/{id}/reviews', 'getReviewsPorUsuario');
});

Route::controller(ReviewController::class)->group(function () {
    Route::get('/reviews', 'get');
    Route::get('/reviews/{id}', 'details');
    Route::post('/reviews', 'store');
    Route::put('/reviews/{id}', 'update');
    Route::delete('/reviews/{id}', 'delete');
});