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


Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');

Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');


Route::post('/login/admin', 'Auth\LoginController@adminLogin');

Route::post('/register/admin', 'Auth\RegisterController@createAdmin');


Route::view('/home', 'home')->middleware('auth');

Route::view('/admin', 'admin');


//resource

//types

Route::resource('types','TypeController');


//requirements

Route::post('requirements/list','RequirementsController@loadrequirements')->name('requirements.list');
Route::post('requirements/add','RequirementsController@addrequirement')->name('requirements.addrequirement');


