<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/books','APIsController@getBooks');

Route::get('/books/{id}','APIsController@getBook');

Route::get('/books/filter/free','APIsController@getFreeBooks');

Route::get('/books/filter/recommended','APIsController@getRecommended');

Route::get('/books/filter/new','APIsController@getNewBooks');

Route::get('/authors/{id}','APIsController@getAuthor');

Route::get('/authors','APIsController@getAllAuthors');

Route::get('/authors/{id}/books','APIsController@getBooksOfAuthor');

Route::get('/genres','APIsController@getGenres');

Route::get('/genres/{id}/books','APIsController@getBooksOfGenre');

Route::get('/collections','APIsController@getCollections');

Route::get('/collections/{id}/books','APIsController@getBooksOfCollection');

Route::get('/publishers','APIsController@getPublishers');

Route::get('/publishers/{id}/books','APIsController@getPublisher');

Route::group(['middleware' => 'auth:api'], function(){

    Route::get('/users/{id}/wishlist','APIsController@getWishlist');

    Route::post('/users/{id}/wishlist','APIsController@addToWishlist');

    Route::delete('/users/{id}/wishlist/{book}','APIsController@removeFromWishlist');

    Route::post('/users/{id}/feedbacks','APIsController@createFeedback');

    Route::get('/users/{id}/feedbacks','APIsController@getFeedbacks');
});


Route::post('login','APIsController@login');

Route::post('register','APIsController@register');