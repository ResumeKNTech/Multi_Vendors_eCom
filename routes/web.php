<?php

use App\Http\Controllers\Client\AboutUsController;
use App\Http\Controllers\Client\Auth\LoginController;
use App\Http\Controllers\Client\Auth\RegisterController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ContactUsController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PostCommentController;
use App\Http\Controllers\Client\ProductReviewController;
use App\Http\Controllers\Client\WishListController;
use Illuminate\Support\Facades\Route;



// ? Route đăng nhập client
Route::prefix('client')->name('client.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);











});
    Route::get('/', [HomeController::class, 'index'])->name('index');
// Route liên quan đến Blog
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/blog-detail/{slug}', [BlogController::class, 'blogDetail'])->name('blog.detail');
Route::get('/blog/search', [BlogController::class, 'blogSearch'])->name('blog.search');
Route::post('/blog/filter', [BlogController::class, 'blogFilter'])->name('blog.filter');
Route::get('blog-cat/{slug}', [BlogController::class, 'blogByCategory'])->name('blog.category');
Route::get('blog-tag/{slug}', [BlogController::class, 'blogByTag'])->name('blog.tag');
Route::post('post/{slug}/comment', [PostCommentController::class, 'store'])->name('post-comment.store');
Route::resource('/comment', 'PostCommentController');



Route::get('about-us', [AboutUsController::class, 'aboutUs'])->name('about-us');
Route::get('contact-us', [ContactUsController::class, 'contactUs'])->name('contact-us');
Route::post('/contact/message', [ContactUsController::class, 'store'])->name('contact.store');
Route::get('product-grids', [ClientController::class, 'productGrids'])->name('product-grids');
Route::match(['get', 'post'], '/filter', [ClientController::class, 'productFilter'])->name('shop.filter');
Route::get('/product-cat/{slug}', [ClientController::class, 'productCat'])->name('product-cat');
Route::get('/product-sub-cat/{slug}/{sub_slug}', [ClientController::class, 'productSubCat'])->name('product-sub-cat');
Route::get('/product-lists', [ClientController::class, 'productLists'])->name('product-lists');
Route::get('product-detail/{slug}', [ClientController::class, 'productDetail'])->name('product-detail');
Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/product-brand/{brand_name}', [ClientController::class, 'productBrand'])->name('product-brand');
Route::get('product-detail/{slug}', [ClientController::class, 'productDetail'])->name('product-detail');
Route::post('product/search', [ClientController::class, 'productSearch'])->name('product.search');


// Product Review
Route::resource('/review', 'ProductRe');
Route::post('product/{slug}/review', [ProductReviewController::class, 'store'])->name('review.store');

// Cart section
Route::get('/add-to-cart/{slug}', [CartController::class, 'addToCart'])->name('add-to-cart')->middleware('check_login_customer');
Route::post('/add-to-cart', [CartController::class, 'singleAddToCart'])->name('single-add-to-cart')->middleware('check_login_customer');
Route::get('cart-delete/{id}', [CartController::class, 'cartDelete'])->name('cart-delete');
Route::post('cart-update', [CartController::class, 'cartUpdate'])->name('cart.update');
Route::get('/wishlist/{slug}', [WishListController::class, 'wishlist'])->name('add-to-wishlist')->middleware('check_login_customer');
Route::get('wishlist-delete/{id}', [WishListController::class, 'wishlistDelete'])->name('wishlist-delete');
Route::get('/cart', function () {
    return view('client.pages.cart');
})->name('cart');
Route::middleware(['check_login_customer'])->group(
    function () {
        Route::prefix('/')->name('client.')->group(function () {
        });
    }
);
