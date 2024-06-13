<?php

use App\Http\Controllers\TeachingAssistants\DashboardController;
use App\Http\Controllers\TeachingAssistants\LoginController;
use App\Http\Controllers\TeachingAssistants\StudentTeamController;
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
    Route::get('/student/project/{id}', [StudentTeamController::class, 'project'])->name('student.team.project');
    Route::get('/student/delete/{id}', [StudentTeamController::class, 'delete'])->name('student.team.delete');

});
