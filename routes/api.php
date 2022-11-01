<?php

declare(strict_types=1);

use App\Http\Controllers\Articles\ArticleController;
use App\Http\Controllers\Comments\CommentController;
use App\Http\Controllers\AuthController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('articles',ArticleController::class)->middleware('auth:sanctum');

Route::post('articles/{article}/comments', [CommentController::class, 'store'])->name('articles.comments-store')->middleware('auth:sanctum');
Route::put('articles/{article}/comments/{comment}', [CommentController::class, 'update'])->name('articles.comments-update')->middleware('auth:sanctum')->scopeBindings();
