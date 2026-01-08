<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SwaggerTestController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/swagger-test', [SwaggerTestController::class, 'index']);

