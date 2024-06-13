<?php

use App\Http\Controllers\Site\ApplyController;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ProjectController;
use App\Http\Controllers\Site\SkilController;
use App\Http\Controllers\Site\TaskController;
use App\Http\Controllers\Site\TeamController;
use Illuminate\Support\Facades\Route;

Route::name('site.')->prefix('site')->group(function(){
    Route::get('register',[AuthController::class,'register'])->name('register');
    Route::post('store',[AuthController::class,'store'])->name('store');
    Route::get('index',[AuthController::class,'index'])->name('index');
    Route::post('login',[AuthController::class,'login'])->name('login');
});

Route::name('site.')->prefix('site')->middleware('site')->group(function(){
    Route::get('home',[HomeController::class,'index'])->name('home');
    Route::get('profile',[HomeController::class,'profile'])->name('profile');
    Route::get('profile/restPassword',[HomeController::class,'restPassword'])->name('profile.restPassword');
    Route::post('profile/restPassword/change',[HomeController::class,'changePassword'])->name('profile.restPassword.change');
    Route::post('profile/uploadDoc',[HomeController::class,'uploadDoc'])->name('profile.uploadDoc');
    Route::get('profile/project/{id}',[HomeController::class,'project'])->name('profile.project');
    Route::get('logout',[HomeController::class,'logout'])->name('logout');
});


Route::name('site.')->prefix('site')->middleware('site')->group(function(){
    Route::get('applys',[ApplyController::class,'index'])->name('apply');
    Route::get('applys/create',[ApplyController::class,'create'])->name('apply.create');
    Route::post('applys/store',[ApplyController::class,'store'])->name('apply.store');
    Route::get('applys/teaching_assistants_ajax/{id}',[ApplyController::class,'teaching_assistants_ajax'])->name('apply.teaching_assistants_ajax');
    Route::get('applys/edit/{id}',[ApplyController::class,'edit'])->name('apply.edit');
    Route::post('applys/update/{id}',[ApplyController::class,'update'])->name('apply.update');
    Route::get('applys/delete/{id}',[ApplyController::class,'delete'])->name('apply.delete');
});


Route::name('site.')->prefix('site')->middleware('site')->group(function(){
    Route::get('teams',[TeamController::class,'index'])->name('team.index');
    Route::get('student/teams',[TeamController::class,'student_teme'])->name('student.team');
    Route::get('teams/join/{id}',[TeamController::class,'join'])->name('team.join');
    Route::get('teams/create',[TeamController::class,'create'])->name('team.create');
    Route::post('teams/store',[TeamController::class,'store'])->name('team.store');
});

Route::name('site.')->prefix('site')->middleware('site')->group(function(){
    Route::get('skils',[SkilController::class,'index'])->name('skils.index');
    Route::get('skils/create',[SkilController::class,'create'])->name('skils.create');
    Route::post('skils/store',[SkilController::class,'store'])->name('skils.store');
    Route::get('skils/edit/{id}',[SkilController::class,'edit'])->name('skils.edit');
    Route::post('skils/update/{id}',[SkilController::class,'update'])->name('skils.update');
    Route::get('skils/delete/{id}',[SkilController::class,'delete'])->name('skils.delete');

});

Route::name('site.')->prefix('site')->middleware('site')->group(function(){
    Route::get('tasks',[TaskController::class,'index'])->name('tasks.index');
    Route::get('tasks/create',[TaskController::class,'create'])->name('tasks.create');
    Route::post('tasks/store',[TaskController::class,'store'])->name('tasks.store');
    Route::get('tasks/download/{id}',[TaskController::class,'download'])->name('tasks.download');
    Route::get('tasks/edit/{id}',[TaskController::class,'edit'])->name('tasks.edit');
    Route::post('tasks/update/{id}',[TaskController::class,'update'])->name('tasks.update');
    Route::get('tasks/delete/{id}',[TaskController::class,'delete'])->name('tasks.delete');

});

Route::name('site.')->prefix('site')->middleware('site')->group(function(){
    Route::get('projects',[ProjectController::class,'index'])->name('projects.index');
    Route::get('projects/join/{id}',[ProjectController::class,'join'])->name('projects.join');
});
