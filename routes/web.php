<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Inertia\Inertia;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::group(['middleware'=>'auth:sanctum,verified'],function(){
    Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/blogcategory',[AdminController::class, 'blogcategory'])->name('blogcategory');
    Route::get('/users',[AdminController::class, 'users'])->name('users');



});
Route::get('/home',[UserController::class, 'home'])->name('home');
Route::get('/profile',[UserController::class, 'profile'])->name('userprofile');
Route::get('/friends',[UserController::class, 'friends'])->name('friends');
Route::get('/messages',[UserController::class, 'messages'])->name('messages');
