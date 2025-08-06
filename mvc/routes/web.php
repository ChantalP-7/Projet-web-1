<?php
use App\Routes\Route;
use App\Controllers\HomeController;
use App\Controllers\MemberController;
use App\Controllers\UserController;
use App\Controllers\UserIndexController;  
use App\Controllers\AuthController; 

Route::get('/', 'HomeController@index');
//Route::get('/home', 'HomeController@index');
//Route::get('/home/index', 'HomeController@index');

Route::get('/user/create', 'UserController@create');
Route::post('/user/store', 'UserController@store');
Route::get('/users', 'UserIndexController@index');

Route::get('/members', 'MemberController@index');
Route::get('/member/create', 'MemberController@create');
Route::post('/member/create', 'MemberController@store');

// Route pour l'authentification

Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');


Route::dispatch();