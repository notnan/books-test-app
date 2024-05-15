<?php

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

Route::get('books', [\App\Http\Controllers\API\BookController::class, 'index']);
Route::get('books/{book}', [\App\Http\Controllers\API\BookController::class, 'show']);
Route::post('books', [\App\Http\Controllers\API\BookController::class, 'store']);
Route::patch('books/{book}', [\App\Http\Controllers\API\BookController::class, 'update']);
Route::delete('books/{book}', [\App\Http\Controllers\API\BookController::class, 'destroy']);
