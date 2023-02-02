<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'middleware' => ['auth']
], function () {

    Route::get("logout", [LoginController::class, "logout"])->name('logout');

    Route::group([
        'prefix' => 'admin'
    ], function () {

        Route::get('/', [DashboardController::class, 'index'])->name('admin');

        Route::get('users', [UserController::class, 'listUsers'])->name('users');
        Route::get('user/create', [UserController::class, 'showCreateForm'])->name('users.create');
        Route::post('user/create', [UserController::class, 'storeUser']);
        Route::get('user/update/{id}', [UserController::class, 'showUpdateForm'])->name('users.update');
        Route::post('user/update/{id}', [UserController::class, 'updateUser']);
        Route::get('user/{id}', [UserController::class, 'showUserDetails'])->name('users.details');
        Route::delete('user', [UserController::class, 'deleteAccount'])->name('users.delete');


        Route::get('agents', [AgentController::class, 'listAgents'])->name('agents');
        Route::get('agent/create', [AgentController::class, 'showCreateForm'])->name('agents.create');
        Route::post('agent/create', [AgentController::class, 'store']);
        Route::get('agent/update/{id}', [AgentController::class, 'showUpdateForm'])->name('agents.update');
        Route::post('agent/update/{id}', [AgentController::class, 'update']);
        Route::get('user/{id}', [AgentController::class, 'showUserDetails'])->name('agents.details');
        Route::delete('agent', [AgentController::class, 'deleteAccount'])->name('agents.delete');
    });
});


Route::get('login', [LoginController::class, "showLoginForm"])->name('login');
Route::post("login", [LoginController::class, "login"]);
