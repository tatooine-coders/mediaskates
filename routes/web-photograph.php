<?php
Route::group(['prefix'=>'member', 'middleware'=>['role:photograph']], function(){
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
  Route::post('/photo/ajax_upload', 'Member\PhotoController@ajaxUpload')->name('user.photo.ajax_upload');
  Route::post('/photo/ajax_cancel', 'Member\PhotoController@ajaxCancel')->name('user.photo.ajax_cancel');
  Route::get('/photo/{id}', 'Member\PhotoController@show')->name('user.photo.show');
  Route::get('/photo/{id}/edit', 'Member\PhotoController@edit')->name('user.photo.edit');
  Route::patch('/photo/{id}/update', 'Member\PhotoController@update')->name('user.photo.update');
  Route::delete('/photo/{id}/destroy', 'Member\PhotoController@destroy')->name('user.photo.destroy');
});
