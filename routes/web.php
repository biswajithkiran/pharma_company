<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UpdateController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('guest')->get('/register', [RegisterController::class, 'new'])->name('register');

Route::middleware(['auth', 'role:user'])->group(function () {
    // Route::get('/user/dashboard', function () {
    //     return view('user.dashboard');
    // });

    Route::get('user/dashboard', [UserController::class, 'user_dashboard'])->name('user.dashboard');
    Route::get('user/updates', [UpdateController::class,'index'])->name('user.updates');
    Route::post('updates/save', [UpdateController::class, 'store'])->name('updates.save');
    Route::get('updates/create', [UpdateController::class, 'create'])->name('updates.create');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Route::get('/admin/dashboard', function () {
    //     return view('admin.dashboard');
    // });
    Route::get('admin/dashboard', [UserController::class, 'admin_dashboard'])->name('admin.dashboard');
    Route::get('admin/updates', [UpdateController::class,'listAdminUpdates'])->name('admin.updates');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
