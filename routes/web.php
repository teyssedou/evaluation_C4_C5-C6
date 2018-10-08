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

/* --- "list-article" Page --- */
Route::get('/list-articles', 'ArticlesController@list');
Route::delete('/delete/{id}', 'ArticlesController@delete');

/* --- "Modify-article" Page --- */
Route::get('/modify-article/{id}', 'ArticlesController@show');
Route::post('/modify-article/{id}', 'ArticlesController@update');

/* --- "Statistic" Page --- */
Route::get('/statistic', 'StatisticController@totalValue');

/* --- "Historic" Page --- */
Route::get('/historic', 'MovementController@list');

/* --- "Saisie-mouvement" Page --- */
Route::get('/saisie-mouvement', 'MovementController@view');
Route::post('/saisie-mouvement/create', 'MovementController@create');
