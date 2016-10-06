<?php
/**
 * Basically, full power
 * @TODO: remove useless actions
 */
Route::group(['prefix'=>'admin', 'middleware'=>['role:admin']], function(){
    // Dashboard
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');

    /*
     * Comments
     */
    // Index (view)
    Route::get('/comments', 'Admin\CommentController@index')->name('admin.comment.index');
    // Create (form)
    Route::get('/comment/create', 'Admin\CommentController@create')->name('admin.comment.create');
    // Store (DB)
    Route::post('/comment/store', 'Admin\CommentController@store')->name('admin.comment.store');
    // Show (view)
    Route::get('/comment/{id}', 'Admin\CommentController@show')->name('admin.comment.show');
    // Edit (form)
    Route::get('/comment/{id}/edit', 'Admin\CommentController@edit')->name('admin.comment.edit');
    // Update (DB)
    Route::patch('/comment/{id}/update', 'Admin\CommentController@update')->name('admin.comment.update');
    // Destroy (DB)
    Route::delete('/comment/{id}/destroy', 'Admin\CommentController@destroy')->name('admin.comment.destroy');

    /*
     * Disciplines
     */
    Route::get('/disciplines', 'Admin\DisciplineController@index')->name('admin.discipline.index');
    Route::get('/discipline/create', 'Admin\DisciplineController@create')->name('admin.discipline.create');
    Route::post('/discipline/store', 'Admin\DisciplineController@store')->name('admin.discipline.store');
    Route::get('/discipline/{id}', 'Admin\DisciplineController@show')->name('admin.discipline.show');
    Route::get('/discipline/{id}/edit', 'Admin\DisciplineController@edit')->name('admin.discipline.edit');
    Route::patch('/discipline/{id}/update', 'Admin\DisciplineController@update')->name('admin.discipline.update');
    Route::delete('/discipline/{id}/destroy', 'Admin\DisciplineController@destroy')->name('admin.discipline.destroy');

    /*
     * Events
     */
    Route::get('/events', 'Admin\EventController@index')->name('admin.event.index');
    Route::get('/event/create', 'Admin\EventController@create')->name('admin.event.create');
    Route::post('/event/store', 'Admin\EventController@store')->name('admin.event.store');
    Route::get('/event/{id}', 'Admin\EventController@show')->name('admin.event.show');
    Route::get('/event/{id}/edit', 'Admin\EventController@edit')->name('admin.event.edit');
    Route::patch('/event/{id}/update', 'Admin\EventController@update')->name('admin.event.update');
    Route::delete('/event/{id}/destroy', 'Admin\EventController@destroy')->name('admin.event.destroy');

    /*
     * Licenses
     */
    Route::get('/licenses', 'Admin\LicenseController@index')->name('admin.license.index');
    Route::get('/license/create', 'Admin\LicenseController@create')->name('admin.license.create');
    Route::post('/license/store', 'Admin\LicenseController@store')->name('admin.license.store');
    Route::get('/license/{id}', 'Admin\LicenseController@show')->name('admin.license.show');
    Route::get('/license/{id}/edit', 'Admin\LicenseController@edit')->name('admin.license.edit');
    Route::patch('/license/{id}/update', 'Admin\LicenseController@update')->name('admin.license.update');
    Route::delete('/license/{id}/destroy', 'Admin\LicenseController@destroy')->name('admin.license.destroy');

    /*
     * Permissions
     */
     Route::get('/permissions', 'Admin\RoleController@index')->name('admin.permission.index');
     Route::get('/permission/create', 'Admin\RoleController@create')->name('admin.permission.create');
     Route::post('/permission/store', 'Admin\RoleController@store')->name('admin.permission.store');
     Route::get('/permission/{id}', 'Admin\RoleController@show')->name('admin.permission.show');
     Route::get('/permission/{id}/edit', 'Admin\RoleController@edit')->name('admin.permission.edit');
     Route::patch('/permission/{id}/update', 'Admin\RoleController@update')->name('admin.permission.update');
     Route::delete('/permission/{id}/destroy', 'Admin\RoleController@destroy')->name('admin.permission.destroy');

    /*
     * Photo
     */
    Route::get('/photos', 'Admin\PhotoController@index')->name('admin.photo.index');
    Route::get('/photo/create', 'Admin\PhotoController@create')->name('admin.photo.create');
    Route::post('/photo/store', 'Admin\PhotoController@store')->name('admin.photo.store');
    Route::get('/photo/{id}', 'Admin\PhotoController@show')->name('admin.photo.show');
    Route::get('/photo/{id}/edit', 'Admin\PhotoController@edit')->name('admin.photo.edit');
    Route::patch('/photo/{id}/update', 'Admin\PhotoController@update')->name('admin.photo.update');
    Route::delete('/photo/{id}/destroy', 'Admin\PhotoController@destroy')->name('admin.photo.destroy');

    /*
     * Roles
     */
    Route::get('/roles', 'Admin\RoleController@index')->name('admin.role.index');
    Route::get('/role/create', 'Admin\RoleController@create')->name('admin.role.create');
    Route::post('/role/store', 'Admin\RoleController@store')->name('admin.role.store');
    Route::get('/role/{id}', 'Admin\RoleController@show')->name('admin.role.show');
    Route::get('/role/{id}/edit', 'Admin\RoleController@edit')->name('admin.role.edit');
    Route::patch('/role/{id}/update', 'Admin\RoleController@update')->name('admin.role.update');
    Route::delete('/role/{id}/destroy', 'Admin\RoleController@destroy')->name('admin.role.destroy');

    /*
     * Tags
     */
    Route::get('/tags', 'Admin\PhotoUserTagController@index')->name('admin.tag.index');
    Route::get('/tag/create', 'Admin\PhotoUserTagController@create')->name('admin.tag.create');
    Route::post('/tag/store', 'Admin\PhotoUserTagController@store')->name('admin.tag.store');
    Route::get('/tag/{id}', 'Admin\PhotoUserTagController@show')->name('admin.tag.show');
    Route::get('/tag/{id}/edit', 'Admin\PhotoUserTagController@edit')->name('admin.tag.edit');
    Route::patch('/tag/{id}/update', 'Admin\PhotoUserTagController@update')->name('admin.tag.update');
    Route::delete('/tag/{id}/destroy', 'Admin\PhotoUserTagController@destroy')->name('admin.tag.destroy');

    /*
     * Users
     */
    Route::get('/users', 'Admin\UserController@index')->name('admin.user.index');
    Route::get('/user/create', 'Admin\UserController@create')->name('admin.user.create');
    Route::post('/user/store', 'Admin\UserController@store')->name('admin.user.store');
    Route::get('/user/{id}', 'Admin\UserController@show')->name('admin.user.show');
    Route::get('/user/{id}/edit', 'Admin\UserController@edit')->name('admin.user.edit');
    Route::patch('/user/{id}/update', 'Admin\UserController@update')->name('admin.user.update');
    Route::delete('/user/{id}/destroy', 'Admin\UserController@destroy')->name('admin.user.destroy');

    /*
     * Votes
     */
    /*Route::get('/votes', 'Admin\VoteController@index')->name('admin.vote.index');
    Route::get('/vote/create', 'Admin\VoteController@create')->name('admin.vote.create');
    Route::post('/vote/store', 'Admin\VoteController@store')->name('admin.vote.store');
    Route::get('/vote/{id}', 'Admin\VoteController@show')->name('admin.vote.show');
    Route::get('/vote/{id}/edit', 'Admin\VoteController@edit')->name('admin.vote.edit');
    Route::patch('/vote/{id}/update', 'Admin\VoteController@update')->name('admin.vote.update');
    Route::delete('/vote/{id}/destroy', 'Admin\VoteController@destroy')->name('admin.vote.destroy');
    */
    /*
     * Watermarks
     */
    Route::get('/watermarks', 'Admin\WatermarkController@index')->name('admin.watermark.index');
    Route::get('/watermark/create', 'Admin\WatermarkController@create')->name('admin.watermark.create');
    Route::post('/watermark/store', 'Admin\WatermarkController@store')->name('admin.watermark.store');
    Route::get('/watermark/{id}', 'Admin\WatermarkController@show')->name('admin.watermark.show');
    Route::get('/watermark/{id}/edit', 'Admin\WatermarkController@edit')->name('admin.watermark.edit');
    Route::patch('/watermark/{id}/update', 'Admin\WatermarkController@update')->name('admin.watermark.update');
    Route::delete('/watermark/{id}/destroy', 'Admin\WatermarkController@destroy')->name('admin.watermark.destroy');
});
