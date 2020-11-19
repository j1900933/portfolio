<?php

use App\Http\Controllers\EngineerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

use function PHPSTORM_META\elementType;

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

Route::get('/', 'EngineerController@index');


Route::post('engineers/confirm', 'EngineerController@confirm')->name('engineers.confirm');

Route::post('engineers/indexUpdate', 'EngineerController@indexUpdate')->name('engineers.indexUpdate'); //getかPOSTに揃える,dataという名前を使わない getData -> indexUpdateに変更

Route::get('engineers/squeeze', 'EngineerController@squeeze')->name('engineers.squeeze'); //名前のスペルが違う　filterble -> squeezeに修正

Route::resource('engineers', 'EngineerController');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
//     Route::get('home', 'HomeController@index')->name('home');
//     Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//     Route::post('login', 'Auth\LoginController@login');
//     Route::post('logout', 'Auth\LoginController@Logout')->name('logout');
// });