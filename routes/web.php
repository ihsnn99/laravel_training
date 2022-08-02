<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return redirect('login');
});

Route::get('/utama', function(){
    return view('welcome');
});

Route::get('/download', function(){
    return response()->download(public_path('laravel.txt'), 'ihsan');
});

Route::get('/info', function(){
    return redirect('/utama');
});
Route::get('admin/utama', [ExampleController::class, 'main'])->name('admin.main');
Route::name('admin')->prefix('admin')->controller(ExampleController::class)->middleware('auth')->group(function(){

    
    Route::get('/info', 'string')->name('.string');
    Route::get('/create', 'create')->name('.create');
    Route::post('/store', 'store')->name('.store');
    Route::get('/show', 'show')->name('.show');
    Route::delete('/destroy/{id}', 'destroy')->name('.destroy');
    Route::get('/edit/{id}', 'edit')->name('.edit');
    Route::patch('/update/{id}', 'update')->name('.update');
});

Route::get('/login', [ LoginController::class, 'login' ])->name('login');
Route::post('/login-attempt', [ LoginController::class, 'loginattempt' ])->name('login.attempt');

Route::get('/logout', [ LoginController::class, 'logout' ])->name('logout.attempt');

Route::get('/errors/unauthorized', function () {
    return view('errors.unauthorized');
});

