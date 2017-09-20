<?php

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

Route::get('/', ['as' => 'timer.index', 'uses' => 'TimerController@index']);
Route::post('/add', ['as' => 'timer.add', 'uses' => 'TimerController@add']);
Route::post('/update', ['as' => 'timer.update', 'uses' => 'TimerController@update']);

Route::get('/failstacks', ['as' => 'failstacks.index', 'uses' => 'FailstacksController@index']);
Route::get('/links', ['as' => 'links.index', 'uses' => 'LinksController@index']);
Route::get('/about', ['as' => 'about.index', 'uses' => 'AboutController@index']);

Route::get('/scratch', ['as' => 'scratch.index', 'uses' => 'ScratchController@index']);
Route::post('/scratch/add', ['as' => 'scratch.add', 'uses' => 'ScratchController@add']);
