<?php
/*
 * Comments
 */
// Index (view: comment created)
Route::get('/user/comments', 'User\CommentController@index')->name('user.comment.index');
// Store (DB)
Route::post('/user/comment/store', 'User\CommentController@store')->name('user.comment.store');
// Edit form will be on the photo display page
// Update (DB)
Route::patch('/user/comment/{id}/update', 'User\CommentController@update')->name('user.comment.update');
// Destroy (DB)
Route::delete('/user/comment/{id}/destroy', 'User\CommentController@destroy')->name('user.comment.destroy');

/*
 * Disciplines
 */
// Index (view)
Route::get('/user/disciplines', 'User\DisciplineController@index')->name('user.discipline.index');
Route::get('/user/discipline/create', 'User\DisciplineController@create')->name('user.discipline.create');
Route::post('/user/discipline/store', 'User\DisciplineController@store')->name('user.discipline.store');
Route::get('/user/discipline/{id}', 'User\DisciplineController@show')->name('user.discipline.show');
Route::get('/user/discipline/{id}/edit', 'User\DisciplineController@edit')->name('user.discipline.edit');
Route::patch('/user/discipline/{id}/update', 'User\DisciplineController@update')->name('user.discipline.update');
// Destroy should be available if no events are in it
Route::delete('/user/discipline/{id}/destroy', 'User\DisciplineController@destroy')->name('user.discipline.destroy');

/*
 * Events
 */
Route::get('/user/events', 'User\EventController@index')->name('user.event.index');
Route::get('/user/event/create', 'User\EventController@create')->name('user.event.create');
Route::post('/user/event/store', 'User\EventController@store')->name('user.event.store');
Route::get('/user/event/{id}', 'User\EventController@show')->name('user.event.show');
Route::get('/user/event/{id}/edit', 'User\EventController@edit')->name('user.event.edit');
Route::patch('/user/event/{id}/update', 'User\EventController@update')->name('user.event.update');
// Destroy should be available if no picture are in it
Route::delete('/user/event/{id}/destroy', 'User\EventController@destroy')->name('user.event.destroy');

/*
 * Photo
 */
Route::get('/user/photos', 'User\PhotoController@index')->name('user.photo.index');
Route::get('/user/photo/create', 'User\PhotoController@create')->name('user.photo.create');
Route::post('/user/photo/store', 'User\PhotoController@store')->name('user.photo.store');
Route::get('/user/photo/{id}', 'User\PhotoController@show')->name('user.photo.show');
Route::get('/user/photo/{id}/edit', 'User\PhotoController@edit')->name('user.photo.edit');
Route::patch('/user/photo/{id}/update', 'User\PhotoController@update')->name('user.photo.update');
Route::delete('/user/photo/{id}/destroy', 'User\PhotoController@destroy')->name('user.photo.destroy');

/*
 * PhotoUser
 */
/*
 * @TODO: Not sure about this one...
Route::get('/user/photo_users', 'User\PhotoUserController@index')->name('user.photo_user.index');
Route::get('/user/photo_user/create', 'User\PhotoUserController@create')->name('user.photo_user.create');
Route::post('/user/photo_user/store', 'User\PhotoUserController@store')->name('user.photo_user.store');
Route::get('/user/photo_user/{id}', 'User\PhotoUserController@show')->name('user.photo_user.show');
Route::get('/user/photo_user/{id}/edit', 'User\PhotoUserController@edit')->name('user.photo_user.edit');
Route::patch('/user/photo_user/{id}/update', 'User\PhotoUserController@update')->name('user.photo_user.update');
Route::delete('/user/photo_user/{id}/destroy', 'User\PhotoUserController@destroy')->name('user.photo_user.destroy');
*/

/*
 * Roles
 * Users have no power here
 */

/*
 * Tags
 */
Route::get('/user/tags', 'User\TagController@index')->name('user.tag.index');
Route::get('/user/tag/create', 'User\TagController@create')->name('user.tag.create');
Route::post('/user/tag/store', 'User\TagController@store')->name('user.tag.store');
Route::get('/user/tag/{id}', 'User\TagController@show')->name('user.tag.show');
Route::get('/user/tag/{id}/edit', 'User\TagController@edit')->name('user.tag.edit');
Route::patch('/user/tag/{id}/update', 'User\TagController@update')->name('user.tag.update');
Route::delete('/user/tag/{id}/destroy', 'User\TagController@destroy')->name('user.tag.destroy');

/*
 * Users
 * All interactions should depend on the currently logged in user.
 */
Route::get('me/', 'User\UserController@show')->name('user.dashboard');
Route::get('me/edit', 'User\UserController@edit')->name('user.personnal_infos');
Route::patch('me/update', 'User\UserController@update')->name('user.personnal_infos.update');
Route::get('me/preferences', 'User\UserController@edit_prefs')->name('user.preferences');
Route::patch('me/update_preferences', 'User\UserController@update_prefs')->name('user.preferences.update');
Route::patch('me/update_passwd', 'User\UserController@update_passwd')->name('user.update_passwd');
Route::delete('me/close_account', 'User\UserController@destroy')->name('user.close_account');
Route::get('me/logout', 'User\UserController@logout')->name('user.logout');

/*
 * UserDisciplines
 */
/*
 * @TODO: Debate about this
Route::get('/user/user_disciplines', 'User\UserDisciplineController@index')->name('user.user_discipline.index');
Route::get('/user/user_discipline/create', 'User\UserDisciplineController@create')->name('user.user_discipline.create');
Route::post('/user/user_discipline/store', 'User\UserDisciplineController@store')->name('user.user_discipline.store');
Route::get('/user/user_discipline/{id}', 'User\UserDisciplineController@show')->name('user.user_discipline.show');
Route::get('/user/user_discipline/{id}/edit', 'User\UserDisciplineController@edit')->name('user.user_discipline.edit');
Route::patch('/user/user_discipline/{id}/update', 'User\UserDisciplineController@update')->name('user.user_discipline.update');
Route::delete('/user/user_discipline/{id}/destroy', 'User\UserDisciplineController@destroy')->name('user.user_discipline.destroy');

/*
 * UserPhotos
 */
/*
 * @TODO: Not sure if we should have a controller for this
Route::get('/user/user_photos', 'User\UserPhotoController@index')->name('user.user_photo.index');
Route::get('/user/user_photo/create', 'User\UserPhotoController@create')->name('user.user_photo.create');
Route::post('/user/user_photo/store', 'User\UserPhotoController@store')->name('user.user_photo.store');
Route::get('/user/user_photo/{id}', 'User\UserPhotoController@show')->name('user.user_photo.show');
Route::get('/user/user_photo/{id}/edit', 'User\UserPhotoController@edit')->name('user.user_photo.edit');
Route::patch('/user/user_photo/{id}/update', 'User\UserPhotoController@update')->name('user.user_photo.update');
Route::delete('/user/user_photo/{id}/destroy', 'User\UserPhotoController@destroy')->name('user.user_photo.destroy');
*/

/*
 * Watermarks
 * http://risovach.ru/upload/2013/06/mem/u_22667895_big_.png
 */
