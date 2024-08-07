<?php

use App\Rest\Controllers\BecasController;
use App\Rest\Controllers\InstitutionsController;
use App\Rest\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('becas', BecasController::class);
    Route::resource('institutions', InstitutionsController::class);
    Route::resource('students', StudentsController::class);
});
