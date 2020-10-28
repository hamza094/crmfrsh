<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('/api/lead/{lead}/avatar', 'LeadController@avatar')->name('avatar');
Route::patch('/api/lead/{lead}/stage','LeadController@stage');
Route::patch('/api/lead/{lead}/unqualifed','LeadController@unqualifed');


Route::resource('api/leads', 'LeadController');
Route::get('{path}', 'HomeController@index')->where('/path', '([A-z\d-\/_.]+)?');
