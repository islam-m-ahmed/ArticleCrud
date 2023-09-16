<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//categories
Route::prefix('/category')->group(function () {
    Route::post('/', [CategoryController::class, 'store']);
});

 
Route::post('article/{id}', [ArticleController::class, 'update']);
Route::resource('article', ArticleController::class);

// // posts
// Route::prefix('articles')->group(function () {
//     Route::get('/', [ArticleController::class, 'index']); //list
//     Route::get('/create', [ArticleController::class, 'create']); //create
//     Route::post('/', [ArticleController::class, 'store']); //store
//     Route::get('/{id}', [ArticleController::class, 'show']); //show
//     Route::get('/{id}/edit', [ArticleController::class, 'edit']); //show form
//     Route::put('/{id}', [ArticleController::class, 'update']);// update
//     Route::delete('/{id}', [ArticleController::class, 'destroy']); //delete
// });
