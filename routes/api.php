<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\BeatsController;

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

Route::post("/utilisateur/inscription", [UserController::class,"inscription"]);
Route::post("/utilisateur/connexion", [UserController::class,"connexion"]);

 




Route::get("/posts",[PostsController::class, "index"]);
Route::get("/posts/{id}",[PostsController::class, "show"]);
Route::post("/posts",[PostsController::class, "store"]);
Route::put("/posts/{id}",[PostsController::class, "update"]);
Route::delete("/posts/{id}",[PostsController::class, "destroy"]);


Route::get("/beats",[BeatsController::class, "index"]);
Route::get("/beats/{id}",[BeatsController::class, "show"]);
Route::post("/beats",[BeatsController::class, "store"]);

//Route::post('/like', 'LikesController@like')->name('like');

 

Route::group(["middleware"=> ["auth:sanctum"] ],function(){

     //Route::post('/like', 'LikesController@like')->name('like');

});
