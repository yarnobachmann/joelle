<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', 'PagesController@index');

Route::get('login', ['as' => 'login', 'uses' => 'PagesController@login']);

Route::post('user/do-login', 'Auth\LoginController@doLogin');
Route::get('user/logout', function(){
  Auth::logout();
  return redirect('/');
});

Route::get('migrate', function() {

      echo '<br>init with Migrate tables ...';
      Artisan::call('migrate', ['--quiet' => true, '--force' => true]);
      echo '<br>done with Migrate tables';
});

Route::get('gallery/list', 'GalleryController@viewGalleryList');
Route::post('gallery/save', 'GalleryController@saveGallery');
Route::get('gallery/delete/{id}', 'GalleryController@deleteGallery');
Route::get('gallery/view/{id}', 'GalleryController@viewGalleryPics');
Route::get('photos/{id}', 'pagesController@photo');
Route::post('image/do-upload', 'GalleryController@doImageUpload');
Route::get('albums', 'pagesController@album');
