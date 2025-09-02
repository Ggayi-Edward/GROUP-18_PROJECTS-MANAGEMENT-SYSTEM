<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\FacilityController;

// Dashboard (index page)
Route::get('/', function () {
    return view('dashboard.index');
})->name('home');

// Programs CRUD
Route::resource('programs', ProgramController::class);

// Facilities CRUD
Route::resource('facilities', FacilityController::class);

// Services CRUD
Route::resource('services', ServiceController::class);

// Projects CRUD
Route::resource('projects', ProjectController::class);


// Routes for managing Participants (Create, Read, Update, Delete)
Route::resource('participants', ParticipantController::class);