<?php

use App\Http\Controllers\TeachingAssistants\DashboardController;
use App\Http\Controllers\TeachingAssistants\LoginController;
use App\Http\Controllers\TeachingAssistants\StudentTeamController;
use App\Http\Controllers\TeachingAssistants\TeamRequestController;
use Illuminate\Support\Facades\Route;

Route::name('teachingAssistant.')->prefix('teachingAssistant')->group(function () {
    Route::get('index', [LoginController::class, 'index'])->name('index');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::name('teachingAssistant.')->prefix('teachingAssistant')->middleware('checkTeaching')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('logout', [DashboardController::class, 'logout'])->name('logout');
});

Route::name('TeachingAssistants.')->prefix('TeachingAssistants')->middleware('checkTeaching')->group(function () {
    Route::get('/student/teams', [StudentTeamController::class, 'index'])->name('student.team.index');
    Route::get('/student/approved/{id}', [StudentTeamController::class, 'approved'])->name('student.team.approved');

});

Route::name('TeachingAssistants.')->prefix('TeachingAssistants')->middleware('checkTeaching')->group(function () {
    Route::get('/teams/requests', [TeamRequestController::class, 'index'])->name('team.request.index');
    Route::get('/teams/requests/project/{id}', [TeamRequestController::class, 'project'])->name('team.request.project');
    Route::post('/teams/requests/project/store/{id}', [TeamRequestController::class, 'project_store'])->name('team.request.project.store');
    Route::get('/teams/requests/project/delete/{id}', [TeamRequestController::class, 'project_delete'])->name('team.request.project.delete');
    Route::get('/teams/requests/delete/{id}', [TeamRequestController::class, 'delete'])->name('team.request.delete');
});
