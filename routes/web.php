<?php

use App\Http\Controllers\ColleaguesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeamController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/colleagues', [ColleaguesController::class, 'index'])->name('colleagues.index');

    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');


    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');


    Route::get('/calendar', [ProjectController::class, 'index'])->name('calendar.index');


    Route::get('/calls', [ProjectController::class, 'index'])->name('calls.index');


    Route::get('/settings', [ProjectController::class, 'index'])->name('settings.index');


    Route::get('/tasks', [ProjectController::class, 'index'])->name('tasks.index');


    Route::get('/files', [ProjectController::class, 'index'])->name('files.index');


    Route::get('/signboard', [ProjectController::class, 'index'])->name('signboard.index');


    Route::get('/stats', [ProjectController::class, 'index'])->name('stats.index');





});
