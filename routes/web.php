<?php

use Illuminate\Support\Facades\Route;
//front controllers
use App\Http\Controllers\Frontend\HomeController;
//admin controllers
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Banner\BannerController;

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

Route::get('/', [HomeController::class,'index'])->name('front.index');

//admin routes
Route::group(['prefix' => '/admin'],function(){
    //for the dashboard
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard.index');
    //for the banners
    Route::group(['prefix' => '/banners'],function(){
        Route::get('',[BannerController::class,'index'])->name('admin.banner.index');
        Route::post('/newBanner',[BannerController::class,'store'])->name('admin.banner.store');
        Route::get('/{bannerId}/edit',[BannerController::class,'edit'])->name('admin.banner.edit');
        Route::post('/{bannerId}/',[BannerController::class,'udpate'])->name('admin.banner.update');
    });
});
