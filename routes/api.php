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

Route::post('/sign-up', [UserController::class, 'signUp'])->name('sign-up');
Route::post('/sign-in', [UserController::class, 'signIn'])->name('sign-in');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user('api');
});
