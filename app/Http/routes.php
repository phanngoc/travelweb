<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','HomeController@index');
Route::get('/cate/{id}/{name}','HomeController@category');
Route::get('/p/{id}/{more}',['as'=>'detailpost','uses'=>'HomeController@postdetail']);
Route::post('/p/{id}/{more}',['as'=>'submitCommentPost','uses'=>'HomeController@submitCommentPostDetail']);
Route::get('/tour',['as'=>'tour','uses'=>'HomeController@tour']);

// Route::post('/searchtour',['as'=>'searchtour','uses'=>'TourController@index']);
Route::get('/searchtour',['as'=>'searchtour','uses'=>'TourController@index']);

Route::get('testmid', ['middleware' => 'mymiddleware:param1,param2','uses' => 'MyController@index']);