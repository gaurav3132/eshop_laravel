<?php

use App\Http\Controllers\Back\BrandsController;
use App\Http\Controllers\Back\CategoriesController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\LoginController;
use App\Http\Controllers\Back\PasswordController;
use App\Http\Controllers\Back\ProductController;
use App\Http\Controllers\Back\ProfileController;
use App\Http\Controllers\Back\SlidersController;
use App\Http\Controllers\Back\Staffcontroller;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PagesController;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('/cms')->group(function(){
    Route::name('cms.')->group(function() {
        Route::middleware('auth:cms')->group(function () {

            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

            Route::POST('/logout', [LoginController::class, 'logout'])->name('logout');

            Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');

            Route::match(['put', 'patch'], '/edit-profile', [ProfileController::class, 'update'])->name('profile.update');

            Route::get('/change-password', [PasswordController::class, 'edit'])->name('password.edit');

            Route::match(['put', 'patch'], '/change-password', [PasswordController::class, 'update'])->name('password.update');

            Route::resource('/staffs', Staffcontroller::class)->except('show')->middleware('admin.access');


            /* Route::resource('/categories', CategoriesController::class)->except('show');
            Route::resource('/brands', BrandsController::class)->except('show');
            Route::resource('/products', ProductController::class)->except('show');

            Route::resource('/sliders', SlidersController::class)->except('show'); */

            Route::resources([
                'categories'=>CategoriesController::class,
                'brands'=>BrandsController::class,
                'products'=>ProductController::class,
                'sliders'=>SlidersController::class,

            ],['except'=>['show']]);


        });
    });


    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('cms.login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('cms.login.check');




});



Route::name('front.')->group(function(){
    Route::get('/', [HomeController::class,'index'])->name('home.index');

    Route::get('/category/{category}', [PagesController::class,'category'])->name('pages.category');

    Route::get('/brand/{brand}', [PagesController::class,'brand'])->name('pages.brand');

    Route::get('/product/{product}', [PagesController::class,'product'])->name('pages.product');

    Route::get('/search',[PagesController::class,'search'])->name('pages.search');
});

Auth::routes();



