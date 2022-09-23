<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Test;

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


Route::get('/', [AuthController::class, 'loginPage']);
Route::post('login-action', [AuthController::class, 'login']);
Route::post('registration', [AuthController::class, 'registration']);

Route::middleware('auth:sanctum')->group( function () {
    Route::get('dashboard', [AuthController::class, 'dashboard']);
    Route::get('test', [Test::class, 'test']);
    Route::post('submit-test', [Test::class, 'submitTest']);
    Route::get('test-result', [Test::class, 'testResult']);
    Route::post('logout', [AuthController::class, 'logout']);
});