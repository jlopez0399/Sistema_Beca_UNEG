<?php

use App\Rest\Controllers\BecasController;
use App\Rest\Controllers\CampusesController;
use App\Rest\Controllers\Caree_campusesController;
use App\Rest\Controllers\CareersController;
use App\Rest\Controllers\InstitutionsController;
use App\Rest\Controllers\Stu_becasController;
use App\Rest\Controllers\Stu_campusesController;
use App\Rest\Controllers\Stu_careersController;
use App\Rest\Controllers\StudentsController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \Lomkit\Rest\Facades\Rest;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Rest::resource('institutions', InstitutionsController::class);
Rest::resource('students', StudentsController::class);
Rest::resource('stu_careers', Stu_careersController::class);
Rest::resource('careers', CareersController::class);
Rest::resource('becas', BecasController::class);
Rest::resource('campuses', CampusesController::class);
Rest::resource('stu_becas', Stu_becasController::class);
Rest::resource('stu_campuses', Stu_campusesController::class);
Rest::resource('caree_campuses', Caree_campusesController::class);
