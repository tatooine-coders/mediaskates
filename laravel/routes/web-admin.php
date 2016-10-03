<?php
/**
 * Basically, full power
 * @TODO: remove useless actions
 */
Route::group(['middleware'=>['auth']], function(){
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
     * Licenses
     */
    Route::get('/admin/licenses', 'Admin\LicenseController@index')->name('admin.license.index');
    Route::get('/admin/license/create', 'Admin\LicenseController@create')->name('admin.license.create');
    Route::post('/admin/license/store', 'Admin\LicenseController@store')->name('admin.license.store');
    Route::get('/admin/license/{id}', 'Admin\LicenseController@show')->name('admin.license.show');
    Route::get('/admin/license/{id}/edit', 'Admin\LicenseController@edit')->name('admin.license.edit');
    Route::patch('/admin/license/{id}/update', 'Admin\LicenseController@update')->name('admin.license.update');
    Route::delete('/admin/license/{id}/destroy', 'Admin\LicenseController@destroy')->name('admin.license.destroy');

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
    Route::get('/admin/tags', 'Admin\PhotoUserTagController@index')->name('admin.tag.index');
    Route::get('/admin/tag/create', 'Admin\PhotoUserTagController@create')->name('admin.tag.create');
    Route::post('/admin/tag/store', 'Admin\PhotoUserTagController@store')->name('admin.tag.store');
    Route::get('/admin/tag/{id}', 'Admin\PhotoUserTagController@show')->name('admin.tag.show');
    Route::get('/admin/tag/{id}/edit', 'Admin\PhotoUserTagController@edit')->name('admin.tag.edit');
    Route::patch('/admin/tag/{id}/update', 'Admin\PhotoUserTagController@update')->name('admin.tag.update');
    Route::delete('/admin/tag/{id}/destroy', 'Admin\PhotoUserTagController@destroy')->name('admin.tag.destroy');

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
     * Votes
     */
    /*Route::get('/admin/votes', 'Admin\VoteController@index')->name('admin.vote.index');
    Route::get('/admin/vote/create', 'Admin\VoteController@create')->name('admin.vote.create');
    Route::post('/admin/vote/store', 'Admin\VoteController@store')->name('admin.vote.store');
    Route::get('/admin/vote/{id}', 'Admin\VoteController@show')->name('admin.vote.show');
    Route::get('/admin/vote/{id}/edit', 'Admin\VoteController@edit')->name('admin.vote.edit');
    Route::patch('/admin/vote/{id}/update', 'Admin\VoteController@update')->name('admin.vote.update');
    Route::delete('/admin/vote/{id}/destroy', 'Admin\VoteController@destroy')->name('admin.vote.destroy');
    */
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
});
