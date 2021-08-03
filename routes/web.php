<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\frontend\IndexController;
use App\Models\User;



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

Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){
    Route::get('/login',[AdminController::class,'loginForm']);
    Route::post('/login',[AdminController::class,'store'])->name('admin.login');

});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//all admin routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
     $id=Auth::user()->id;
     $user=User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');



Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');

Route::get('/admin/profile',[AdminProfileController::class,'adminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit',[AdminProfileController::class,'adminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/update',[AdminProfileController::class,'adminProfileUpdate'])->name('admin.profile.update');
Route::get('/admin/profile/change/password',[AdminProfileController::class,'adminProfileChangePassword'])->name('admin.profile.change.password');
Route::post('/admin/profile/update/password',[AdminProfileController::class,'adminProfileUpdatePassword'])->name('update.change.password');

//users routes
Route::get('/',[IndexController::class,'index']);
Route::get('/user/logout',[IndexController::class,'userLogout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class,'userProfile'])->name('user.profile');
Route::post('/user/profile/store',[IndexController::class,'userProfileStore'])->name('user.profile.store');
Route::get('/user/profile/change/password',[IndexController::class,'userProfilechangepass'])->name('change.password');
Route::post('/user/profile/update/password',[IndexController::class,'userUpdatepass'])->name('user.update.password');