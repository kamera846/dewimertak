<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventController;

use App\Models\Profile;
use App\Models\User;
use App\Models\Post;
use App\Models\Gallery;

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

Route::get('/about', [HomeController::class, 'about']);
Route::get('/posts', [HomeController::class, 'post']);
Route::get('/posts/{post:slug}', [HomeController::class, 'postDetail']);
Route::get('/galleries', [HomeController::class, 'gallery']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/contact', [HomeController::class, 'contactSend']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function() {
    return view('dashboard.home', [
        'dashboardPage' => true,
        'profile' => Profile::get()[0],
        'users' => User::count(),
        'posts' => Post::count(),
        'galleries' => Gallery::count()
    ]);
})->middleware('auth');

Route::resource('/dashboard/users', UserController::class)->middleware('auth');

Route::resource('/dashboard/posts', PostController::class)->middleware('auth'); 

Route::resource('/dashboard/post-categories', PostCategoryController::class)->middleware('auth');

Route::resource('/dashboard/galleries', GalleryController::class)->middleware('auth');

Route::resource('/dashboard/carousels', CarouselController::class)->middleware('auth');

Route::resource('/dashboard/features', FeatureController::class)->middleware('auth');

Route::get('/dashboard/about', [AboutController::class, 'show'])->middleware('auth');
Route::get('/dashboard/about/edit', [AboutController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/about/{about}', [AboutController::class, 'update'])->middleware('auth');

Route::resource('/dashboard/events', EventController::class)->middleware('auth');

Route::get('/dashboard/profile', [ProfileController::class, 'show'])->middleware('auth');
Route::get('/dashboard/profile/edit', [ProfileController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/profile/{profile}', [ProfileController::class, 'update'])->middleware('auth');

Route::resource('/dashboard/socials', SocialController::class)->middleware('auth');
