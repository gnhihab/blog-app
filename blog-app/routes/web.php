<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\userController;

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

Route::controller(PostController::class)->group(function(){

    //all
    Route::get("posts","all");

    //create
    Route::get("posts/create","create");
    Route::post("posts/store","store")->name('store');

    //update
    Route::get("posts/edit/{id}","edit");
    Route::put("posts/{id}","update");

    //delete
    Route::delete("posts/{id}",'delete');

    //search
    Route::post("search",'search')->name('search');

    //filter
    Route::get("filter",'filter');


}
);

Route::controller(userController::class)->group(function($id){

    //profile
    Route::get("user/profile/{id}",'profile');

});
