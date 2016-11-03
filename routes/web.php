<?php
/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
 */

// Home
Route::get('/', function () {
    return view('home');
});

// App routes
include('web-public.php');
include('web-user.php');
include('web-photograph.php');
include('web-admin.php');

// Base Auth routes
Auth::routes();
