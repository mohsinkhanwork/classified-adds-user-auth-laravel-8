<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCatController;

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



Route::get('/', function() {
    return view('mainPage');
});


Route::get('/welcome', function() {
    return view('welcome');
});


Route::get('/home', 'HomeController@index');

Route::get('/Dashboard', 'DashboardController@index' );

//admin


Route::group(['prefix'=>'auth'], function() {
    Route::resource('/category', 'CategoryController');
    Route::resource('/subcategory', 'SubCatController');
});


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
