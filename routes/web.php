<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/activities', function(){
    return view('admin.pages.activities.index');
});

Route::get('/open', function(){
    return view('admin.pages.activities.open');
});
Route::get('/closed', function(){
    return view('admin.pages.activities.closed');
});

Route::any('activities/search', 'activityController@search')->name('activities.search'); 

Route::Resource('activities', 'ActivityController');
