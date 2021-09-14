<?php

use App\Http\Controllers\Admin\Activity\ActivityController;
//front controllers
use App\Http\Controllers\Admin\Activity\Type\TypeController;

//admin controllers
use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Blog\Category\CategoryController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Interest\InterestController;
use App\Http\Controllers\Admin\Page\PageController;
use App\Http\Controllers\Admin\Page\PageDetailController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Testimonial\TestimonialController;
use App\Http\Controllers\Admin\Timeline\TimelineController;
use App\Http\Controllers\Auth\LoginController;

//login routes
use App\Http\Controllers\Frontend\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('front.index');

//admin routes
Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {
    //for the dashboard
    Route::get('', function () {
        return redirect()->route('admin.dashboard.index');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
    //for the banners
    Route::group(['prefix' => '/banners'], function () {
        Route::get('', [BannerController::class, 'index'])->name('admin.banner.index');
        Route::post('/newBanner', [BannerController::class, 'store'])->name('admin.banner.store');
        Route::get('/{bannerId}/edit', [BannerController::class, 'edit'])->name('admin.banner.edit');
        Route::post('/{id}', [BannerController::class, 'update'])->name('admin.banner.update');
        Route::delete('/{id}', [BannerController::class, 'destroy'])->name('admin.banner.destroy');

    });

    //route for activity
    Route::group(['prefix' => '/activities'], function () {
        Route::get('', [ActivityController::class, 'index'])->name('admin.activity.index');
        Route::get('/{activityId}/edit', [ActivityController::class, 'edit'])->name('admin.activity.edit');
        Route::post('/newActivity', [ActivityController::class, 'store'])->name('admin.activity.store');
        Route::post('/{id}', [ActivityController::class, 'update'])->name('admin.activity.update');
        Route::delete('/{id}', [ActivityController::class, 'destroy'])->name('admin.activity.destroy');
        //activity type
        Route::group(['prefix' => '/types'], function () {
            Route::get('', [TypeController::class, 'index'])->name('admin.activity.type.index');
            Route::post('/newType', [TypeController::class, 'store'])->name('admin.activity.type.store');
            Route::get('/{typeId}/edit', [TypeController::class, 'edit'])->name('admin.activity.type.edit');
            Route::post('/{id}', [TypeController::class, 'update'])->name('admin.activity.type.update');
            Route::delete('/{id}', [TypeController::class, 'destroy'])->name('admin.activity.type.destroy');
        });
    });

    Route::group(['prefix' => '/timelines'], function () {
        Route::get('', [TimelineController::class, 'index'])->name('admin.timeline.index');
        Route::get('/{timelineId}/edit', [TimelineController::class, 'edit'])->name('admin.timeline.edit');
        Route::post('/newTimeline', [TimelineController::class, 'store'])->name('admin.timeline.store');
        Route::post('/{id}', [TimelineController::class, 'update'])->name('admin.timeline.update');
        Route::delete('/{id}', [TimelineController::class, 'destroy'])->name('admin.timeline.destroy');
    });

    //route for activity
    Route::group(['prefix' => '/blogs'], function () {
        Route::get('', [BlogController::class, 'index'])->name('admin.blog.index');
        Route::get('/{blogId}/edit', [BlogController::class, 'edit'])->name('admin.blog.edit');
        Route::post('/newBlog', [BlogController::class, 'store'])->name('admin.blog.store');
        Route::post('/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
        Route::delete('/{id}', [BlogController::class, 'destroy'])->name('admin.blog.destroy');
        //activity type
        Route::group(['prefix' => '/categories'], function () {
            Route::get('', [CategoryController::class, 'index'])->name('admin.blog.category.index');
            Route::post('/newCategory', [CategoryController::class, 'store'])->name('admin.blog.category.store');
            Route::get('/{categoryId}/edit', [CategoryController::class, 'edit'])->name('admin.blog.category.edit');
            Route::post('/{id}', [CategoryController::class, 'update'])->name('admin.blog.category.update');
            Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('admin.blog.category.destroy');
        });
    });
    //routes for the cms pages and my interest section
    Route::group(['prefix' => '/cms'], function () {
        Route::get('/about', [PageController::class, 'about'])->name('admin.cms.page.about.edit');

        // page route
        Route::group(['prefix' => '/pages'], function () {
            Route::get('', [PageController::class, 'index'])->name('admin.cms.page.index');
            Route::post('/', [PageController::class, 'addPage'])->name('admin.cms.page.store');
            Route::get('/{pageId}/edit', [PageController::class, 'edit'])->name('admin.cms.page.edit');

            Route::post('/{pageId}', [PageController::class, 'updatePage'])->name('admin.cms.page.update');
            Route::delete('/{pageId}', [PageController::class, 'destroy'])->name('admin.cms.page.destroy');
            Route::get('/all', [PageController::class, 'all'])->name('admin.cms.page.all');

        });
        // page details
        Route::group(['prefix' => '/page/details'], function () {
            Route::get('', [PageDetailController::class, 'index'])->name('admin.cms.page.detail.index');
            Route::post('/', [PageDetailController::class, 'store'])->name('admin.cms.page.detail.store');
            Route::get('/{pageDetailId}/edit', [PageDetailController::class, 'edit'])->name('admin.cms.page.detail.edit');

            Route::post('/{pageDetailId}', [PageDetailController::class, 'update'])->name('admin.cms.page.detail.update');
            Route::delete('/{pageDetailId}', [PageDetailController::class, 'destroy'])->name('admin.cms.page.detail.destroy');

        });

        // interest route
        Route::group(['prefix' => '/interests'], function () {
            Route::get('', [InterestController::class, 'index'])->name('admin.cms.interest.index');
            Route::post('/newInterest', [InterestController::class, 'store'])->name('admin.cms.interest.store');
            Route::get('/{interesId}/edit', [InterestController::class, 'edit'])->name('admin.cms.interest.edit');
            Route::post('/{interestId}', [InterestController::class, 'update'])->name('admin.cms.interest.update');
            Route::delete('/{interestId}', [InterestController::class, 'destroy'])->name('admin.cms.interest.destroy');
        });
    });

    //routes for the testimonials sections
    Route::group(['prefix' => '/testimonials'], function () {
        Route::get('', [TestimonialController::class, 'index'])->name('admin.testimonial.index');
        Route::get('/{testimonialId}/edit', [TestimonialController::class, 'edit'])->name('admin.testimonial.edit');
        Route::post('/newTestimonials', [TestimonialController::class, 'store'])->name('admin.testimonial.store');
        Route::post('/{id}', [TestimonialController::class, 'update'])->name('admin.testimonial.update');
        Route::delete('/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonial.destroy');
    });

    //route for the devi setting details
    Route::group(['prefix' => '/settings'], function () {
        Route::get('', [SettingController::class, 'edit'])->name('admin.settings.edit');
        Route::post('', [SettingController::class, 'update'])->name('admin.settings.update');
    });
});
//routes for the login and logout and forget password and others
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.validateLogin');
Route::get('/admin/password/reset', [SendPasswordResetEmails::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('/admin/password/reset', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.reset');
Route::post('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
