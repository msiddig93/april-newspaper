<?php

use App\Http\Controllers\Dashboard\DepartmentController;
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

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth', 'namespace' => 'Dashboard'],function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('settings', 'SettingController');
    // Writer Routes
    Route::resource('writers', 'WriterController');
    // department Routes
    Route::resource('departments', 'DepartmentController');

});
