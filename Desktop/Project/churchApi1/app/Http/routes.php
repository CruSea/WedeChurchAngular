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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['api','cors'],'prefix' => 'api'], function () {
    Route::post('register', 'APIController@register');
    Route::post('login', 'APIController@login');
    Route::group(['middleware' => 'jwt-auth'], function () {
    	Route::get('get_user_details', 'APIController@get_user_details');
    });
    Route::post('churches', 'ChurchController@store');
    Route::put('churches/{church}', 'ChurchController@update');
    Route::delete('churches/{church}', 'ChurchController@delete');

    Route::post('events', 'EventController@store');
    Route::put('events/{event}', 'EventController@update');
    Route::delete('events/{event}', 'EventController@delete');

    Route::post('schedules', 'ScheduleController@store');
    Route::put('schedules/{schedule}', 'ScheduleController@update');
    Route::delete('schedules/{schedule}', 'ScheduleController@delete');

    Route::post('denominations', 'DenominationController@store');
    Route::put('denominations/{denomination}', 'DenominationController@update');
    Route::delete('denominations/{denomination}','DenominationController@delete');

    Route::post('favorite_events', 'Favorite_eventController@store');
Route::put('favorite_events/{favorite_event}', 'Favorite_eventController@update');
Route::delete('favorite_events/{favorite_event}','Favorite_eventController@delete');

Route::post('events_category', 'EventController@store');
Route::put('events_category/{event_category}', 'Event_categoryController@update');
Route::delete('events_category/{event_category}', 'Event_categoryController@delete');

});
Route::get('churches', 'ChurchController@index');
Route::get('churches/{church}', 'ChurchController@show');

Route::get('events', 'EventController@index');
Route::get('events/{event}', 'EventController@show');

Route::get('schedules', 'ScheduleController@index');
Route::get('schedules/{schedule}', 'ScheduleController@show');

Route::get('denominations', 'DenominationController@index');
Route::get('denominations/{denomination}', 'DenominationController@show');

Route::get('favorite_churches', 'Favorite_churchController@index');
Route::get('favorite_churches/{favorite_church}', 'Favorite_churchController@show');
Route::post('favorite_churches', 'Favorite_churchController@store');
Route::put('favorite_churches/{favorite_church}', 'Favorite_churchController@update');
Route::delete('favorite_churches/{favorite_church}','Favorite_churchController@delete');
Route::get('favorite_events', 'Favorite_eventController@index');
Route::get('favorite_events/{favorite_event}', 'Favorite_eventController@show');

Route::get('schedules_category', 'Schedule_categoryController@index');
Route::get('schedules_category/{schedules_category}', 'Schedule_categoryController@show');
Route::post('schedules_category', 'Schedule_categoryController@store');
Route::put('schedules_category/{schedules_category}', 'Schedule_categoryController@update');
Route::delete('schedules_category/{schedules_category}', 'Schedule_categoryController@delete');
Route::get('events_category', 'Event_categoryController@index');
Route::get('events_category/{event_category}', 'Event_categoryController@show');

