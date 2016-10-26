<?php
Route::group(['prefix'=>'member', 'middleware'=>['role:member|admin|photograph']], function(){

    /*
     * Comments
     */
    Route::get('/', 'Member\CommentController@index')->name('user.comment.index');
    Route::post('/comment/store', 'Member\CommentController@store')->name('user.comment.store');
    Route::patch('/comment/{id}/update', 'Member\CommentController@update')->name('user.comment.update');
    Route::delete('/comment/{id}/destroy', 'Member\CommentController@destroy')->name('user.comment.destroy');

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
    Route::get('/me/preferences', 'Member\UserController@editPrefs')->name('user.preferences');
    Route::patch('/me/update_preferences', 'Member\UserController@updatePrefs')->name('user.preferences.update');
    Route::patch('/me/update_passwd', 'Member\UserController@updatePasswd')->name('user.update_passwd');
    Route::get('me/update_role', 'Member\UserController@askPhotograph')->name('user.ask_photograph');
    Route::delete('/me/close_account', 'Member\UserController@destroy')->name('user.close_account');
    Route::get('/me/logout', 'Auth\LoginController@logout')->name('user.logout');

     /*
      * Votes
      */
     Route::get('/votes', 'Member\VoteController@index')->name('user.vote.index');
     Route::get('/vote/create', 'Member\VoteController@create')->name('user.vote.create');
     Route::post('/vote/store', 'Member\VoteController@store')->name('user.vote.store');
     Route::get('/vote/{id}', 'Member\VoteController@show')->name('user.vote.show');
     Route::get('/vote/{id}/edit', 'Member\VoteController@edit')->name('user.vote.edit');
     Route::patch('/vote/{id}/update', 'Member\VoteController@update')->name('user.vote.update');
     Route::delete('/vote/{id}/destroy', 'Member\VoteController@destroy')->name('user.vote.destroy');
});
