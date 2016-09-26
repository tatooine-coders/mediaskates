<?php
/*
 * User's routes
 */
// Index
Route::get('/users', 'UserController@index');
// Add user
Route::get('/user/create', 'UserController@create');
Route::post('/user/store', 'UserController@store');
// View
Route::get('/user/{id}', 'UserController@view');
// Destroy
Route::get('/user/{id}/destroy', 'UserController@destroy');
// Edit
Route::get('/user/{id}/edit', 'UserController@edit');
Route::post('user/{id}/update', 'UserController@update');
// Login/Register
Route::get('/login', 'UserController@login_register');
Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');
