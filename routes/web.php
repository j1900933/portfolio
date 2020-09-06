<?php

use App\Http\Controllers\EngineerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'EngineerController@index')->name('engineers.index');

Route::post('engineers/confirm', 'EngineerController@confirm')->name('engineers.confirm');

Route::post('engineers/getData', 'EngineerController@getData')->name('engineers.getData');

Route::get('engineers/filterble', 'EngineerController@filterble')->name('engineers.filerble');

Route::resource('engineers', 'EngineerController', ['except' => ['index']]);

// Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');
