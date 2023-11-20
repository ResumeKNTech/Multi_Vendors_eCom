<?php

//TODO Import necessary classes
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\{
    AboutUsController,
    Auth\LoginController,
    Auth\RegisterController,
    BlogController,
    CartController,
    ClientController,
    ContactUsController,
    HomeController,
    OrderController,
    PostCommentController,
    ProductReviewController,
    WishListController
};

//TODO Client Authentication Routes
Route::prefix('client')->name('client.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

//TODO Client Main Page Route
Route::get('', [ClientController::class, 'index'])->name('index');

//TODO Blog Routes
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/blog-detail/{slug}', [BlogController::class, 'blogDetail'])->name('blog.detail');
Route::get('/blog/search', [BlogController::class, 'blogSearch'])->name('blog.search');
Route::post('/blog/filter', [BlogController::class, 'blogFilter'])->name('blog.filter');
Route::get('blog-cat/{slug}', [BlogController::class, 'blogByCategory'])->name('blog.category');
Route::get('blog-tag/{slug}', [BlogController::class, 'blogByTag'])->name('blog.tag');
Route::post('post/{slug}/comment', [PostCommentController::class, 'store'])->name('post-comment.store');
Route::resource('/comment', PostCommentController::class);

//TODO Static Pages Routes
Route::get('about-us', [AboutUsController::class, 'aboutUs'])->name('about-us');
Route::get('contact-us', [ContactUsController::class, 'contactUs'])->name('contact-us');
Route::post('/contact/message', [ContactUsController::class, 'store'])->name('contact.store');

//TODO Product Routes
Route::get('product-grids', [ClientController::class, 'productGrids'])->name('product-grids');
Route::match(['get', 'post'], '/filter', [ClientController::class, 'productFilter'])->name('shop.filter');
Route::get('/product-cat/{slug}', [ClientController::class, 'productCat'])->name('product-cat');
Route::get('/product-sub-cat/{slug}/{sub_slug}', [ClientController::class, 'productSubCat'])->name('product-sub-cat');
Route::get('/product-lists', [ClientController::class, 'productLists'])->name('product-lists');
Route::get('product-detail/{slug}', [ClientController::class, 'productDetail'])->name('product-detail');
Route::get('/product-brand/{brand_name}', [ClientController::class, 'productBrand'])->name('product-brand');
Route::post('product/search', [ClientController::class, 'productSearch'])->name('product.search');

//TODO Cart Routes
Route::get('/add-to-cart/{slug}', [CartController::class, 'addToCart'])->name('add-to-cart')->middleware('check_login_customer');
Route::post('/add-to-cart', [CartController::class, 'singleAddToCart'])->name('single-add-to-cart')->middleware('check_login_customer');
Route::get('cart-delete/{id}', [CartController::class, 'cartDelete'])->name('cart-delete');
Route::post('cart-update', [CartController::class, 'cartUpdate'])->name('cart.update');
Route::get('/cart', function () {
    return view('client.pages.cart');
})->name('cart');

//TODO Wishlist Routes
Route::get('/wishlist', function () {
    return view('client.pages.wishlist');
})->name('wishlist');
Route::get('/wishlist/{slug}', [WishListController::class, 'wishlist'])->name('add-to-wishlist')->middleware('check_login_customer');
Route::get('wishlist-delete/{id}', [WishListController::class, 'wishlistDelete'])->name('wishlist-delete');

//TODO Checkout Route
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('check_login_customer');

//TODO Review Routes
Route::resource('/review', ProductReviewController::class);
Route::post('product/{slug}/review', [ProductReviewController::class, 'store'])->name('review.store');

//TODO Order Routes
Route::post('cart/order', [OrderController::class, 'store'])->name('cart.order');
Route::get('order/pdf/{id}', [OrderController::class, 'pdf'])->name('order.pdf');
Route::get('/income', [OrderController::class, 'incomeChart'])->name('product.order.income');
Route::get('/product/track', [OrderController::class, 'orderTrack'])->name('order.track');
Route::post('product/track/order', [OrderController::class, 'productTrackOrder'])->name('product.track.order');

//TODO User Section Routes
Route::group(['prefix' => '/user', 'middleware' => ['check_login_customer']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('user');
    //TODO Order Routes for User
    Route::get('/order', [HomeController::class, 'orderIndex'])->name('user.order.index');
    Route::get('/order/show/{id}', [HomeController::class, 'orderIndex'])->name('user.order.show');
    Route::delete('/order/delete/{id}', [HomeController::class, 'userOrderDelete'])->name('user.order.delete');
    //TODO Product Review Routes for User
    Route::get('/user-review', [HomeController::class, 'productReviewIndex'])->name('user.productreview.index');
    Route::delete('/user-review/delete/{id}', [HomeController::class, 'productReviewDelete'])->name('user.productreview.delete');
    Route::get('/user-review/edit/{id}', [HomeController::class, 'productReviewEdit'])->name('user.productreview.edit');
    Route::patch('/user-review/update/{id}', [HomeController::class, 'productReviewUpdate'])->name('user.productreview.update');
    //TODO Post Comment Routes for User
    Route::get('user-post/comment', [HomeController::class, 'userComment'])->name('user.post-comment.index');
    Route::delete('user-post/comment/delete/{id}', [HomeController::class, 'userCommentDelete'])->name('user.post-comment.delete');
    Route::get('user-post/comment/edit/{id}', [HomeController::class, 'userCommentEdit'])->name('user.post-comment.edit');
    Route::patch('user-post/comment/udpate/{id}', [HomeController::class, 'userCommentUpdate'])->name('user.post-comment.update');
});
