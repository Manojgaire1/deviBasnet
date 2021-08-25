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
Route:group(['prefix' => '/admin'],function(){
    //for the dashboard
    Route::get('',[DashboardController::class,'index'])->name('admin.dashboard.index');
    //for the banner
    Route::get('/banners',[BannerController::class,'index'])->name('admin.banner.index');
    Route::post('/banners',[BannerController::class,'index'])->name('admin.banner.store');
});
