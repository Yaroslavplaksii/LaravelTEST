<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\EmailController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{id}', [PostController::class, 'show']);
Route::post('posts', [PostController::class, 'store']);
Route::put('posts/{id}', [PostController::class, 'update'])->middleware('auth:sanctum');
Route::delete('posts/{id}', [PostController::class, 'destroy'])->middleware('can:delete, post');
//instead
//Route::resource('posts', PostController::class);//->middleware('can:create-update');

Route::post('send-email', EmailController::class);

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class)->name('login');
Route::get('football', InfoController::class);
