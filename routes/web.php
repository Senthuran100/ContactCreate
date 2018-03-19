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
Route::get('insert','TelephoneController@contactUS');
Route::post('store', ['as'=>'contactus.store','uses'=>'TelephoneController@contactUSPost']);
Route::post('status', ['as'=>'contactus.status','uses'=>'TelephoneController@updaterecord']);
Route::get('delete/{id}','TelephoneController@Delete');
Route::get('view','TelephoneController@viewresult');
Route::get('/search','TelephoneController@search');
Route::get('/update','TelephoneController@update');
Route::post('alphabet','TelephoneController@alphabet');
Route::match(['get', 'put'], 'update/{id}', 'TelephoneController@update');