<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DefinitionsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TinymceController;
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

        Route::get('media/delete/{id}', [MediaController::class, 'destroy'])->name('media.delete');

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
        Route::post('category/create', [CategoriesController::class, 'store'])->name('categories.create');
        Route::get('category/update/{id}', [CategoriesController::class, 'showUpdateForm'])->name('categories.update');
        Route::post('category/update/{id}', [CategoriesController::class, 'update']);
        Route::get('category/delete/{id}', [CategoriesController::class, 'delete'])->name('categories.delete');


        Route::get('cities', [CitiesController::class, 'listCities'])->name('cities');
        Route::post('city/create', [CitiesController::class, 'store'])->name('cities.create');
        Route::get('city/update/{id}', [CitiesController::class, 'showUpdateForm'])->name('cities.update');
        Route::post('city/update/{id}', [CitiesController::class, 'update']);
        Route::get('city/delete/{id}', [CitiesController::class, 'delete'])->name('cities.delete');


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



        Route::get("blogs", [BlogController::class, "index"])->name('blogs');
        Route::get("blog/create", [BlogController::class, "showForm"])->name('blogs.create');
        Route::post("blog/create", [BlogController::class, "create"])->name('blogs.create');
        Route::get("blog/{id}/update", [BlogController::class, "showForm"])->name('blogs.update');
        Route::post("blog/{id}/update", [BlogController::class, "update"]);
        Route::get("blog/delete/{id}", [BlogController::class, "delete"])->name('blogs.delete');


        Route::get("testimonials", [TestimonialController::class, "index"])->name('testimonials');
        Route::get("testimonial/create", [TestimonialController::class, "showForm"])->name('testimonials.create');
        Route::get("testimonials/clone/{id}", [TestimonialController::class, "showForm"])->name('testimonials.clone');
        Route::post("testimonial/create", [TestimonialController::class, "create"]);
        Route::post("testimonial/reorder", [TestimonialController::class, "reorder"])->name('testimonials.reorder');
        Route::post("testimonial/update/status", [TestimonialController::class, "updateStatus"])->name('testimonial.update.status');
        Route::post("testimonial/update/featured", [TestimonialController::class, "updateFeaturedStatus"])->name('testimonial.update.featured');
        Route::get("testimonial/{id}/update/{locale?}", [TestimonialController::class, "showForm"])->name('testimonials.update');
        Route::post("testimonial/{id}/update/{locale?}", [TestimonialController::class, "update"]);
        Route::post("testimonial/translation/delete", [TestimonialController::class, "deleteTranslation"])->name('testimonial.translation.delete');
        Route::post("testimonial/delete", [TestimonialController::class, "delete"])->name('testimonials.delete');


        Route::post("tinymce/image/upload", [TinymceController::class, "upload"])->name('tinymce.upload');
        Route::post("tinymce/image/delete", [TinymceController::class, "delete"])->name('tinymce.delete');

    });
});


Route::get('login', [LoginController::class, "showLoginForm"])->name('login');
Route::post("login", [LoginController::class, "login"]);

Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/properties', [HomeController::class, "filter"])->name('home.filter');
Route::get('/contact', [HomeController::class, "showContactUsPage"])->name('home.contact');
Route::get('/property/{id}', [HomeController::class, "showProperty"])->name('home.property');
Route::get('/blog', [BlogController::class, "showBlog"])->name('home.blog');
Route::get('/blog/{id}', [BlogController::class, "showArticle"])->name('home.blog.article');
Route::get('/agents', [AgentController::class, "showAgents"])->name('home.agents');
Route::get('/about-us', [HomeController::class, "showAboutUsPage"])->name('home.aboutUs');
Route::get('/citizenship', [HomeController::class, "showCitizenshipPage"])->name('home.citizenship');

Route::get('language/set/{locale}', [LanguageController::class, "setUserLangCookie"])->name('language.set');
