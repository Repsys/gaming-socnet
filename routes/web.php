<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [MainController::class, 'main'])->name('main');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login_post');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register_post');

});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile-edit');
    Route::post('/profile/edit', [ProfileController::class, 'edit_post'])->name('profile-edit_post');

});

Route::get('/profile/{login?}', [ProfileController::class, 'index'])->name('profile');

Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers');

// Блог
Route::get('/profile/{login}/blog', [BlogController::class, 'index'])->name('blog');

// Блог
Route::get('/profile/{login}/projects', [ProjectController::class, 'index'])->name('projects');

// Форум
Route::get('/projects/{id}/forum', [ForumController::class, 'index'])->name('forum');


