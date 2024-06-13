<?php

use App\Http\Controllers\Supervisor\ApplyController;
use App\Http\Controllers\Supervisor\DashboardController;
use App\Http\Controllers\Supervisor\LoginController;
use App\Http\Controllers\Supervisor\ProjectController;
use App\Http\Controllers\Supervisor\ProjectRequestController;
use App\Http\Controllers\Supervisor\TeahingAsistantController;
use App\Http\Controllers\Supervisor\TeamController;
use Illuminate\Support\Facades\Route;

Route::name('supervisor.')->prefix('supervisor')->group(function(){
    Route::get('index',[LoginController::class,'index'])->name('index');
    Route::post('login',[LoginController::class,'login'])->name('login');
});

Route::name('supervisor.')->prefix('supervisor')->middleware('checkSupervisor')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('logout', [DashboardController::class, 'logout'])->name('logout');
});

Route::name('supervisor.')->prefix('supervisor')->middleware('checkSupervisor')->group(function () {
    Route::get('/TeachingAssistants', [TeahingAsistantController::class, 'index'])->name('TeachingAssistants.index');
});

Route::name('supervisor.')->prefix('supervisor')->middleware('checkSupervisor')->group(function () {
    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams/store', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/edit/{id}', [TeamController::class, 'edit'])->name('teams.edit');
    Route::post('/teams/update/{id}', [TeamController::class, 'update'])->name('teams.update');
    Route::get('/teams/delete/{id}', [TeamController::class, 'delete'])->name('teams.delete');
});

Route::name('supervisor.')->prefix('supervisor')->middleware('checkSupervisor')->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
    Route::post('/projects/change_status', [ProjectController::class, 'change_status'])->name('projects.change_status');
    Route::get('/projects/edit/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('/projects/update/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::get('/projects/delete/{id}', [ProjectController::class, 'delete'])->name('projects.delete');
});

Route::name('supervisor.')->prefix('supervisor')->middleware('checkSupervisor')->group(function () {
    Route::get('/applys', [ApplyController::class, 'index'])->name('applys.index');
    Route::get('/applys/fetch', [ApplyController::class, 'fetch'])->name('applys.fetch');
    Route::get('/applys/show/{id}', [ApplyController::class, 'show'])->name('applys.show');
    Route::post('/applys/change_status/{id}', [ApplyController::class, 'change_status'])->name('applys.change_status');
});


Route::name('supervisor.')->prefix('supervisor')->middleware('checkSupervisor')->group(function () {
    Route::get('/projects/requests', [ProjectRequestController::class, 'index'])->name('projects.requests.index');
    Route::get('/projects/requests/create', [ProjectRequestController::class, 'create'])->name('projects.requests.create');
    Route::get('/projects/requests/ajax/{id}', [ProjectRequestController::class, 'ajax'])->name('projects.requests.ajax');
    Route::post('/projects/requests/store', [ProjectRequestController::class, 'store'])->name('projects.requests.store');
    Route::get('/projects/requests/approved/{id}', [ProjectRequestController::class, 'approved'])->name('projects.requests.approved');
});
