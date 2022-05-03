<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'landingpage'])->name('homepage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/ad', 'App\Http\Controllers\AdController');

Route::post('/getmodels', [App\Http\Controllers\AdController::class, 'getModels'])->name('getmodels');

Route::get('/profile/ads', [App\Http\Controllers\UserPanelController::class, 'myAds'])->name('profile.ads');

Route::resource('/comment', 'App\Http\Controllers\CommentController');

Route::resource('/inbox', 'App\Http\Controllers\MessageController');

Route::get('/chat/{recipientId}', [App\Http\Controllers\MessageController::class, 'chat'])->name('chat');
