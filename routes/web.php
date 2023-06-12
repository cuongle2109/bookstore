<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\MultiFileUploadController;
use App\Http\Controllers\Mypage\ChangeAddressController;
use App\Http\Controllers\Mypage\ChangeEmailController;
use App\Http\Controllers\Mypage\ChangePasswordController;
use App\Http\Controllers\Mypage\HomeController;
use App\Http\Controllers\Mypage\ProductCategoryController;
use App\Http\Controllers\Mypage\ProductDetailController;
use App\Http\Controllers\Mypage\ProfileController;
use App\Http\Controllers\Mypage\ViewCartController;
use App\Http\Controllers\PaymentController;

use Illuminate\Support\Facades\Mail;
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

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];

    Mail::to('nguyennhatthongdev@gmail.com')->send(new \App\Mail\MyTestMail($details));

    dd("Email is Sent.");
});

Route::middleware('auth:sanctum')->group( function () {
    Route::middleware('role:admin')->group(function () {
        Route::group(['prefix' => 'admin/', 'Namespace' => 'Admin', 'as' => 'admin.'], function () {
            Route::resource('dashboard', DashboardController::class);
            Route::resource('user', UserController::class);
            Route::resource('banner', BannerController::class);
            Route::resource('order', OrderController::class);
            Route::post('order/{order}', [OrderController::class, 'accept'])->name('order.accept');
            Route::resource('product', ProductController::class);
            Route::resource('category', CategoryController::class);
            Route::resource('profile', App\Http\Controllers\Admin\ProfileController::class);
        });
    });
    Route::get('', [CustomAuthController::class, 'dashboard']);
    Route::get('payment-return', [PaymentController::class, 'return']);
    Route::post('save-multiple-files', [MultiFileUploadController::class, 'store']);
});

Route::group(['prefix' => 'mypage/','Namespace' => 'Mypage','as' => 'mypage.'], function (){
    Route::resource('home', HomeController::class)->names([
        'index' => 'mypage.home.index',
    ]);
    Route::resource('product-by-category', ProductCategoryController::class);
    Route::resource('product-detail', ProductDetailController::class);
    Route::resource('view-cart', ViewCartController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('change-email', ChangeEmailController::class);
    Route::resource('change-address', ChangeAddressController::class);
    Route::resource('change-password', ChangePasswordController::class);

});

Route::resource('payment', PaymentController::class);
