<?php

use Illuminate\Support\Facades\Route;
use app\http\Controllers\ThreadController;
use app\http\Controllers\AdmController;
use app\http\Controllers\PythonController;


Route::get('/home',"ThreadController@home");

Route::get('/detail',"ThreadController@detail");

Route::get('/get','ThreadController@get');

Route::post('/send','ThreadController@send');

Route::get('/information/{?news}',"ThreadController@info");

Route::get('/rank',"ThreadController@rank");

Route::post('/sort',"ThreadController@sort");

Route::post('/search',"ThreadController@search");

Route::get('/make',"ThreadController@make");

Route::post('/makesend',"ThreadController@makesend");

Route::post('/create',"ThreadController@create");

Route::get('/login',"AdmController@login");

Route::get('/adm/home',"AdmController@home");

Route::get('/adm/register',"AdmController@register");

Route::post('/adm/create',"AdmController@create");

Route::get('/adm/index',"AdmController@index");

Route::post('/adm/delete',"AdmController@delete");

Route::get('/adm/logout',"AdmController@logout");

Route::get('/index',"ThreadController@index");//test

Route::post('/high','ThreadController@high');

Route::post('/low','ThreadController@low');

Route::get('/comment',"ThreadController@comment");//test

Route::get('/newthread',"ThreadController@newthread");

Route::get('/py',"PythonController@test");

