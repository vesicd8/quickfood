<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Shared\AboutController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrdersController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::post('/login', [HomeController::class, 'login'])->name('login');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::post('/register', [HomeController::class, 'register'])->name('register');
Route::middleware(['isAdmin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin');
    Route::get('/products/search', [ProductsController::class, 'search'])->name('product.search');
    Route::resource('/categories', CategoriesController::class)->except(['index', 'create', 'show', 'edit']);
    Route::resource('/ingredients', IngredientController::class)->except(['index', 'create', 'show', 'edit']);
    Route::resource('/products', ProductsController::class)->except(['index', 'create', 'edit']);
    Route::resource('/labels', LabelController::class);
});
Route::get('/menu/addToCart', [MenuController::class, 'addToCart']);
Route::get('/menu/product/{id}', [MenuController::class, 'getProduct']);
Route::post('/product/review', [ProductController::class, 'store'])->name('product.review.store');
Route::put('/product/review/{id}', [ProductController::class, 'update'])->name('product.review.update');
Route::delete('/product/review/{id}', [ProductController::class, 'destroy'])->name('product.review.delete');
Route::get('/product/{url}', [ProductController::class, 'index'])->name('product.single');
Route::resource('/orders', OrdersController::class);
Route::get('/404', [BaseController::class, 'notFound'])->name('404');
Route::get('/403', [BaseController::class, 'notFound'])->name('403');
