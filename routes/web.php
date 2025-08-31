<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;

// Dashboard (index page)
Route::get('/', function () {
    return view('dashboard.index');
})->name('home');

// Programs CRUD
Route::resource('programs', ProgramController::class);

// Extra route for listing projects under a program (stub for now)
//Route::get('programs/{id}/projects', [ProgramController::class, 'projects'])->name('programs.projects');
