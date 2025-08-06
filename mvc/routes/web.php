<?php
include('controllers/HomeController.php');
include('routes/Route.php');
use App\Routes\Route;
use App\Controllers\HomeController;


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/home/index', 'HomeController@index');