<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/contas', function () {
    return view('Contas.index');
})->name('contas.index');


Route::get('/categorias', function () {
    return view('Categorias.index');
})->name('categorias.index');


Route::get('/parcelas', function () {
    return view('Parcelas.index');
})->name('parcelas.index');


Route::get('/notificacoes', function () {
    return view('Notificacoes.index');
})->name('notificacoes.index');


Route::get('/anexos', function () {
    return view('Anexos.index');
})->name('anexos.index');

require __DIR__.'/auth.php';