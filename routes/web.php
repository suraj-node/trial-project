<?php

use App\Http\Controllers\MainController;
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


Route::get('/', ['uses'=>'MainController@index', 'as'=>'home']);
Route::get('/remove-entry/{propId}', ['uses'=>'MainController@remove', 'as'=>'remove']);
Route::get('/edit-entry/{propId}', ['uses'=>'MainController@editView', 'as'=>'edit-view']);
Route::post('/update-property', ['uses'=>'MainController@updateProperty', 'as'=>'update-property']);
