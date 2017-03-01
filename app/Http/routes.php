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


Route::get('/', function(){
	return view('user.master');
});

Route::get('/knt', ['as'=>'home.knt', 'uses'=>'CrawlerController@crawler_Khoinghieptre_kinhdoanh']);

Route::get('/exist', ['as'=>'home.ex', 'uses'=>'CrawlerController@ex']);

Route::get('/cafe', ['as'=>'home.cafe', 'uses'=>'CrawlerController@crawler_cafebiz_kinhdoanh']);

Route::get('/demo', ['as'=>'demo', 'uses'=>'CrawlerController@demo']);
