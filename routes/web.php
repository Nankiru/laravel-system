<?php

use App\Http\Middleware\userAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LanguageController;

Route::get('login', [LoginController::class, 'login']);
Route::post('admin_register', [LoginController::class, 'admin_register']);

Route::post('admin_submit', [LoginController::class, 'admin_submit']);

Route::post('logout', [LoginController::class, 'logout']);
Route::get('/home', [LoginController::class, 'home']);
Route::post('/forgot_password', [LoginController::class, 'forgot_password']);




Route::post('user_login', [LoginController::class, 'user_login']);
Route::get('signin', [UserController::class, 'user_signin']);
Route::get('user_logout', [UserController::class, 'user_logout']);


Route::get('/index', [ProductController::class, 'index']);

Route::middleware([UserAuth::class])->group(function () {
    Route::get('/', [UserController::class, 'index']);

    Route::get('profile', [UserController::class, 'profileAdmin']);
    Route::get('update_admin/{id}', [LoginController::class, 'update_admin']);
    Route::post('update_admin_submit/{id}', [LoginController::class, 'update_admin_submit']);
    Route::get('users', [UserController::class, 'userList']);


    Route::get('form_product', [UserController::class, 'form_product']);
    Route::get('form', [UserController::class, 'formUser']);
    Route::post('form_submit', [UserController::class, 'formSubmit']);
    Route::get('/delete/{id}', [UserController::class, 'destroy']);
    
    Route::get('update_user/{id}', [UserController::class, 'update']);
    Route::post('update_submit/{id}', [UserController::class, 'update_submit']);
    Route::post('update_img_admin/{id}', [UserController::class, 'update_img_admin']);
    
    Route::post('/remove-from-cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
    
    // Route::post('add_to_cart/{id}', [CartController::class, 'addToCart']);
    Route::post('/add_to_cart/{id}', [CartController::class, 'addToCart']);
    
    // Route::post('/remove_from_cart/{id}', [CartController::class, 'removeFromCart']);
    Route::delete('/remove_from_cart/{id}', [CartController::class, 'removeFromCart']);
    
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    
    // ⁡⁢⁣⁢Products Route⁡
    
    Route::post('/add_brand', [ProductController::class, 'AddbrandCategory']);
    Route::get('/cart-view', [ProductController::class, 'CartView']);
    Route::get('/form_product', [ProductController::class, 'FormProduct']);
    Route::get('product', [ProductController::class, 'ProductList']);
    Route::get('seacrh_product', [ProductController::class, 'search']);
    Route::post('/add-product', [ProductController::class, 'addProduct']);
    Route::post('/update-product/{id}', [ProductController::class, 'UpdateProduct']);
    Route::get('product-detail/{id}', [ProductController::class, 'ProductDetail']);
    // Route::get('/index', [ProductController::class, 'index']);
    Route::get('/all-product/{category}/{brand}', [ProductController::class, 'filterByCategoryBrand']);
    Route::get('/all-product/{category}', [ProductController::class, 'filterByCategory']);
    
    // Delete Product
    Route::get('/delete-product/{id}', [ProductController::class, 'delete']);
    
    // Message Route
    // Auth::routes();

    Route::get('/ContactUs', action: [MessageController::class, 'ContactUs']);
    // Route::post('/contact_submit', action: [MessageController::class, 'contact_submit']);
    Route::post('/contact_submit', action: [MessageController::class, 'contact_submit']);




    // Route Search User
    Route::get('search', [UserController::class, 'search']);
    Route::get('search_index', [UserController::class, 'search_index']);

    Route::get('change', [LanguageController::class, 'changeLanguage'])->name('lang.change');

    

});


