<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

// Маршрут для відображення списку контактів
Route::get('/contacts', [ContactController::class, 'index']);

// Маршрут для створення нового контакту
Route::post('/contacts', [ContactController::class, 'store']);

// Домашня сторінка
Route::get('/', function () {
    return view('welcome');
});

