<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SolutionController;
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

Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('/about', [HomeController::class,'about'])->name('about');
Route::get('/scanners', [HomeController::class,'scanners'])->name('scanners');
Route::get('/blog', [HomeController::class,'blog'])->name('blog');
Route::get('/aboutDetails/{id}', [HomeController::class,'aboutDetails'])->name('aboutDetails');
Route::get('/product/{id}', [HomeController::class,'product'])->name('product');
Route::get('/contact', [HomeController::class,'contact'])->name('contact');
Route::get('/auth/register', [AuthController::class,'register'])->name('auth.register');
Route::get('/auth/login', [AuthController::class,'login'])->name('auth.login');
//////////////////////////////////Start Admin Category///////////////////////////////////////
Route::get('/admin/category/create',[CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/category/create',[CategoryController::class, 'store'])->name('admin.category.store');
Route::get('/admin/category/list',[CategoryController::class, 'list'])->name('admin.category.list');
Route::get('/admin/categorycategory/edit/{id}',[CategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('/admin/category/update/{id}',[CategoryController::class, 'update'])->name('admin.category.update');
Route::delete('/admin/category/destroy/{id}',[CategoryController::class, 'destroy'])->name('admin.category.destroy');
//////////////////////////End Admin Category////////////////////////////////////////////////////


//////////////////////////////////Start Admin Product///////////////////////////////////////
Route::get('/admin/product/create',[ProductController::class, 'create'])->name('admin.product.create');
Route::post('/admin/product/create',[ProductController::class, 'store'])->name('admin.product.store');
Route::get('/admin/product/list',[ProductController::class, 'list'])->name('admin.product.list');
Route::get('/admin/product/edit/{id}',[ProductController::class, 'edit'])->name('admin.product.edit');
Route::post('/admin/product/update/{id}',[ProductController::class, 'update'])->name('admin.product.update');
Route::delete('/admin/product/destroy/{id}',[ProductController::class, 'destroy'])->name('admin.product.destroy');
//////////////////////////End Admin Product////////////////////////////////////////////////////



/////////////////////////Start Admin Blog///////////////////////////////////////
Route::get('/admin/blog/create',[BlogController::class, 'create'])->name('admin.blog.create');
Route::post('/admin/blog/create',[BlogController::class, 'store'])->name('admin.blog.store');
Route::get('/admin/blog/list',[BlogController::class, 'list'])->name('admin.blog.list');
Route::get('/admin/blog/edit/{id}',[BlogController::class, 'edit'])->name('admin.blog.edit');
Route::post('/admin/blog/update/{id}',[BlogController::class, 'update'])->name('admin.blog.update');
Route::delete('/admin/blog/destroy/{id}',[BlogController::class, 'destroy'])->name('admin.blog.destroy');
//////////////////////////End Admin Blog//////////////////////////////

//////////////////////////start Admin About//////////////////////////////
Route::get('/admin/about/create',[AboutController::class, 'create'])->name('admin.about.create');
Route::post('/admin/about/create',[AboutController::class, 'store'])->name('admin.about.store');
Route::get('/admin/about/list',[AboutController::class, 'list'])->name('admin.about.list');
Route::get('/admin/about/edit/{id}',[AboutController::class, 'edit'])->name('admin.about.edit');
Route::post('/admin/about/update/{id}',[AboutController::class, 'update'])->name('admin.about.update');
Route::delete('/admin/about/destroy/{id}',[AboutController::class, 'destroy'])->name('admin.about.destroy');
//////////////////////////end Admin About//////////////////////////////

//////////////////////////Strat Solution///////////////////////

Route::get('solution',[SolutionController::class,'index'])->name('solution');
//////////////////////////End Solution///////////////////////