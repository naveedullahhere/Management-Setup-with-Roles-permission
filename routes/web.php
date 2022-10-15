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

Route::fallback(function () {

    return view("404");

});

Route::get('/', function () {
    return view('home');
});


Route::middleware(['auth'])
    ->group(function () {
//        Route::resource('/',App\Http\Controllers\HomeController::class);

//Route::group(['middleware' => ['auth']], function() {
        Route::resource('admin/roles', App\Http\Controllers\RoleController::class);
        Route::resource('admin/users', App\Http\Controllers\UserController::class);
        Route::resource('admin/products', App\Http\Controllers\ProductController::class);
        Route::resource('admin/dashboard',App\Http\Controllers\HomeController::class);

        Route::resource('admin/countries',CountryController::class);


//    Categories Routes


        Route::resource('admin/categories',CategoriesController::class);

        //keyword
        Route::resource('admin/keyword',App\Http\Controllers\Management\KeywordController::class);

        //blog
        Route::resource('admin/post',BlogController::class);

        //Store
        Route::resource('admin/store',StoreController::class);

        //video
        Route::resource('admin/videos',VideoshowController::class);

        //slider
        Route::resource('admin/slider',SliderController::class);

        //testimonial
        Route::resource('admin/testimonial',App\Http\Controllers\Management\TestimonialController::class);

        //userinfo
        Route::resource('admin/user-info',UserinfoController::class);

        //pages
        Route::resource('admin/pages',PageController::class);

        Route::resource('admin/contacts',App\Http\Controllers\Management\ContactController::class);

        Route::get('admin/subscriber',[App\Http\Controllers\Management\ContactController::class,'subscriber']);

        //coupon
        Route::resource('admin/coupon',CouponController::class);
        Route::resource('admin/theme-setting', App\Http\Controllers\Management\ThemeSettingsController::class);
        Route::post('admin/theme-setting-fields', [App\Http\Controllers\Management\ThemeSettingsController::class,'theme_setting_fields']);





    });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
