<?php

declare(strict_types=1);

use App\Http\Controllers\Articles\ArticleController;
use App\Http\Controllers\Comments\CommentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Reactions\ArticleReactionController;
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
Route::apiResource('articles', ArticleController::class)->middleware('auth:sanctum');

Route::group(['prefix' => 'articles', 'middleware' => 'auth:sanctum', 'name' => 'articles.'], function () {
    Route::get('/{article}/comments', [CommentController::class, 'index'])->name('comments-index');
    Route::post('/{article}/comments', [CommentController::class, 'store'])->name('comments-store');
    Route::put('/{article}/comments/{comment}', [CommentController::class, 'update'])->name('comments-update')->scopeBindings();
});

Route::group(['prefix' => 'articles', 'middleware' => 'auth:sanctum', 'name' => 'reactions.'], function () {
    Route::get('/{article}/reactions', [ArticleReactionController::class, 'index'])->name('reactions.index');
    Route::post('/{article}/reactions', [ArticleReactionController::class, 'store'])->name('reactions.store');
    Route::put('/{article}/reactions/{reaction}', [ArticleReactionController::class, 'update'])->name('reactions.update')->scopeBindings();
});
