<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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


Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/dashboard', 'DashboardController');
    Route::resource('/games', 'GamesController');
});

Route::namespace('Member')->prefix('member')->name('member.')->group(function(){
    Route::get('cart/generate-pdf','PdfController@generatePDF')->name('cart.pdf');
    Route::get('cart/receipt', 'CartController@receipt')->name('cart.receipt');
    Route::get('profile/addCredit', 'ProfileController@addCredit')->name('profile.addCredit');
    Route::post('profile/updateCredit', 'ProfileController@updateCredit')->name('profile.updateCredit');
    Route::resource('/profile', 'ProfileController');
    Route::resource('/cart', 'CartController');
    Route::resource('/games', 'UserGameController');
    Route::resource('/review', 'ReviewController');
});