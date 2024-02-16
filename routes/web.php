<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SiteController::class, 'index'])->name('home');

Route::get('/registration', [AuthController::class, 'registrationForm'])->name('registration');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration.action');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.action');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth')->name('posts.create');
Route::post('/posts/create', [PostController::class, 'store'])->middleware('auth')->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/delete', [PostController::class, 'delete'])
    ->middleware('auth')
    ->name('posts.delete')
    ->can('manage,post');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
    ->middleware('auth')
    ->name('posts.edit')
    ->can('manage,post');
Route::post('/posts/{post}/edit', [PostController::class, 'update'])->middleware('auth')
    ->name('posts.update')
    ->can('manage,post');

Route::get('/users/{user}/posts', [PostController::class, 'userPosts'])->name('user.posts');
