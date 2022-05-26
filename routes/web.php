<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ListImageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShowAuthorController;
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

Route::get('/', ListImageController::class)->name('images.all');
Route::get('/images/{image}', ShowImageController::class)->name('images.show');
Route::get('/@{user:username}', ShowAuthorController::class)->name('author.show');
Route::resource('/account/images', ImageController::class)->except('show');
Route::get('/account/settings', [SettingController::class, 'edit'])->name('settings.edit');
Route::put('/account/settings', [SettingController::class, 'update'])->name('settings.update');

Route::view('/test-blade', 'test');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
