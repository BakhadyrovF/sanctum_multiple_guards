<?php

use App\Http\Controllers\Auth\UserController;
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


Route::post('sign-up', [UserController::class, 'adminSignUp'])->name('sign-up');
Route::post('sign-in', [UserController::class, 'adminSignIn'])->name('sign-in');

Route::middleware('auth:admin')->get('user', function () {
    return auth('admin')->user();
});
