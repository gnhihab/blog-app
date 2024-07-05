<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\userController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\RestoreController;

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
    return view('welcome');
});



Route::resource('posts',PostController::class)->except(['show']);


Route::prefix('posts/')->group(function(){


    Route::get('deleted',[RestoreController::class,'deleted'])->name('deleted');

    Route::post('restore/{id}',[RestoreController::class,'restore'])->name('posts.restore');

    Route::delete('{id}',[PostController::class,'destroy'])->name('posts.destroy');


    // Route::get('export',[PostController::class,'export'])->name('posts.export');


});


Route::post('forcedelete/{id}',[RestoreController::class,'forceDelete'])->name('forceDelete');




Route::post("search", [FilterController::class, 'search'])->name('search');


Route::get("filter", [FilterController::class, 'filter']);


Route::get("sendEmail",[EmailController::class,'sendEmail']);



Route::get("users",[userController::class,'allUsers'])->name('users');


Route::prefix('user/')->group(function(){

    Route::get("profile/{id}", [UserController::class, 'profile']);


    Route::get("edit/{id}", [userController::class, 'edit'])->name('user.edit');
    Route::put("{id}", [userController::class, 'update'])->name('user.update');

    Route::delete("{id}", [userController::class, 'delete'])->name('user.delete');


});


