<?php
/*
 * Comments :
 * Public people don't have any commenting capacity.
 */

/*
 * Disciplines
 */
// Index (view)
Route::get('/', 'DisciplineController@index')->name('discipline.index');
// Show (view)
Route::get('/discipline/{id}', 'DisciplineController@show')->name('discipline.show');

/*
 * Events
 */
Route::get('/events', 'EventController@index')->name('event.index');
Route::get('/event/{id}', 'EventController@show')->name('event.show');

/*
 * Photo
 */
Route::get('/photos', 'PhotoController@index')->name('photo.index');
Route::get('/photo/{id}', 'PhotoController@show')->name('photo.show');

/*
 * PhotoUser
 */
/* Commented for now as not sure about it
 * @TODO take a decision
Route::get('photo_users', 'PhotoUserController')->name('photo_user.index');
Route::get('photo_user/create', 'PhotoUserController')->name('photo_user.create');
Route::post('photo_user/store', 'PhotoUserController')->name('photo_user.store');
Route::get('photo_user/{id}', 'PhotoUserController')->name('photo_user.show');
Route::get('photo_user/{id}/edit', 'PhotoUserController')->name('photo_user.edit');
Route::patch('photo_user/{id}/update', 'PhotoUserController')->name('photo_user.update');
Route::delete('photo_user/{id}/destroy', 'PhotoUserController')->name('photo_user.destroy');
*/

/*
 * Roles :
 * No public access to roles
 */

/*
 * Tags
 */
Route::get('/tags', 'TagController@index')->name('tag.index');
Route::get('/tag/{id}', 'TagController@show')->name('tag.show');

/*
 * Users
 */
Route::get('/users', 'UserController@index')->name('user.index');
Route::get('/user/{id}', 'UserController@show')->name('user.show');
// Login/Register (form)
//Route::get('/login', 'UserController@login_register')->name('user.login_register');
// Register (DB)
//Route::post('/register', 'RegisterController@register')->name('register');
// Login (DB)
//Route::post('/login', 'UserController@login')->name('user.login');

/*
 * UserDisciplines
 */
/*
 * @TODO: WHat ?
Route::get('/user_disciplines', 'UserDisciplineController')->name('user_discipline.index');
Route::get('/user_discipline/create', 'UserDisciplineController')->name('user_discipline.create');
Route::post('/user_discipline/store', 'UserDisciplineController')->name('user_discipline.store');
Route::get('/user_discipline/{id}', 'UserDisciplineController')->name('user_discipline.show');
Route::get('/user_discipline/{id}/edit', 'UserDisciplineController')->name('user_discipline.edit');
Route::patch('/user_discipline/{id}/update', 'UserDisciplineController')->name('user_discipline.update');
Route::delete('/user_discipline/{id}/destroy', 'UserDisciplineController')->name('user_discipline.destroy');
*/

/*
 * UserPhotos
 */
/*
 * @TODO: WHat ?
Route::get('/user_photos', 'UserPhotoController')->name('user_photo.index');
Route::get('/user_photo/create', 'UserPhotoController')->name('user_photo.create');
Route::post('/user_photo/store', 'UserPhotoController')->name('user_photo.store');
Route::get('/user_photo/{id}', 'UserPhotoController')->name('user_photo.show');
Route::get('/user_photo/{id}/edit', 'UserPhotoController')->name('user_photo.edit');
Route::patch('/user_photo/{id}/update', 'UserPhotoController')->name('user_photo.update');
Route::delete('/user_photo/{id}/destroy', 'UserPhotoController')->name('user_photo.destroy');
*/

/*
 * Watermarks
 * No public access
 */

/*
 * Search
 */
Route::get('/advanced_search', 'SearchController@advanced_search')->name('advanced_search');
Route::post('/search_results', 'SearchController@search_results')->name('search_results');

/*
 * Page
 */
Route::get('/pages/{file}', 'PageController')->name('pages');
