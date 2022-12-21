<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;


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

Route::get('/greet', function (){
    return "hello wai yan aung";
}); 

Route::get('/greet/developer', function(){
    return "hello developer";
});

Route::get('/hello/developer/laravel', function(){
    return "Hi nice to meet you";       
});

Route::get('/hi/hey/{name}/woah/{id}',function($name,$id){
    return "hey " . $name . " cool " . $id;
});

Route::get('/wya',[TestController::class,'byName']);

Route::get('/wya2/{name}/{age}/{id}', [TestController::class,'cool']);
Route::get('about',[TestController::class,'about']);

#post
Route::get('/posts',[PostController::class,'Index']);
Route::get('/posts/create',[PostController::class,'Create']);
Route::post('/posts/{id}/delete',[PostController::class,'destroy']);
Route::get('/posts/{id}/edit',[PostController::class,'edit']);
Route::post('/posts/{id}/update',[PostController::class,'update']);
Route::post('/posts',[PostController::class,'store']);
//post with comments
Route::get('/posts/{id}/comments',[PostController::class,'postComment']);
Route::post ('/posts/comments/{commentId}/deny',[PostController::class,'deny']);
Route::get('/posts/index',[PostController::class,'indexPost']);



//resoures 
#categories
Route::resource('/categories',CategoryController::class);   
#users
Route::resource('/users',UserController::class);


#authentication
Route::get('/login',[AuthController::class,'loginForm']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/logout',[AuthController::class,'logout']);


