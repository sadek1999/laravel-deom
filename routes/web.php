<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/blogs',[BlogController::class ,'index'])->name('blogs.index');
Route::get('/blogs/create', [BlogController::class ,'create'])->name("blogs.create");
Route::post('/blogs/create', [BlogController::class ,'store'])->name("blogs.store");
Route::get('/blogs/{blog}/edit',[BlogController::class ,'edit'])->name("blogs.edit");
Route::put('/blog/{blog}',[BlogController::class,'update'])->name('blog.update');
Route::delete('/blog/{blog}',[BlogController::class,'destroy'])->name('blogs.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
