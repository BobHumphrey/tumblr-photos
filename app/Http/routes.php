<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
  return view ('home');
});
Route::resource('galleries', 'GalleriesController');
// Extra route to handle delete warning
Route::get('galleries/delete/{id}', 'GalleriesController@delete');


// Extra route to provide alternate list of photos
Route::get('photos/list/{newOnly?}', 'PhotosController@listing');
// Extra route to display tumblr likes
Route::get('photos/likes', 'PhotosController@likes');
// Extra route to control index paging
Route::get('photos/display/{page?}', 'PhotosController@index');

Route::resource('photos', 'PhotosController');
// Extra route to handle delete warning
Route::get('photos/delete/{id}', 'PhotosController@delete');


Route::resource('submissions', 'SubmissionsController');
// Extra route to handle delete warning
Route::get('submissions/delete/{id}', 'SubmissionsController@delete');
// Extra route to handle creating submission from a photo
Route::get('submissions/create/{id}', 'SubmissionsController@create');

// Authentication routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Admin routes
Route::get('admin/index', 'AdminController@index');
