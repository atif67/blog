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
// Public Routes{
Route::get('/', [\App\Http\Controllers\HomeController::class,'get'])->name('/');
Route::get('post/{slug}',[\App\Http\Controllers\HomeController::class,'postDetail'])->name('post.detail');

Route::middleware(['auth','verified'])->group(function (){

    Route::get('profile',[\App\Http\Controllers\UserController::class,'get'])->name('profile');
    Route::get('profile-edit',[\App\Http\Controllers\UserController::class,'updateProfileView'])->name('profile-edit');
    Route::put('profile-edit',[\App\Http\Controllers\UserController::class,'updateProfile'])->name('profile-edit');

    Route::get('new/post',[\App\Http\Controllers\PostController::class,'createPage'])->name('user.post.create');
    Route::post('new/post',[\App\Http\Controllers\PostController::class,'post'])->name('user.post.create');
    Route::get('edit/post/{slug}',[\App\Http\Controllers\PostController::class,'editPage'])->name('user.post.edit');
    Route::put('edit/post/{slug}',[\App\Http\Controllers\PostController::class,'put'])->name('user.post.edit');
    Route::delete('delete/post/{slug}',[\App\Http\Controllers\PostController::class,'destroy'])->name('user.post.delete');
    Route::post('comments/{id}',[\App\Http\Controllers\CommentController::class,'post'])->name('comments.create');

});


// Admin Panel HomePage
Route::get('admin',[\App\Http\Controllers\Admin\HomeController::class,'get'])->name('admin.home')->middleware('role');

Route::middleware(['role'])->prefix('admin')->group(function (){

    Route::get('posts',[\App\Http\Controllers\Admin\PostController::class,'get'])->name('posts.index');
    Route::get('posts/new',[\App\Http\Controllers\Admin\PostController::class,'createView'])->name('posts.create');
    Route::get('posts/update/{slug}',[\App\Http\Controllers\Admin\PostController::class,'getById'])->name('posts.show');
    Route::post('posts/new',[\App\Http\Controllers\Admin\PostController::class,'post'])->name('posts.create');
    Route::put('posts/{slug}',[\App\Http\Controllers\Admin\PostController::class,'put'])->name('posts.update');
    Route::delete('post/{slug}',[\App\Http\Controllers\Admin\PostController::class,'destroy'])->name('posts.destroy');

    Route::get('comments',[\App\Http\Controllers\CommentController::class,'get'])->name('comments.index');
    Route::post('comments/confirm-or-delete/id/{id}/case/{case}',[\App\Http\Controllers\CommentController::class,'commentConfirmOrDelete'])->name('comments.confirm-or-delete');

    Route::get('profile',[\App\Http\Controllers\Admin\UserController::class,'profile'])->name('users.profile');
    Route::put('update-profile/{id}',[\App\Http\Controllers\Admin\UserController::class,'updateProfile'])->name('users.update.profile');
    Route::put('update-password/{id}',[\App\Http\Controllers\Admin\UserController::class,'updatePassword'])->name('users.update.password');
    Route::get('users/new',[\App\Http\Controllers\Admin\UserController::class,'createView'])->name('users.create');
    Route::get('users',[\App\Http\Controllers\Admin\UserController::class,'get'])->name('users.index');
    Route::get('users/update/{id}',[\App\Http\Controllers\Admin\UserController::class,'getById'])->name('users.update');
    Route::put('users/update/{id}',[\App\Http\Controllers\Admin\UserController::class,'put'])->name('users.update');
    Route::post('users/new',[\App\Http\Controllers\Admin\UserController::class,'post'])->name('users.create');
    Route::delete('users/delete-user/{id}',[\App\Http\Controllers\Admin\UserController::class,'destroy'])->name('users.delete');

    Route::get('categories',[\App\Http\Controllers\Admin\CategoryController::class,'get'])->name('categories.index');
    Route::post('categories/new',[\App\Http\Controllers\Admin\CategoryController::class,'post'])->name('categories.create');
    Route::put('categories/update/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'put'])->name('categories.update');
    Route::delete('categories/delete/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('categories.destroy');

    Route::get('tags',[\App\Http\Controllers\Admin\TagController::class,'get'])->name('tags.index');
    Route::post('tags/new',[\App\Http\Controllers\Admin\TagController::class,'post'])->name('tags.create');
    Route::put('tags/update/{id}',[\App\Http\Controllers\Admin\TagController::class,'put'])->name('tags.update');
    Route::delete('tags/delete/{id}',[\App\Http\Controllers\Admin\TagController::class,'destroy'])->name('tags.destroy');

    Route::get('settings',[\App\Http\Controllers\Admin\SettingsController::class,'get'])->name('settings');
    Route::put('settings',[\App\Http\Controllers\Admin\SettingsController::class,'put'])->name('settings');

    Route::post('trend-on/{id}',[\App\Http\Controllers\Admin\SettingsController::class,'trendOn'])->name('trend-on');
    Route::post('trend-off/{id}',[\App\Http\Controllers\Admin\SettingsController::class,'trendOff'])->name('trend-off');

    Route::post('subscribe',[\App\Http\Controllers\SubscribeController::class,'post'])->name('subscribe');
});

Auth::routes(['verify' => true]);

Route::get('login',[\App\Http\Controllers\UserController::class,'loginView'])->name('login');
Route::post('login',[\App\Http\Controllers\UserController::class,'login'])->name('login');
Route::get('register',[\App\Http\Controllers\UserController::class,'registerView'])->name('register');
Route::post('register',[\App\Http\Controllers\UserController::class,'register'])->name('register');
Route::post('logout', [\App\Http\Controllers\Admin\UserController::class,'logout'])->name('logout');
