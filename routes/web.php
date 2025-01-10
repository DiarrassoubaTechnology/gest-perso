<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Back\ChatController;
use App\Http\Controllers\Back\HourStatisticController;
use App\Http\Controllers\Back\ProjectController;
use App\Http\Controllers\Back\RDVController;
use App\Http\Controllers\Back\WorkingHourController;
use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\Back\WorkerController;
use App\Http\Controllers\Back\WorkLeaveController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\InfoController;
use Illuminate\Support\Facades\Route;

// Les fonctions du contoleur connexion
Route::get('/', [AuthController::class, 'userLogin'])->name('login');
Route::post('/user.store', [AuthController::class, 'connexionUser'])->name('login.store');

// Recuperer la liste des fonctions en fonction du service choisi
Route::post('/list.function', [InfoController::class, 'getListFunction'])->name('get.list.function');

// Les routes qui demande une Authentification
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'pageIndex'])->name('page.dashboard');

    // Les routes employees
    Route::get('/employee/form', [WorkerController::class, 'pageNewWorker'])->name('page.worker.add');
    Route::post('/employee/save', [WorkerController::class, 'pageSaveNewWorker'])->name('page.worker.save');
    Route::get('/employee/list', [WorkerController::class, 'pageListWorkers'])->name('page.worker.list');
    Route::post('/employee/edit', [WorkerController::class, 'pageEditWorkers'])->name('page.worker.edit');
    Route::post('/employee/delete', [WorkerController::class, 'pageDeleteWorkers'])->name('page.worker.delete');
    Route::post('/employee/enable', [WorkerController::class, 'pageEnableWorkers'])->name('page.worker.enable');
    Route::post('/employee/key', [WorkerController::class, 'pageKeyWorkers'])->name('page.worker.key');

    // Les routes projets
    Route::get('/projects/list', [ProjectController::class, 'pageListeProject'])->name('page.project.list');
    Route::post('/projects/save', [ProjectController::class, 'pageSaveNewProject'])->name('page.project.save');

    // Les routes tasks
    Route::get('/tasks/list', [ProjectController::class, 'pageListeProject'])->name('page.tasks.list');
    Route::post('/tasks/save', [ProjectController::class, 'pageSaveNewProject'])->name('page.tasks.save');

    // Les routes messages
    Route::get('/chat/team', [ChatController::class, 'pageChatTeam'])->name('page.team.chat');
    
    // Les routes horaires
    Route::get('/appointment/team', [RDVController::class, 'pageRdvTeam'])->name('page.team.rdv');
    Route::get('/appointment/report', [WorkingHourController::class, 'pageReportAppointment'])->name('page.appoint.report');
    Route::get('/appointment/hour', [WorkingHourController::class, 'pageHourAppointment'])->name('page.appoint.hour');
    Route::get('/appointment/history', [WorkingHourController::class, 'pageHistoryHour'])->name('page.appoint.history');
    Route::post('/time/point', [WorkingHourController::class, 'functionPointTheTime'])->name('function.point.time');
    Route::post('/time/endday', [WorkingHourController::class, 'functionEndTheDay'])->name('function.endday.time');

    // Les routes statistic
    Route::get('/general/statistic', [HourStatisticController::class, 'pageStatisticHour'])->name('page.general.statistic');

    // Les routes congés
    Route::get('/leave/justification', [WorkLeaveController::class, 'pageLeaveJustify'])->name('page.leave.justify');
    Route::get('/leave/list', [WorkLeaveController::class, 'pageLeaveList'])->name('page.leave.list');

    Route::get('/account/logout', [AuthController::class, 'accountLogout'])->name('login.out');
    Route::get('/account/password/change', [UserController::class, 'accountPasswdChange'])->name('account.passwordchange');

});