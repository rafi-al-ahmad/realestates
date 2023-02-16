<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DefinitionsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertiesController;
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
        Route::get('user/delete/{id}', [UserController::class, 'deleteAccount'])->name('users.delete');


        Route::get('agents', [AgentController::class, 'listAgents'])->name('agents');
        Route::get('agent/create', [AgentController::class, 'showCreateForm'])->name('agents.create');
        Route::post('agent/create', [AgentController::class, 'store']);
        Route::get('agent/update/{id}', [AgentController::class, 'showUpdateForm'])->name('agents.update');
        Route::post('agent/update/{id}', [AgentController::class, 'update']);
        Route::get('agent/delete/{id}', [AgentController::class, 'delete'])->name('agents.delete');


        Route::get('categories', [CategoriesController::class, 'listCategories'])->name('categories');
        Route::get('category/create', [CategoriesController::class, 'showCreateForm'])->name('categories.create');
        Route::post('category/create', [CategoriesController::class, 'store']);
        Route::get('category/update/{id}', [CategoriesController::class, 'showUpdateForm'])->name('categories.update');
        Route::post('category/update/{id}', [CategoriesController::class, 'update']);
        Route::get('category/delete/{id}', [CategoriesController::class, 'delete'])->name('categories.delete');


        Route::get('properties', [PropertiesController::class, 'listProperties'])->name('properties');
        Route::get('property/create', [PropertiesController::class, 'showForm'])->name('properties.create');
        Route::post('property/create', [PropertiesController::class, 'store']);
        Route::get('property/update/{id}', [PropertiesController::class, 'showForm'])->name('properties.update');
        Route::post('property/update/{id}', [PropertiesController::class, 'update']);
        Route::get('property/delete/{id}', [PropertiesController::class, 'delete'])->name('properties.delete');


        Route::get('definitions', [DefinitionsController::class, 'listDefinitions'])->name('definitions');
        Route::get('definition/create', [DefinitionsController::class, 'showCreateForm'])->name('definitions.create');
        Route::post('definition/create', [DefinitionsController::class, 'store']);
        Route::get('definition/update/{id}', [DefinitionsController::class, 'showUpdateForm'])->name('definitions.update');
        Route::post('definition/update/{id}', [DefinitionsController::class, 'update']);
        Route::get('definition/delete/{id}', [DefinitionsController::class, 'delete'])->name('definitions.delete');
    });
});


Route::get('login', [LoginController::class, "showLoginForm"])->name('login');
Route::post("login", [LoginController::class, "login"]);

Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/properties', [HomeController::class, "filter"])->name('home.filter');
Route::get('/contact', [HomeController::class, "shoContactUsPage"])->name('home.contact');
Route::get('/property/{id}', [HomeController::class, "showProperty"])->name('home.property');
