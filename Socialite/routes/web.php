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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/google/redirect', [App\Http\Controllers\GoogleController::class, 'handleGoogleRedirect']);
Route::get('/auth/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback']);

Route::get('/auth/github/redirect', [App\Http\Controllers\GithubController::class, 'handleGithubRedirect']);
Route::get('/auth/github/callback', [App\Http\Controllers\GithubController::class, 'handleGithubCallback']);

Route::get('/auth/facebook/redirect', [App\Http\Controllers\FacebookController::class, 'handleFacebookRedirect']);
Route::get('/auth/facebook/callback', [App\Http\Controllers\FacebookController::class, 'handleFacebookCallback']);

