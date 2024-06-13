<?php

use App\Http\Controllers\Admin\CenterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProposalController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SkilController;
use App\Http\Controllers\Admin\StudentApplyController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SupervisorController;
use App\Http\Controllers\Admin\TeachingAssistantController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('site.index');
});
Route::get('login/with',[LoginController::class,'with'])->name('login.with');
Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('index', [LoginController::class, 'index'])->name('index');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});




Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/notifications', [DashboardController::class, 'fetch'])->name('notifications.fetch');
    Route::get('logout', [DashboardController::class, 'logout'])->name('logout');
});

Route::name('admin.')->prefix('admin')->middleware('check')->group(function () {
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/show/{id}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::get('/roles/delete/{id}', [RoleController::class, 'delete'])->name('roles.delete');
});

Route::name('admin.')->prefix('admin')->middleware('check')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
});


Route::name('admin.')->prefix('admin')->middleware('check')->group(function () {
    Route::get('/centers', [CenterController::class, 'index'])->name('centers.index');
    Route::get('/centers/create', [CenterController::class, 'create'])->name('centers.create');
    Route::post('/centers/store', [CenterController::class, 'store'])->name('centers.store');
    Route::get('/centers/edit/{id}', [CenterController::class, 'edit'])->name('centers.edit');
    Route::post('/centers/update/{id}', [CenterController::class, 'update'])->name('centers.update');
    Route::get('/centers/delete/{id}', [CenterController::class, 'delete'])->name('centers.delete');
});


Route::name('admin.')->prefix('admin')->middleware('check')->group(function () {
    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams/store', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/editAll', [TeamController::class, 'editAll'])->name('teams.editAll');
    Route::post('/teams/updateAll', [TeamController::class, 'updateAll'])->name('teams.updateAll');
    Route::get('/teams/edit/{id}', [TeamController::class, 'edit'])->name('teams.edit');
    Route::post('/teams/update/{id}', [TeamController::class, 'update'])->name('teams.update');
    Route::get('/teams/delete/{id}', [TeamController::class, 'delete'])->name('teams.delete');
});


Route::name('admin.')->prefix('admin')->middleware('check')->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/edit/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('/projects/update/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::get('/projects/delete/{id}', [ProjectController::class, 'delete'])->name('projects.delete');
});


Route::name('admin.')->prefix('admin')->middleware('check')->group(function () {
    Route::get('/proposals', [ProposalController::class, 'index'])->name('proposals.index');
    Route::get('/proposals/create', [ProposalController::class, 'create'])->name('proposals.create');
    Route::post('/proposals/store', [ProposalController::class, 'store'])->name('proposals.store');
    Route::get('/proposals/edit/{id}', [ProposalController::class, 'edit'])->name('proposals.edit');
    Route::post('/proposals/update/{id}', [ProposalController::class, 'update'])->name('proposals.update');
    Route::get('/proposals/delete/{id}', [ProposalController::class, 'delete'])->name('proposals.delete');
});

Route::name('admin.')->prefix('admin')->middleware('check')->group(function () {
    Route::get('/team_members', [TeamMemberController::class, 'index'])->name('team_members.index');
    Route::get('/team_members/create', [TeamMemberController::class, 'create'])->name('team_members.create');
    Route::post('/team_members/store', [TeamMemberController::class, 'store'])->name('team_members.store');
    Route::get('/team_members/supervisor_ajax/{id}', [TeamMemberController::class, 'supervisor_ajax'])->name('team_members.supervisor_ajax');
    Route::get('/team_members/team_ajax/{id}', [TeamMemberController::class, 'team_ajax'])->name('team_members.team_ajax');
    Route::get('/team_members/project_ajax/{id}', [TeamMemberController::class, 'project_ajax'])->name('team_members.project_ajax');
    Route::get('/team_members/delete/{id}', [TeamMemberController::class, 'delete'])->name('team_members.delete');
});


Route::name('admin.')->prefix('admin')->middleware('check')->group(function () {
    Route::get('/skils', [SkilController::class, 'index'])->name('skils.index');
    Route::get('/skils/create', [SkilController::class, 'create'])->name('skils.create');
    Route::post('/skils/store', [SkilController::class, 'store'])->name('skils.store');
    Route::get('/skils/edit/{id}', [SkilController::class, 'edit'])->name('skils.edit');
    Route::post('/skils/update/{id}', [SkilController::class, 'update'])->name('skils.update');
    Route::get('/skils/delete/{id}', [SkilController::class, 'delete'])->name('skils.delete');
});


Route::name('admin.')->prefix('admin')->middleware('check')->group(function () {
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/downloadPDF/{id}', [StudentController::class, 'downloadPDF'])->name('students.downloadPDF');
    Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::post('/students/update/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::get('/students/delete/{id}', [StudentController::class, 'delete'])->name('students.delete');
});


Route::name('admin.')->prefix('admin')->middleware('check')->group(function () {
    Route::get('/supervisors', [SupervisorController::class, 'index'])->name('supervisors.index');
    Route::get('/supervisors/create', [SupervisorController::class, 'create'])->name('supervisors.create');
    Route::post('/supervisors/store', [SupervisorController::class, 'store'])->name('supervisors.store');
    Route::get('/supervisors/edit/{id}', [SupervisorController::class, 'edit'])->name('supervisors.edit');
    Route::post('/supervisors/update/{id}', [SupervisorController::class, 'update'])->name('supervisors.update');
    Route::get('/supervisors/delete/{id}', [SupervisorController::class, 'delete'])->name('supervisors.delete');
});

Route::name('admin.')->prefix('admin')->middleware('check')->group(function () {
    Route::get('/TeachingAssistants', [TeachingAssistantController::class, 'index'])->name('TeachingAssistants.index');
    Route::get('/TeachingAssistants/create', [TeachingAssistantController::class, 'create'])->name('TeachingAssistants.create');
    Route::post('/TeachingAssistants/store', [TeachingAssistantController::class, 'store'])->name('TeachingAssistants.store');
    Route::get('/TeachingAssistants/supervisor_ajax/{id}', [TeachingAssistantController::class, 'supervisor_ajax'])->name('shippings.supervisor_ajax');
    Route::get('/TeachingAssistants/edit/{id}', [TeachingAssistantController::class, 'edit'])->name('TeachingAssistants.edit');
    Route::post('/TeachingAssistants/update/{id}', [TeachingAssistantController::class, 'update'])->name('TeachingAssistants.update');
    Route::get('/TeachingAssistants/delete/{id}', [TeachingAssistantController::class, 'delete'])->name('TeachingAssistants.delete');
});

Route::name('admin.')->prefix('admin')->middleware('check')->group(function () {
    Route::get('/studentApplys', [StudentApplyController::class, 'index'])->name('studentApplys.index');
    Route::get('/studentApplys/show/{id}', [StudentApplyController::class, 'show'])->name('studentApplys.show');
    Route::post('/studentApplys/change_status/{id}', [StudentApplyController::class, 'change_status'])->name('studentApplys.change_status');
});
