<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ExampleController;

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

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/example/get-all-data', [ ExampleController::class, 'apidata' ])->name('api.data');
    Route::post('/example/create-code', [ ExampleController::class, 'createcode' ])->name('create.code');
    Route::delete('/example/delete-code/{id}', [ ExampleController::class, 'deletecode' ])->name('delete.code');
    Route::patch('/example/update-code/{id}', [ ExampleController::class, 'updatecode' ])->name('update.code');
    Route::get('/logout', [ LoginController::class, 'logout' ])->name('logout');

});

Route::post('/login', [ LoginController::class, 'login' ])->name('login');
