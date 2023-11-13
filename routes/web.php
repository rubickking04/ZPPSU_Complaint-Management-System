<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\Auth\LoginController as AuthUserLogin;
use App\Http\Controllers\User\Auth\RegisterController as AuthUserRegister;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\User\MessageController as UserMessageController;
use App\Http\Controllers\User\ReplyController as UserReplyController;
use App\Http\Controllers\User\ComplainController as UserComplainController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\User\PersonalInformationController as UserPersonalInformationController;
use App\Http\Controllers\User\Auth\LogoutController as AuthUserLogout;


use App\Http\Controllers\Admin\Auth\LoginController as AuthAdminLogin;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ReplyController as AdminReplyController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\ComplainController as AdminComplainController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\Auth\LogoutController as AuthAdminLogout;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});

Route::group(['middleware' => 'prevent-back-history'], function () {
    /*
    |--------------------------------------------------------------------------
    | User Web Routes
    |--------------------------------------------------------------------------
    */
    Route::controller(AuthUserLogin::class)->group( function() {
        Route::get('/auth/login', 'index')->name('user.login')->middleware('guest:user');
        Route::post('/auth/login', 'login')->name('user.auth.login');
    });
    Route::controller(AuthUserRegister::class)->group( function() {
        Route::get('/auth/register', 'index')->name('user.register')->middleware('guest:user');
        Route::post('/auth/register', 'register')->name('user.auth.register');
    });
    Route::middleware('auth')->group(function () {
        Route::controller(UserHomeController::class)->group( function() {
            Route::get('/home', 'index')->name('user.home');
        });
        Route::controller(UserComplainController::class)->group( function() {
            Route::get('/complain', 'index')->name('user.complain');
            Route::post('/complain/create', 'store')->name('user.complain.create');
            Route::post('/tmp-upload', 'tmpUpload')->name('tmpUpload');
            Route::get('/complains', 'complain')->name('user.complains');
        });
        Route::controller(UserMessageController::class)->group(function() {
            Route::get('/message', 'index')->name('user.messages');
            Route::get('/message/view/{id}', 'show')->name('user.view.messages');
            Route::post('/message', 'store')->name('user.message');
        });
        Route::controller(UserReplyController::class)->group(function() {
            Route::post('/reply', 'store')->name('user.reply');
        });
        Route::controller(UserProfileController::class)->group( function() {
            Route::get('/profile', 'index')->name('user.profile');
        });
        Route::controller(UserPersonalInformationController::class)->group( function() {
            Route::post('/personal/info', 'store')->name('user.personal.info');
            Route::post('/personal/info/update/{id}', 'update')->name('user.update.personal.info');
        });
        Route::controller(AuthUserLogout::class)->group(function() {
            Route::post('/auth/logout', 'logout')->name('user.logout');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Admin Web Routes
    |--------------------------------------------------------------------------
    */
    Route::controller(AuthAdminLogin::class)->group( function() {
        Route::get('/admin/login', 'index')->name('admin.login')->middleware('guest:admin');
        Route::post('/admin/login', 'login')->name('admin.auth.login');
    });
    Route::middleware('auth:admin')->group(function () {
        Route::controller(AdminHomeController::class)->group(function() {
            Route::get('/admin/home', 'index')->name('admin.home');
        });
        Route::controller(AdminMessageController::class)->group(function() {
            Route::get('/admin/message', 'index')->name('admin.messages');
            Route::get('/admin/view/{id}', 'show')->name('admin.view.messages');
            Route::post('/admin/message', 'store')->name('admin.message');
        });
        Route::controller(AdminReplyController::class)->group(function() {
            Route::post('/admin/reply', 'store')->name('admin.reply');
        });
        Route::controller(AdminUserController::class)->group(function() {
            Route::get('/admin/user', 'index')->name('admin.user');
            Route::get('/admin/user/destroy/{id}', 'destroy')->name('admin.users.delete');
        });
        Route::controller(AdminComplainController::class)->group(function() {
            Route::get('/admin/complain', 'index')->name('admin.complain');
            Route::get('/admin/complain/destroys/{id}', 'destroy')->name('admin.complains.destroy');
            Route::get('/admin/complain/soft_deletes/{id}', 'soft_delete')->name('admin.complains.soft_delete');
        });
        Route::controller(AuthAdminLogout::class)->group(function() {
            Route::post('/admin/logout', 'logout')->name('admin.logout');
        });
    });
});
