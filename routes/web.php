<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Back\ChatController;
use App\Http\Controllers\Back\HourStatisticController;
use App\Http\Controllers\Back\RDVController;
use App\Http\Controllers\Back\WorkingHourController;
use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\Back\WorkerController;
use App\Http\Controllers\Back\WorkLeaveController;
use App\Http\Controllers\Front\UserController;
use Illuminate\Support\Facades\Route;

// Les fonctions du contoleur connexion
Route::get('/', [AuthController::class, 'userLogin'])->name('login.show');
Route::post('/user.store', [AuthController::class, 'connexionUser'])->name('login.store');

// Les routes qui demande une Authentification
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'pageIndex'])->name('page.dashboard');
    Route::get('/employee/form', [WorkerController::class, 'pageNewWorker'])->name('page.worker.add');
    Route::get('/employee/liste', [WorkerController::class, 'pageListWorkers'])->name('page.worker.list');
    Route::get('/chat/team', [ChatController::class, 'pageChatTeam'])->name('page.team.chat');
    Route::get('/appointment/team', [RDVController::class, 'pageRdvTeam'])->name('page.team.rdv');
    Route::get('/appointment/report', [WorkingHourController::class, 'pageReportAppointment'])->name('page.appoint.report');
    Route::get('/appointment/hour', [WorkingHourController::class, 'pageHourAppointment'])->name('page.appoint.hour');
    Route::get('/appointment/history', [WorkingHourController::class, 'pageHistoryHour'])->name('page.appoint.history');
    Route::get('/general/statistic', [HourStatisticController::class, 'pageStatisticHour'])->name('page.general.statistic');
    Route::get('/leave/justification', [WorkLeaveController::class, 'pageLeaveJustify'])->name('page.leave.justify');
    Route::get('/leave/list', [WorkLeaveController::class, 'pageLeaveList'])->name('page.leave.list');

    Route::get('/account/logout', [AuthController::class, 'accountLogout'])->name('login.out');
    Route::get('/account/password/change', [UserController::class, 'accountPasswdChange'])->name('account.passwordchange');

});