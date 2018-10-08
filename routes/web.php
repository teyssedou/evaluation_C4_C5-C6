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

/* --- "Welcome" Page --- */
Route::view('/', 'welcome');

/* --- "Create-article" Page --- */
Route::get('/create-article', 'ArticlesController@showCreate');
Route::post('/create-article', 'ArticlesController@create');

Route::get('/list-articles', 'ArticlesController@list');
Route::delete('/delete/{id}', 'ArticlesController@delete');

Route::get('/modify-article/{id}', 'ArticlesController@show');
Route::post('/modify-article/{id}', 'ArticlesController@update');

Route::get('/statistic', 'StatisticController@totalValue');

Route::get('/historic', 'MovementController@list');

Route::get('/saisie-mouvement', 'MovementController@view');
Route::post('/saisie-mouvement/create', 'MovementController@create');
