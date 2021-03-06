<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SliderController;
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

Route::middleware(['auth:admin'])->group(function(){
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard')->middleware('auth:admin');

//all admin routes

Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');

Route::get('/admin/profile',[AdminProfileController::class,'adminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit',[AdminProfileController::class,'adminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/update',[AdminProfileController::class,'adminProfileUpdate'])->name('admin.profile.update');
Route::get('/admin/profile/change/password',[AdminProfileController::class,'adminProfileChangePassword'])->name('admin.profile.change.password');
Route::post('/admin/profile/update/password',[AdminProfileController::class,'adminProfileUpdatePassword'])->name('update.change.password');
 });  // end Middleware admin

//users routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
     $id=Auth::user()->id;
     $user=User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

Route::get('/',[IndexController::class,'index']);
Route::get('/user/logout',[IndexController::class,'userLogout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class,'userProfile'])->name('user.profile');
Route::post('/user/profile/store',[IndexController::class,'userProfileStore'])->name('user.profile.store');
Route::get('/user/profile/change/password',[IndexController::class,'userProfilechangepass'])->name('change.password');
Route::post('/user/profile/update/password',[IndexController::class,'userUpdatepass'])->name('user.update.password');

//brands route
Route::prefix('brand')->group(function(){
    Route::get('/view',[BrandController::class,'BrandView'])->name('all.brand');
    Route::post('/store',[BrandController::class,'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}',[BrandController::class,'BrandEdit'])->name('brand.edit');
    Route::post('/update',[BrandController::class,'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}',[BrandController::class,'BrandDelete'])->name('brand.delete');
});

//category route
Route::prefix('category')->group(function(){
    Route::get('/view',[CategoryController::class,'CategoryView'])->name('all.category');
    Route::post('/store',[CategoryController::class,'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class,'CategoryEdit'])->name('category.edit');
    Route::post('/update',[CategoryController::class,'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}',[CategoryController::class,'CategoryDelete'])->name('category.delete');

    //sub category

    Route::get('/sub/view',[SubCategoryController::class,'SubCategoryView'])->name('all.subcategory');
    Route::post('/sub/store',[SubCategoryController::class,'SubCategoryStore'])->name('subcategory.store');
    Route::get('/sub/edit/{id}',[SubCategoryController::class,'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/sub/update',[SubCategoryController::class,'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('/sub/delete/{id}',[SubCategoryController::class,'SubCategoryDelete'])->name('subcategory.delete');

    //subsub category routes
    Route::get('/sub/sub/view',[SubCategoryController::class,'SubSubCategoryView'])->name('all.subsubcategory');
    Route::get('/subcategory/ajax/{category_id}',[SubCategoryController::class,'GetSubCategory']);
    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);
    Route::post('/sub/sub/store',[SubCategoryController::class,'SubSubCategoryStore'])->name('subsubcategory.store');

    Route::get('/sub/sub/edit/{id}',[SubCategoryController::class,'SubSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('/sub/sub/update',[SubCategoryController::class,'SubSubCategoryUpdate'])->name('subsubcategory.update');
    Route::get('/sub/sub/delete/{id}',[SubCategoryController::class,'SubSubCategoryDelete'])->name('subsubcategory.delete');
 
});


// Admin Products All Routes 

Route::prefix('product')->group(function(){

Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');
Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product-store');
Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');
Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');
Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');
Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');

Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
Route::get('/details/{id}', [ProductController::class, 'ProductDetails'])->name('product.details');

}); 

// Admin Slider All Routes 

Route::prefix('slider')->group(function(){

Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');

Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');

Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');

Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');

Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');

}); 