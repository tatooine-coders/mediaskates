<?php
/*
 * User's routes
 */
// Basic CRUD
Route::resource('user', 'UserController');

// Login/Register
Route::get('/login', [
  'as' => 'user.login_register',
  'uses' => 'UserController@login_register'
]);
Route::post('/register', [
  'as' => 'user.register',
  'uses' => 'UserController@register'
]);
Route::post('/login', [
  'as' => 'user.login',
  'uses' => 'UserController@login'
]);
/*
 * Role's routes
 */
Route::resource('role', 'RoleController');

/*
 * Photo's routes
 */
Route::resource('photo', 'PhotoController');
