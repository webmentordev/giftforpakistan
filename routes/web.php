<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Carts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Livewire\Dashboard\Dashboard;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\TrackController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SitemapController;

Route::get('/', Home::class)->name('home');
Route::get('/terms-of-service', [ServiceController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [ServiceController::class, 'policy'])->name('policy');


Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/blogs',[BlogController::class, 'index'])->name('blogs');
Route::get('/blog/{slug}', [BlogController::class, 'read_blog'])->name('blog.read');
Route::get('/blog/{tag}', [BlogController::class, 'blog_tags'])->name('blog.tag');

Route::get('/contact-us',[ContactController::class, 'index'])->name('contact');
Route::post('/contact-us',[ContactController::class, 'store']);
Route::get('/search',[ContactController::class, 'index'])->name('search');

//Auth Routes
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);
Route::get('/signup',[SignupController::class, 'index'])->name('signup');
Route::post('/signup',[SignupController::class, 'store']);
Route::post('/logout',[LogoutController::class, 'store'])->name('logout');

//User Routes
Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/setting', [ProfileController::class, 'setting'])->name('setting');
    Route::put('/profile/setting/update', [ProfileController::class, 'settingUpdate'])->name('setting.update');
    Route::get('/profile/orders', [ProfileController::class, 'orders'])->name('orders');
    Route::get('/profile/activity-log', [ProfileController::class, 'logs'])->name('logs');
    Route::get('/shopping-cart', Carts::class)->name('cart');
    Route::put('/shopping-cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/checkout', [CheckOutController::class, 'store'])->name('checkout');
});

//Tracking Order Routes
Route::get('/order-tracking', [TrackController::class, 'index'])->name('track.order');
Route::post('/order-tracking', [TrackController::class, 'store']);

//Admin Routes
Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->group(function(){
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/create-product', [ProductController::class, 'create_index'])->name('create.product');
    Route::post('/create-product', [ProductController::class, 'create']);
    Route::get('/update-product/{id}', [ProductController::class, 'update_index'])->name('update.product');
    Route::put('/update-product/{id}', [ProductController::class, 'update']);
    Route::get('/create-blog', [BlogController::class, 'create_index'])->name('blog.create');
    Route::post('/create-blog', [BlogController::class, 'store']);
    Route::post('/image_upload', [BlogController::class, 'upload'])->name('upload');
    Route::get('/update-blog/{id}', [BlogController::class, 'updateIndex'])->name('blog.update');
    Route::put('/update-blog/{id}', [BlogController::class, 'update'])->name('blog.update.now');
});

//Email Verification Routes
Route::get('/email/verify', [EmailVerificationController::class, 'index'])
->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'emailVerify'])
->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [EmailVerificationController::class, 'verify'])
->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//Password Reset Routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])
->middleware('guest')->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'emailVerify'])
->middleware('guest')->name('password.reset');
Route::post('/reset-password',[ForgotPasswordController::class, 'resetPassword'])
->middleware('guest')->name('password.update');


Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');