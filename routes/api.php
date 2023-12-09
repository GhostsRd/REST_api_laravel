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
Route::get('/employer', [App\Http\Controllers\Api\Employers::class, 'index']);
Route::post('/employer/store', [App\Http\Controllers\Api\Employers::class, 'store']);
Route::post('/employer/update', [App\Http\Controllers\Api\Employers::class, 'update']);
Route::get('/employer/{id}', [App\Http\Controllers\Api\Employers::class, 'find']);
Route::get('/employer/delete/{id}', [App\Http\Controllers\Api\Employers::class, 'remove']);

Route::get('/employer/increment/{id}/{val}', [App\Http\Controllers\Api\Employers::class, 'increment']);
Route::get('/employer/decrement/{id}/{val}', [App\Http\Controllers\Api\Employers::class, 'decrement']);





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

