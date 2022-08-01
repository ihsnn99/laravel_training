<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;

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
    return view('welcome');
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

Route::name('admin')->prefix('admin')->controller(ExampleController::class)->group(function(){

    Route::get('/utama', 'main')->name('.main');
    Route::get('/info', 'string')->name('.string');
    Route::get('/create', 'create')->name('.create');
    Route::post('/store', 'store')->name('.store');
    Route::get('/show', 'show')->name('.show');
    Route::delete('/destroy/{id}', 'destroy')->name('.destroy');
    Route::get('/edit/{id}', 'edit')->name('.edit');
    Route::patch('/update/{id}', 'update')->name('.update');
});

