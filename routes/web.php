<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserControoler;
use Illuminate\Support\Facades\Route;

Route::get('/lang-ar' , function ()  {
    session()->put('lang','ar');
    return back();
});
Route::get('/lang-en' , function ()  {
    session()->put('lang','en');
    return back();
});


require __DIR__.'/auth.php';


Route::get('/explore', [PostController::class,"explore"])->name("explore")->middleware('ChangeLanguage');
Route::get('/{user:username}', [UserControoler::class,"index"])->name("user_profile")->middleware('ChangeLanguage');
Route::get('/{user:username}/edit', [UserControoler::class,"edit"])->name("edit_profile")->middleware(['auth','ChangeLanguage']);
Route::patch('/{user:username}/update', [UserControoler::class,"update"])->name("update_profile")->middleware(['auth','ChangeLanguage']);
Route::get('/{user:username}/follow', [UserControoler::class, 'follow'])->middleware(['auth','ChangeLanguage']);
Route::get('/{user:username}/unfollow', [UserControoler::class, 'unfollow'])->middleware(['auth','ChangeLanguage']);


Route::controller(PostController::class)->middleware(['auth','ChangeLanguage'])->group(function () {
    Route::get('/',"index")->name("home");
    Route::get('/p/create', "create")->name("create_post");
    Route::post('/p/create', "store")->name("store_post");
    Route::get('/p/{post:slug}', "show")->name("show_post");
    Route::get('/p/{post:slug}/edit', "edit")->name("edit_post");
    Route::patch('/p/{post:slug}/update', "update")->name("update_post");
    Route::delete('/p/{post:slug}/delete', "destroy")->name("delete_post");
});

Route::post('/p/{post:slug}/comment', [CommentController::class,"store"])->name("store_comment")->middleware(['auth','ChangeLanguage']);

Route::middleware(['auth','ChangeLanguage'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [ProfileController::class, 'edit'])->name('profile.edit')->middleware(['auth','ChangeLanguage']);;



