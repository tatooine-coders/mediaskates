<?php
/**
 * Basically, full power
 * @TODO: remove useless actions
 */

/*
 * Comments
 */
// Index (view)
Route::get('/admin/comments', 'Admin\CommentController@index')->name('admin.comment.index');
// Create (form)
Route::get('/admin/comment/create', 'Admin\CommentController@create')->name('admin.comment.create');
// Store (DB)
Route::post('/admin/comment/store', 'Admin\CommentController@store')->name('admin.comment.store');
// Show (view)
Route::get('/admin/comment/{id}', 'Admin\CommentController@show')->name('admin.comment.show');
// Edit (form)
Route::get('/admin/comment/{id}/edit', 'Admin\CommentController@edit')->name('admin.comment.edit');
// Update (DB)
Route::patch('/admin/comment/{id}/update', 'Admin\CommentController@update')->name('admin.comment.update');
// Destroy (DB)
Route::delete('/admin/comment/{id}/destroy', 'Admin\CommentController@destroy')->name('admin.comment.destroy');

/*
 * Disciplines
 */
// Index (view)
Route::get('/admin/disciplines', 'Admin\DisciplineController@index')->name('admin.discipline.index');
Route::get('/admin/discipline/create', 'Admin\DisciplineController@create')->name('admin.discipline.create');
Route::post('/admin/discipline/store', 'Admin\DisciplineController@store')->name('admin.discipline.store');
Route::get('/admin/discipline/{id}', 'Admin\DisciplineController@show')->name('admin.discipline.show');
Route::get('/admin/discipline/{id}/edit', 'Admin\DisciplineController@edit')->name('admin.discipline.edit');
Route::patch('/admin/discipline/{id}/update', 'Admin\DisciplineController@update')->name('admin.discipline.update');
Route::delete('/admin/discipline/{id}/destroy', 'Admin\DisciplineController@destroy')->name('admin.discipline.destroy');

/*
 * Events
 */
Route::get('/admin/events', 'Admin\EventController@index')->name('admin.event.index');
Route::get('/admin/event/create', 'Admin\EventController@create')->name('admin.event.create');
Route::post('/admin/event/store', 'Admin\EventController@store')->name('admin.event.store');
Route::get('/admin/event/{id}', 'Admin\EventController@show')->name('admin.event.show');
Route::get('/admin/event/{id}/edit', 'Admin\EventController@edit')->name('admin.event.edit');
Route::patch('/admin/event/{id}/update', 'Admin\EventController@update')->name('admin.event.update');
Route::delete('/admin/event/{id}/destroy', 'Admin\EventController@destroy')->name('admin.event.destroy');

/*
 * Photo
 */
Route::get('/admin/photos', 'Admin\PhotoController@index')->name('admin.photo.index');
Route::get('/admin/photo/create', 'Admin\PhotoController@create')->name('admin.photo.create');
Route::post('/admin/photo/store', 'Admin\PhotoController@store')->name('admin.photo.store');
Route::get('/admin/photo/{id}', 'Admin\PhotoController@show')->name('admin.photo.show');
Route::get('/admin/photo/{id}/edit', 'Admin\PhotoController@edit')->name('admin.photo.edit');
Route::patch('/admin/photo/{id}/update', 'Admin\PhotoController@update')->name('admin.photo.update');
Route::delete('/admin/photo/{id}/destroy', 'Admin\PhotoController@destroy')->name('admin.photo.destroy');

/*
 * PhotoUser
 */
Route::get('/admin/photo_users', 'Admin\PhotoUserController@index')->name('admin.photo_user.index');
Route::get('/admin/photo_user/create', 'Admin\PhotoUserController@create')->name('admin.photo_user.create');
Route::post('/admin/photo_user/store', 'Admin\PhotoUserController@store')->name('admin.photo_user.store');
Route::get('/admin/photo_user/{id}', 'Admin\PhotoUserController@show')->name('admin.photo_user.show');
Route::get('/admin/photo_user/{id}/edit', 'Admin\PhotoUserController@edit')->name('admin.photo_user.edit');
Route::patch('/admin/photo_user/{id}/update', 'Admin\PhotoUserController@update')->name('admin.photo_user.update');
Route::delete('/admin/photo_user/{id}/destroy', 'Admin\PhotoUserController@destroy')->name('admin.photo_user.destroy');

/*
 * Roles
 */
Route::get('/admin/roles', 'Admin\RoleController@index')->name('admin.role.index');
Route::get('/admin/role/create', 'Admin\RoleController@create')->name('admin.role.create');
Route::post('/admin/role/store', 'Admin\RoleController@store')->name('admin.role.store');
Route::get('/admin/role/{id}', 'Admin\RoleController@show')->name('admin.role.show');
Route::get('/admin/role/{id}/edit', 'Admin\RoleController@edit')->name('admin.role.edit');
Route::patch('/admin/role/{id}/update', 'Admin\RoleController@update')->name('admin.role.update');
Route::delete('/admin/role/{id}/destroy', 'Admin\RoleController@destroy')->name('admin.role.destroy');

/*
 * Tags
 */
Route::get('/admin/tags', 'Admin\TagController@index')->name('admin.tag.index');
Route::get('/admin/tag/create', 'Admin\TagController@create')->name('admin.tag.create');
Route::post('/admin/tag/store', 'Admin\TagController@store')->name('admin.tag.store');
Route::get('/admin/tag/{id}', 'Admin\TagController@show')->name('admin.tag.show');
Route::get('/admin/tag/{id}/edit', 'Admin\TagController@edit')->name('admin.tag.edit');
Route::patch('/admin/tag/{id}/update', 'Admin\TagController@update')->name('admin.tag.update');
Route::delete('/admin/tag/{id}/destroy', 'Admin\TagController@destroy')->name('admin.tag.destroy');

/*
 * Users
 */
Route::get('/admin/users', 'Admin\UserController@index')->name('admin.user.index');
Route::get('/admin/user/create', 'Admin\UserController@create')->name('admin.user.create');
Route::post('/admin/user/store', 'Admin\UserController@store')->name('admin.user.store');
Route::get('/admin/user/{id}', 'Admin\UserController@show')->name('admin.user.show');
Route::get('/admin/user/{id}/edit', 'Admin\UserController@edit')->name('admin.user.edit');
Route::patch('/admin/user/{id}/update', 'Admin\UserController@update')->name('admin.user.update');
Route::delete('/admin/user/{id}/destroy', 'Admin\UserController@destroy')->name('admin.user.destroy');

/*
 * UserDisciplines
 */
Route::get('/admin/user_disciplines', 'Admin\UserDisciplineController@index')->name('admin.user_discipline.index');
Route::get('/admin/user_discipline/create', 'Admin\UserDisciplineController@create')->name('admin.user_discipline.create');
Route::post('/admin/user_discipline/store', 'Admin\UserDisciplineController@store')->name('admin.user_discipline.store');
Route::get('/admin/user_discipline/{id}', 'Admin\UserDisciplineController@show')->name('admin.user_discipline.show');
Route::get('/admin/user_discipline/{id}/edit', 'Admin\UserDisciplineController@edit')->name('admin.user_discipline.edit');
Route::patch('/admin/user_discipline/{id}/update', 'Admin\UserDisciplineController@update')->name('admin.user_discipline.update');
Route::delete('/admin/user_discipline/{id}/destroy', 'Admin\UserDisciplineController@destroy')->name('admin.user_discipline.destroy');

/*
 * UserPhotos
 */
Route::get('/admin/user_photos', 'Admin\UserPhotoController@index')->name('admin.user_photo.index');
Route::get('/admin/user_photo/create', 'Admin\UserPhotoController@create')->name('admin.user_photo.create');
Route::post('/admin/user_photo/store', 'Admin\UserPhotoController@store')->name('admin.user_photo.store');
Route::get('/admin/user_photo/{id}', 'Admin\UserPhotoController@show')->name('admin.user_photo.show');
Route::get('/admin/user_photo/{id}/edit', 'Admin\UserPhotoController@edit')->name('admin.user_photo.edit');
Route::patch('/admin/user_photo/{id}/update', 'Admin\UserPhotoController@update')->name('admin.user_photo.update');
Route::delete('/admin/user_photo/{id}/destroy', 'Admin\UserPhotoController@destroy')->name('admin.user_photo.destroy');

/*
 * Watermarks
 */
Route::get('/admin/watermarks', 'Admin\WatermarkController@index')->name('admin.watermark.index');
Route::get('/admin/watermark/create', 'Admin\WatermarkController@create')->name('admin.watermark.create');
Route::post('/admin/watermark/store', 'Admin\WatermarkController@store')->name('admin.watermark.store');
Route::get('/admin/watermark/{id}', 'Admin\WatermarkController@show')->name('admin.watermark.show');
Route::get('/admin/watermark/{id}/edit', 'Admin\WatermarkController@edit')->name('admin.watermark.edit');
Route::patch('/admin/watermark/{id}/update', 'Admin\WatermarkController@update')->name('admin.watermark.update');
Route::delete('/admin/watermark/{id}/destroy', 'Admin\WatermarkController@destroy')->name('admin.watermark.destroy');
