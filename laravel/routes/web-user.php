<?php
Route::group(['middleware'=>['auth']], function(){

    /*
     * Comments
     */
    Route::get('/user/comments', 'User\CommentController@index')->name('user.comment.index');
    Route::post('/user/comment/store', 'User\CommentController@store')->name('user.comment.store');
    Route::patch('/user/comment/{id}/update', 'User\CommentController@update')->name('user.comment.update');
    Route::delete('/user/comment/{id}/destroy', 'User\CommentController@destroy')->name('user.comment.destroy');

    /*
     * Disciplines
     */
    /*// Index (view)
    Route::get('/user/disciplines', 'User\DisciplineController@index')->name('user.discipline.index');
    Route::get('/user/discipline/create', 'User\DisciplineController@create')->name('user.discipline.create');
    Route::post('/user/discipline/store', 'User\DisciplineController@store')->name('user.discipline.store');
    Route::get('/user/discipline/{id}', 'User\DisciplineController@show')->name('user.discipline.show');
    Route::get('/user/discipline/{id}/edit', 'User\DisciplineController@edit')->name('user.discipline.edit');
    Route::patch('/user/discipline/{id}/update', 'User\DisciplineController@update')->name('user.discipline.update');
    // Destroy should be available if no events are in it
    Route::delete('/user/discipline/{id}/destroy', 'User\DisciplineController@destroy')->name('user.discipline.destroy');
    */

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
    Route::get('/me', 'User\UserController@show')->name('user.dashboard');
    Route::get('/me/edit', 'User\UserController@edit')->name('user.personnal_infos');
    Route::patch('/me/update', 'User\UserController@update')->name('user.personnal_infos.update');
    Route::get('/me/preferences', 'User\UserController@edit_prefs')->name('user.preferences');
    Route::patch('/me/update_preferences', 'User\UserController@update_prefs')->name('user.preferences.update');
    Route::patch('/me/update_passwd', 'User\UserController@update_passwd')->name('user.update_passwd');
    Route::delete('/me/close_account', 'User\UserController@destroy')->name('user.close_account');
    Route::get('/me/logout', 'Auth\LoginController@logout')->name('user.logout');

    /*
     * Watermarks
     * http://risovach.ru/upload/2013/06/mem/u_22667895_big_.png
     */

     /*
      * Votes
      */
     Route::get('/user/votes', 'user\VoteController@index')->name('user.vote.index');
     Route::get('/user/vote/create', 'user\VoteController@create')->name('user.vote.create');
     Route::post('/user/vote/store', 'user\VoteController@store')->name('user.vote.store');
     Route::get('/user/vote/{id}', 'user\VoteController@show')->name('user.vote.show');
     Route::get('/user/vote/{id}/edit', 'user\VoteController@edit')->name('user.vote.edit');
     Route::patch('/user/vote/{id}/update', 'user\VoteController@update')->name('user.vote.update');
     Route::delete('/user/vote/{id}/destroy', 'user\VoteController@destroy')->name('user.vote.destroy');
});
