<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\Post;

Route::get('/', function () {
    return view('index', [
        'posts' => Post::with(['comments', 'comments.user', 'user'])->orderBy('created_at', 'desc')->get(),
    ]);
})->name('index');

Route::get('/profile-image/get', [UserController::class, 'getProfileImage'])->name('user.profile-image.get');
Route::post('/profile-image/upload', [UserController::class, 'uploadProfileImage'])->name('user.profile-image.upload');
Route::post('/posts/create', [PostController::class, 'createPost'])->name('post.create');

Route::group(['middleware' => 'guest', 'prefix' => '/auth'], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/login', fn () => view('auth.login'))->name('login.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/register', fn () => view('auth.register'))->name('register.form');
    Route::view('/forget-password', 'auth.forget-password')->name('forget-password.form');
    Route::post('/forgot-password/send-link', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});
Route::get('auth/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

