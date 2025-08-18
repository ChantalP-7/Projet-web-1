<?php
use App\Routes\Route;
use App\Controllers\HomeController;
use App\Controllers\MemberController;
use App\Controllers\UserController;
use App\Controllers\UserIndexController;  
use App\Controllers\AuthController; 
use App\Controllers\StampController;


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/home/index', 'HomeController@index');

Route::get('/members', 'MemberController@index');
Route::get('/member/show', 'MemberController@show');
Route::get('/member/create', 'MemberController@create');
Route::post('/member/create', 'MemberController@store');
Route::get('/member/edit', 'MemberController@edit');
Route::post('/member/edit', 'MemberController@update');
Route::post('/member/delete', 'MemberController@delete');

Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');

Route::get('/stamps', 'StampController@index');
Route::get('/stamp/show', 'StampController@show');
Route::get('/stamp/create', 'StampController@create');
Route::post('/stamp/create', 'StampController@store');

Route::get('/images', 'ImageController@index');
Route::get('/image/show', 'ImageController@show');
Route::get('/image/create', 'ImageController@create');
Route::post('/image/create', 'ImageController@store');


/* Autres route stamp à venir */ 

Route::dispatch();