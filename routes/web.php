<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ListImageController;
use App\Http\Controllers\ShowImageController;

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

Route::get('/', ListImageController::class)->name('images.index');
Route::get('/images/{image}', ShowImageController::class)->name('images.show');
Route::get('/images', [ImageController::class, 'create'])->name('images.create');
Route::post('/images', [ImageController::class, 'store'])->name('images.store');
Route::get('/images/{image}/edit', [ImageController::class, 'edit'])->name('images.edit'); //->can('update', 'image');
Route::put('/images/{image}', [ImageController::class, 'update'])->name('images.update');
Route::delete('/images/{image}', [ImageController::class, 'destroy'])->name('images.destroy');

Route::view('/test-blade', 'test');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
