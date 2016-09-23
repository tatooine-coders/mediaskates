<?php
// users
Route::get('user/add', 'UserController@add_form');
Route::post('user/add', 'UserController@add');
