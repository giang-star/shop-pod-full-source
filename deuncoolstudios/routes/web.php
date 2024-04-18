<?php

use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\BrandController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Front\AccountController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckOutController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductRatingController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ForgetPasswordController;
use App\Models\Brand;
use App\Models\User;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    #Client 
Route::get('/', [HomeController::class, 'index']);
// Shop
Route::prefix('/shop')->group(function(){
    Route::get('product/{id}', [ShopController::class, 'show']);
    Route::post('product/{id}', [ShopController::class, 'postComment']);
    
    Route::get('/', [ShopController::class, 'index']);
    
    Route::get('/{categoryName}', [ShopController::class, 'category']);
});

//Blog
Route::prefix('/blog')->group(function(){

    Route::get('/', [BlogController::class, 'index']);
    Route::get('detail/{id}', [BlogController::class, 'show']);
    Route::post('detail/{id}', [BlogController::class, 'postComment']);

});
#  Cart
Route::prefix('/cart')->group(function(){
    Route::get('add/{id}',[CartController::class, 'add']);
    Route::get('/',[CartController::class, 'index']);
    Route::get('/delete/{rowId}',[CartController::class, 'delete']);
    Route::get('/destroy',[CartController::class, 'destroy']);
    Route::get('/update',[CartController::class, 'update']);
});
Route::prefix('/checkout')->group(function(){
    Route::get('/', [CheckOutController::class, 'index']);
    Route::post('/', [CheckOutController::class, 'addOrder']);
    Route::get('/vnPayCheck', [CheckOutController::class, 'vnPayCheck']);
    Route::get('/result', [CheckOutController::class, 'result']);
});
# Account 
Route::prefix('account')->group(function(){
    Route::get("login",[AccountController::class, 'login']);
    Route::post("login",[AccountController::class, 'checkLogin']);
    Route::get("logout",[AccountController::class, 'logout']);
    Route::get("active/{user}/{token}",[AccountController::class, 'activeAccount'])->name('activeAccount');
    Route::get("register",[AccountController::class, 'register']);
    Route::post("register",[AccountController::class, 'postRegister']);

    Route::prefix('my-order')->middleware('CheckMemberLogin')->group(function(){
        Route::get('/', [AccountController::class, 'myOrderIndex']);
        Route::get('/{id}', [AccountController::class, 'myOrderShow']);
    });
    Route::get('manage', [AccountController::class, 'manageAccount'])->middleware('CheckMemberLogin');
    Route::get('changePassword', [AccountController::class, 'changePassword'])->middleware('CheckMemberLogin');
    Route::put('changePassword', [AccountController::class, 'updatePassword'])->middleware('CheckMemberLogin');
    Route::put('manage/{id}', [AccountController::class, 'updateUser']);

    Route::get('forgetPassword', [ForgetPasswordController::class, 'index']);
    Route::post('forgetPassword', [ForgetPasswordController::class, 'sendLink']);
    Route::get('resetPassword/{token}', [ForgetPasswordController::class, 'show'])->name('resetPassword');;
    Route::post('resetPassword', [ForgetPasswordController::class, 'changePassword']);


});

Route::get('contact', [HomeController::class, 'contact']);
    # Dashbroad
Route::prefix('admin')->middleware('CheckAdminLogin')->group(function(){
    Route::get('/', [AdminHomeController::class, 'index']);
    Route::resource('user', UserController::class);
    Route::resource('category', ProductCategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('product', ProductController::class);
    Route::resource('product/{product_id}/image', ProductImageController::class);
    Route::resource('product/{product_id}/detail', ProductDetailController::class);
    Route::resource('order', OrderController::class);
    Route::get('product/{product_id}/rating', [ProductRatingController::class, 'index']);
    Route::delete('product/{product_id}/rating/{product_rating_id}', [ProductRatingController::class, 'destroy']);
    Route::resource('blog', AdminBlogController::class);
    Route:: prefix('login')->group(function(){
        Route::get('/', [AdminHomeController::class, 'getLogin'])->withoutMiddleware('CheckAdminLogin');
        Route::post('/', [AdminHomeController::class, 'postLogin'])->withoutMiddleware('CheckAdminLogin');
    });
    Route::get('logout', [AdminHomeController::class, 'logout']);
});

