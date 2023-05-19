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

// Route::get('/', function () {
//     return view('index');
// })->name('index');
// Route::get('/profile', function () {

// });
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/profile', [App\Http\Controllers\UserprofileController::class, 'index'])->name('userprofile')->middleware('auth');
Route::post('/update_profile', [App\Http\Controllers\UserprofileController::class, 'update'])->name('profile.updatesave');

Route::get('/test', [App\Http\Controllers\HomeController::class, 'atr']);
Route::get('/about', [App\Http\Controllers\HomeController::class, 'aboutUs'])->name('about');
Route::get('/terms_conditions', [App\Http\Controllers\HomeController::class, 'tremsCondition'])->name('terms_condition');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//add to cart

Route::post('/add_to_cart', [App\Http\Controllers\CartController::class, 'index'])->name('addtocart');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'show'])->name('cart');
Route::post('/cart-remove/{rowid}', [App\Http\Controllers\CartController::class, 'cartremove'])->name('cartremove');

Route::post('/cart-update/{rowid}', [App\Http\Controllers\CartController::class, 'cartupdate'])->name('cartupdate');
Route::get('/testcart', [App\Http\Controllers\CartController::class, 'carttest']);
//add to cart finish

//search product with menu and sub menu
Route::get('/shop_with_submenu/{slug}', [App\Http\Controllers\ShopController::class, 'subnemuSearch'])->name('shop.with.submenu');
Route::get('/shop_with_menu/{slug}', [App\Http\Controllers\ShopController::class, 'menuSearch'])->name('shop.with.menu');
//end search product menu and submenu

//track order in home page
Route::post('/track_order', [App\Http\Controllers\HomeController::class, 'trackorder'])->name('trackorder');
//track order end
//single product show
Route::get('/product/{slug}', [App\Http\Controllers\ShopController::class, 'show'])->name('product');

//product show with brand name
Route::get('/brand/{slug}', [App\Http\Controllers\ShopController::class, 'brandProduct'])->name('brand.single.product');

// SSLCOMMERZ Start
Route::get('/example1', [App\Http\Controllers\SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::post('/example', [App\Http\Controllers\SslCommerzPaymentController::class, 'CheckoutGuest'])->name('proceed.checkoutGuest');
Route::post('/example2', [App\Http\Controllers\SslCommerzPaymentController::class, 'exampleHostedCheckoutUser'])->name('proceed.checkoutUser')->middleware('auth');

Route::post('/pay', [App\Http\Controllers\SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [App\Http\Controllers\SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [App\Http\Controllers\SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [App\Http\Controllers\SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [App\Http\Controllers\SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [App\Http\Controllers\SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ EN

Route::prefix('super')->group(function () {
    Route::get('/home', [App\Http\Controllers\Admin\AdminController::class, 'index']);
    Route::get('/', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('login.admin');
    Route::post('/', [App\Http\Controllers\Admin\LoginController::class, 'login']);
    // Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'deshboard'])->name('super.dashboard');

    Route::get('/menu', [App\Http\Controllers\Admin\MenuController::class, 'index'])->name('super.menu');
    Route::post('/manu/store', [App\Http\Controllers\Admin\MenuController::class, 'store'])->name('super.menu.store');
    // Route::get('/manu/update/{id}', [App\Http\Controllers\Admin\MenuController::class, 'edit'])->name('super.menu.update');
    Route::post('/manu/update_save/{id}', [App\Http\Controllers\Admin\MenuController::class, 'update'])->name('super.menu.updatesave');
    Route::delete('/manu/delete/{id}', [App\Http\Controllers\Admin\MenuController::class, 'destroy'])->name('super.menu.delete');
    Route::post('/sub_manu/store', [App\Http\Controllers\Admin\SubmenuController::class, 'store'])->name('super.sub_menu.store');
    // Route::get('/manu/update/{id}', [App\Http\Controllers\Admin\MenuController::class, 'edit'])->name('super.sub_menu.update');
    Route::post('/sub_manu/update_save/{id}', [App\Http\Controllers\Admin\SubmenuController::class, 'update'])->name('super.sub_menu.updatesave');
    Route::delete('/sub_manu/delete/{id}', [App\Http\Controllers\Admin\SubmenuController::class, 'destroy'])->name('super.sub_menu.delete');

    //product section
    Route::get('/product', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('super.product');
    Route::get('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('super.product.create');
    Route::post('/product/store', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('super.product.store');
    Route::get('/product/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('super.product.update');
    Route::post('/product/update_save/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('super.product.updatesave');
    Route::delete('/product/delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('super.product.delete');

    Route::get('/product/active/{id}', [App\Http\Controllers\Admin\ProductController::class, 'active'])->name('super.product.active');
    Route::get('/product/deactivate/{id}', [App\Http\Controllers\Admin\ProductController::class, 'deactive'])->name('super.product.deactivate');

    //tag sectionj
    Route::get('/tag', [App\Http\Controllers\Admin\TagController::class, 'index'])->name('super.tag');
    Route::post('/tag/store', [App\Http\Controllers\Admin\TagController::class, 'store'])->name('super.tag.store');
    Route::post('/tag/update_save/{id}', [App\Http\Controllers\Admin\TagController::class, 'update'])->name('super.tag.updatesave');

    //volume sectionj
    Route::get('/volume', [App\Http\Controllers\Admin\VolumeController::class, 'index'])->name('super.volume');
    Route::post('/volume/store', [App\Http\Controllers\Admin\VolumeController::class, 'store'])->name('super.volume.store');
    Route::post('/volume/update_save/{id}', [App\Http\Controllers\Admin\VolumeController::class, 'update'])->name('super.volume.updatesave');

    //coupon section
    Route::get('/coupon', [App\Http\Controllers\Admin\CouponController::class, 'index'])->name('super.coupon');
    Route::post('/coupon/store', [App\Http\Controllers\Admin\CouponController::class, 'store'])->name('super.coupon.store');
    Route::get('/coupon/update/{id}', [App\Http\Controllers\Admin\CouponController::class, 'edit'])->name('super.coupon.update');
    Route::post('/coupon/update_save/{id}', [App\Http\Controllers\Admin\CouponController::class, 'update'])->name('super.coupon.updatesave');

    Route::get('/coupon/active/{id}', [App\Http\Controllers\Admin\CouponController::class, 'active'])->name('super.coupon.active');
    Route::get('/coupon/deactivate/{id}', [App\Http\Controllers\Admin\CouponController::class, 'deactive'])->name('super.coupon.deactivate');

    Route::delete('/coupon/delete/{id}', [App\Http\Controllers\Admin\CouponController::class, 'destroy'])->name('super.coupon.delete');


    //Brand section
    Route::get('/brand', [App\Http\Controllers\Admin\BrandController::class, 'index'])->name('super.brand');
    Route::post('/brand/store', [App\Http\Controllers\Admin\BrandController::class, 'store'])->name('super.brand.store');
    Route::get('/brand/update/{id}', [App\Http\Controllers\Admin\BrandController::class, 'edit'])->name('super.brand.update');
    Route::post('/brand/update_save/{id}', [App\Http\Controllers\Admin\BrandController::class, 'update'])->name('super.brand.updatesave');

    Route::delete('/brand/delete/{id}', [App\Http\Controllers\Admin\BrandController::class, 'destroy'])->name('super.brand.delete');

    Route::get('/brand/active/{id}', [App\Http\Controllers\Admin\BrandController::class, 'active'])->name('super.brand.active');
    Route::get('/brand/deactivate/{id}', [App\Http\Controllers\Admin\BrandController::class, 'deactive'])->name('super.brand.deactivate');

    //order section
    Route::get('/order', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('super.order');
    Route::post('/order/order_status_change/{id}', [App\Http\Controllers\Admin\OrderController::class, 'status_change'])->name('super.order.order_status_change');
    Route::post('/order/email_sent', [App\Http\Controllers\Admin\OrderController::class, 'email_sent'])->name('super.order.email.sent');
    Route::post('/order/pdf/{id}', [App\Http\Controllers\Admin\OrderController::class, 'orderpdf'])->name('super.order.pdf');

    //user section
    Route::get('/user', [App\Http\Controllers\Admin\UserManageController::class, 'index'])->name('super.user');
});
