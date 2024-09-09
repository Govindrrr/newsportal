<?php

use App\Http\Controllers\admin\AdvertiseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\frontned\pageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [pageController::class, 'home'])->name('home');
Route::get('/category/{slug}', [pageController::class, 'category'])->name('cat');
Route::get('/news/{id}', [pageController::class, 'news'])->name('news');
Route::get('/search', [pageController::class, 'search'])->name('search');




//Admindashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('admin')->group(function () {
        Route::resource('/admin/company', CompanyController::class)->names('company');
        Route::resource('/admin/category', CategoryController::class)->names('category');
        Route::resource('/admin/advertise', AdvertiseController::class)->names('advertise');
        Route::resource('/admin/post', PostController::class)->names('post');
        Route::resource('/admin/user', UserController::class)->names('user');
        Route::get('/export', [UserController::class,'export'])->name('export');

    });
});

require __DIR__ . '/auth.php';
