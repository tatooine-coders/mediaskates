<?php
Route::group(['prefix'=>'member', 'middleware'=>['role:user|admin|photograph']], function(){

    /*
     * Comments
     */
    Route::get('/comments', 'Member\CommentController@index')->name('user.comment.index');
    Route::post('/comment/store', 'Member\CommentController@store')->name('user.comment.store');
    Route::patch('/comment/{id}/update', 'Member\CommentController@update')->name('user.comment.update');
    Route::delete('/comment/{id}/destroy', 'Member\CommentController@destroy')->name('user.comment.destroy');

    /*
     * Events
     */
    Route::get('/events', 'Member\EventController@index')->name('user.event.index');
    Route::get('/event/create', 'Member\EventController@create')->name('user.event.create');
    Route::post('/event/store', 'Member\EventController@store')->name('user.event.store');
    Route::get('/event/{id}', 'Member\EventController@show')->name('user.event.show');
    Route::get('/event/{id}/edit', 'Member\EventController@edit')->name('user.event.edit');
    Route::patch('/event/{id}/update', 'Member\EventController@update')->name('user.event.update');
    // Destroy should be available if no picture are in it
    Route::delete('/event/{id}/destroy', 'Member\EventController@destroy')->name('user.event.destroy');

    /*
     * Photo
     */
    Route::get('/photos', 'Member\PhotoController@index')->name('user.photo.index');
    Route::get('/photo/create', 'Member\PhotoController@create')->name('user.photo.create');
    Route::post('/photo/store', 'Member\PhotoController@store')->name('user.photo.store');
    Route::get('/photo/{id}', 'Member\PhotoController@show')->name('user.photo.show');
    Route::get('/photo/{id}/edit', 'Member\PhotoController@edit')->name('user.photo.edit');
    Route::patch('/photo/{id}/update', 'Member\PhotoController@update')->name('user.photo.update');
    Route::delete('/photo/{id}/destroy', 'Member\PhotoController@destroy')->name('user.photo.destroy');

    /*
     * Tags
     */
    Route::get('/tags', 'Member\TagController@index')->name('user.tag.index');
    Route::get('/tag/create', 'Member\TagController@create')->name('user.tag.create');
    Route::post('/tag/store', 'Member\TagController@store')->name('user.tag.store');
    Route::get('/tag/{id}', 'Member\TagController@show')->name('user.tag.show');
    Route::get('/tag/{id}/edit', 'Member\TagController@edit')->name('user.tag.edit');
    Route::patch('/tag/{id}/update', 'Member\TagController@update')->name('user.tag.update');
    Route::delete('/tag/{id}/destroy', 'Member\TagController@destroy')->name('user.tag.destroy');

    /*
     * Users
     * All interactions should depend on the currently logged in user.
     */
    Route::get('/me', 'Member\UserController@show')->name('user.dashboard');
    Route::get('/me/edit', 'Member\UserController@edit')->name('user.personnal_infos');
    Route::patch('/me/update', 'Member\UserController@update')->name('user.personnal_infos.update');
    Route::get('/me/preferences', 'Member\UserController@edit_prefs')->name('user.preferences');
    Route::patch('/me/update_preferences', 'Member\UserController@update_prefs')->name('user.preferences.update');
    Route::patch('/me/update_passwd', 'Member\UserController@update_passwd')->name('user.update_passwd');
    Route::delete('/me/close_account', 'Member\UserController@destroy')->name('user.close_account');
    Route::get('/me/logout', 'Auth\LoginController@logout')->name('user.logout');

    /*
     * Watermarks
     * http://risovach.ru/upload/2013/06/mem/u_22667895_big_.png
     */

     /*
      * Votes
      */
     Route::get('/votes', 'user\VoteController@index')->name('user.vote.index');
     Route::get('/vote/create', 'user\VoteController@create')->name('user.vote.create');
     Route::post('/vote/store', 'user\VoteController@store')->name('user.vote.store');
     Route::get('/vote/{id}', 'user\VoteController@show')->name('user.vote.show');
     Route::get('/vote/{id}/edit', 'user\VoteController@edit')->name('user.vote.edit');
     Route::patch('/vote/{id}/update', 'user\VoteController@update')->name('user.vote.update');
     Route::delete('/vote/{id}/destroy', 'user\VoteController@destroy')->name('user.vote.destroy');
});
