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


// Главная
Route::get('/', [MainController::class, 'main'])->name('main');

Route::middleware('guest')->group(function () {
    // Авторизация
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login_post');
    // Регистрация
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register_post');
});

Route::middleware('auth')->group(function () {
    // Выход
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // Профиль
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile-edit');
    Route::post('/profile/edit', [ProfileController::class, 'edit_post'])->name('profile-edit_post');

    // Блог
    Route::get('/profile/blog/new', [BlogController::class, 'create'])->name('blog-create');
    Route::post('/profile/blog/new', [BlogController::class, 'create_post'])->name('blog-create_post');

    // Проекты
    Route::get('/profile/projects/new', [ProjectController::class, 'create'])->name('projects-create');
    Route::post('/profile/projects/new', [ProjectController::class, 'create_post'])->name('projects-create_post');

    /// Форум
    // Разделы
    Route::get('/projects/{domain}/forum/new', [ForumController::class, 'section_create'])->name('forum-section-create');
    Route::post('/projects/{domain}/forum/new', [ForumController::class, 'section_create_post'])->name('forum-section-create_post');
    // Темы
    Route::get('/projects/{domain}/forum/{sec_id}/new', [ForumController::class, 'topic_create'])->name('forum-topic-create');
    Route::post('/projects/{domain}/forum/{sec_id}/new', [ForumController::class, 'topic_create_post'])->name('forum-topic-create_post');
    // Ответы
    Route::post('/projects/{domain}/forum/{sec_id}/{id}/new', [ForumController::class, 'answer_create_post'])->name('forum-answer-create_post');
});

// Профиль
Route::get('/profile/{login?}/{content?}', [ProfileController::class, 'index'])->name('profile');

// Разделы
Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');

// Блог
Route::get('/profile/{login}/blog/{id}', [BlogController::class, 'get'])->name('blog-post');

// Проекты
Route::get('/projects/{domain}/{content?}', [ProjectController::class, 'get'])->name('project');

// Форум
Route::get('/projects/{domain}/forum/{id}', [ForumController::class, 'section_get'])->name('forum-section');
Route::get('/projects/{domain}/forum/{sec_id}/{id}/', [ForumController::class, 'topic_get'])->name('forum-topic');

