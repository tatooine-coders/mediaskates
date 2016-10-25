<?php
/*
 * Comments :
 * Public people don't have any commenting capacity.
 */

/*
 * Disciplines
 */
Route::get('/', 'DisciplineController@index')->name('discipline.index');
Route::get('/discipline/{id}', 'DisciplineController@show')->name('discipline.show');

/*
 * Events
 */
Route::get('/events', 'EventController@index')->name('event.index');
Route::get('/event/{id}', 'EventController@show')->name('event.show');

/*
 * Photo
 */
//Route::get('/photos', 'PhotoController@index')->name('photo.index');
Route::get('/photo/{id}', 'PhotoController@show')->name('photo.show');

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
 * Users :
 * Login/Logout/Register is handled in routes/web.php
 */
Route::get('/users', 'UserController@index')->name('user.index');
Route::get('/user/{id}', 'UserController@show')->name('user.show');

/*
 * Watermarks
 * No public access
 */

/*
 * Search
 */
Route::get('/advanced_search', 'SearchController@advancedSearch')->name('advanced_search');
Route::post('/search_results', 'SearchController@searchResults')->name('search_results');

/*
 * Page
 */
Route::get('/pages/{file}', 'PageController')->name('pages');

/*
 * CSS show
 */
Route::get('member/cssshow', 'Member\MemberController@cssshow')->name('members.cssshow');
Route::get('admin/cssshow', 'Admin\AdminController@cssshow')->name('admin.cssshow');
