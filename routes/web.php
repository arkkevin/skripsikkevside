<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AccountController;
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
Route::get('home', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);

Route::get('register', [LoginController::class, 'register'])->name('register')->middleware('guest');
Route::post('register', [LoginController::class, 'register_action'])->name('register.action');

Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login_action'])->name('login.action');

Route::get('password', [LoginController::class, 'password'])->name('password');
Route::post('password', [LoginController::class, 'password_action'])->name('password.action');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('profile', [profilecontroller::class,'index'])->middleware('auth');
Route::get('editprofile', [profilecontroller::class, 'editprofile']);
Route::post('editprofile', [profilecontroller::class, 'update']);

Route::get('create', [ArticleController::class, 'create'])->name('create');
Route::post('create', [ArticleController::class, 'store']);

Route::get('edit', [ArticleController::class, 'editArticle'])->name('editArticle');
Route::post('edit', [ArticleController::class,  'updateArticle']);

Route::middleware('level')->group(function () {
    Route::get('review', [ArticleController::class, 'review'])->name('review');
    Route::post('review', [ArticleController::class, 'reviewUp']);
});

//search account

Route::get('/searchaccount', [AccountController::class, 'search'])->name('searchaccount');

// likes unlikes
Route::post('/articles/{article}/like', [ArticleController::class, 'like'])->name('articles.like');
Route::delete('/articles/{article}/unlike', [ArticleController::class, 'unlike'])->name('articles.unlike');


//follow unfollow
Route::post('/articles/{article}/follow', [ArticleController::class, 'follow'])->name('articles.follow');
Route::delete('/articles/{article}/unfollow', [ArticleController::class, 'unfollow'])->name('articles.unfollow');

//searchbycategory
Route::get('/articles/category/{category}', 'ArticleController@searchByCategory')->name('articles.category');
