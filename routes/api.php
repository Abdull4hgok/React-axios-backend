<?php

use App\Http\Controllers\Api\UserController1;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function(){
 Route::post('user-details', [UserController::class, 'userDetails']);
 Route::post('logout',[UserController::class,'logout'])->name('logout');

});

//Product Route



Route::group(['middleware' => 'auth:api'], function(){
    Route::get('products',[ProductController::class,'index'])->name('products');

        Route::get('delete/{id}',[ProductController::class,'destroy'])->name('delete');

Route::post('update/{id}',[ProductController::class,'update'])->name('update');
    Route::post('add',[ProductController::class,'store'])->name('add');
    Route::get('detail/{id}',[ProductController::class,'show'])->name('detail');
});



//User Route
Route::get('/',[UserController1::class,'index']);
Route::get('post-add',[UserController1::class,'create'])->name('post.add');
Route::post('post-add',[UserController1::class,'store'])->name('post.store');
Route::get('post-detail/{id}',[UserController1::class,'show'])->name('post.show');
Route::get('post-edit/{id}',[UserController1::class,'edit'])->name('post.edit');
Route::post('post-edit',[UserController1::class,'update'])->name('post.update');
Route::get('post-delete/{id}',[UserController1::class,'destroy'])->name('post.delete');
