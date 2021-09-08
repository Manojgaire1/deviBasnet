<?php

use Illuminate\Support\Facades\Route;
//front controllers
use App\Http\Controllers\Frontend\HomeController;
//admin controllers
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Activity\ActivityController;
use App\Http\Controllers\Admin\Activity\Type\TypeController;
use App\Http\Controllers\Admin\Timeline\TimelineController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Blog\Category\CategoryController;

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
Route::group(['prefix' => '/admin','middleware' => 'auth'],function(){
    //for the dashboard
    Route::get('',function(){
        return redirect()->route('admin.dashboard.index');
    });
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard.index');
    //for the banners
    Route::group(['prefix' => '/banners'],function(){
        Route::get('',[BannerController::class,'index'])->name('admin.banner.index');
        Route::post('/newBanner',[BannerController::class,'store'])->name('admin.banner.store');
        Route::get('/{bannerId}/edit',[BannerController::class,'edit'])->name('admin.banner.edit');
        Route::post('/{id}',[BannerController::class,'udpate'])->name('admin.banner.update');
    });

    //route for activity
    Route::group(['prefix' => '/activities'],function(){
        Route::get('',[ActivityController::class,'index'])->name('admin.activity.index');
        Route::get('/{activityId}/edit',[ActivityController::class,'edit'])->name('admin.activity.edit');
        Route::post('/newActivity',[ActivityController::class,'store'])->name('admin.activity.store');
        Route::post('/{id}',[ActivityController::class,'update'])->name('admin.activity.update');
        Route::delete('/{id}',[ActivityController::class,'destroy'])->name('admin.activity.destroy');
        //activity type
        Route::group(['prefix' => '/types'],function(){
            Route::get('',[TypeController::class,'index'])->name('admin.activity.type.index');
            Route::post('/newType',[TypeController::class,'store'])->name('admin.activity.type.store');
            Route::get('/{typeId}/edit',[TypeController::class,'edit'])->name('admin.activity.type.edit');
            Route::post('/{id}',[TypeController::class,'update'])->name('admin.activity.type.update');
            Route::delete('/{id}',[TypeController::class,'destroy'])->name('admin.activity.type.destroy');
        });
    });

    Route::group(['prefix' => '/timelines'],function(){
        Route::get('',[TimelineController::class,'index'])->name('admin.timeline.index');
        Route::get('/{timelineId}/edit',[TimelineController::class,'edit'])->name('admin.timeline.edit');
        Route::post('/newTimeline',[TimelineController::class,'store'])->name('admin.timeline.store');
        Route::post('/{id}',[TimelineController::class,'update'])->name('admin.timeline.update');
        Route::delete('/{id}',[TimelineController::class,'destroy'])->name('admin.timeline.destroy');
    });

    //route for activity
    Route::group(['prefix' => '/blogs'],function(){
        Route::get('',[BlogController::class,'index'])->name('admin.blog.index');
        Route::get('/{blogId}/edit',[BlogController::class,'edit'])->name('admin.blog.edit');
        Route::post('/newBlog',[BlogController::class,'store'])->name('admin.blog.store');
        Route::post('/{id}',[BlogController::class,'update'])->name('admin.blog.update');
        Route::delete('/{id}',[BlogController::class,'destroy'])->name('admin.blog.destroy');
        //activity type
        Route::group(['prefix' => '/categories'],function(){
            Route::get('',[CategoryController::class,'index'])->name('admin.blog.category.index');
            Route::post('/newCategory',[CategoryController::class,'store'])->name('admin.blog.category.store');
            Route::get('/{categoryId}/edit',[CategoryController::class,'edit'])->name('admin.blog.category.edit');
            Route::post('/{id}',[CategoryController::class,'update'])->name('admin.blog.category.update');
            Route::delete('/{id}',[CategoryController::class,'destroy'])->name('admin.blog.category.destroy');
        });
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
