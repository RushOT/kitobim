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

use App\Book;
use Illuminate\Support\Facades\Storage;

Route::get('/', 'KitobimController@welcome');

Route::get('/verify-user/{code}','KitobimController@activateUser')->name('activate.user');

Route::get('/browse/{item}','KitobimController@browse');

Route::get('/books/sort/{type}','KitobimController@getBooksType');

Route::get('/authors','KitobimController@authors');

Route::get('/authors/{id}','KitobimController@getAuthor');

Route::get('/publishers/{id}','KitobimController@getPublisher');

Route::get('/books/{id}','KitobimController@book');

Route::get('/publishers','KitobimController@getPublishers');

Route::get('/kitobim/{epoint}','KitobimController@flatpages');

Route::get('/mybooks','HomeController@getHome');

Route::get('/download/{id}', function ($id){
    $book = Book::find($id);

    return Storage::download($book->epub);
});

Route::get('/admin', function () {
    $usersCount = \App\User::count();
    $activeUsersCount = \App\User::where('is_active', 1)->count();
    $booksCount = Book::count();
    $authorsCount = \App\Author::count();
    $publishersCount = \App\Publisher::count();
    $magazinesCount = \App\Magazine::count();

    return view('carbon.dashboard', compact('usersCount', 'activeUsersCount',
        'booksCount','authorsCount','publishersCount','magazinesCount'));
})->middleware('auth','admin');

Route::get('/admin/feedbacks','KitobimController@getFeedbacks')->middleware('auth');

Route::get('/admin/feedbacks/{id}','KitobimController@getFeedback')->middleware('auth');

Route::patch('/admin/feedbacks/{id}','KitobimController@setResponse')->middleware('auth');

/*USERS routes*/
Route::get('/admin/users','UsersController@index');

Route::get('/admin/user','UsersController@create');

Route::post('/admin/user','UsersController@store');

Route::get('/admin/users/{id}','UsersController@edit');

Route::patch('/admin/users/{id}','UsersController@update');

Route::delete('/admin/users/{id}','UsersController@destroy');
/*PUBLISHERS related routes*/

Route::get('/admin/publishers', 'PublisherController@index');

Route::get('/admin/publisher','PublisherController@create');

Route::post('/admin/publishers','PublisherController@store');

Route::get('/admin/publishers/{id}','PublisherController@edit');

Route::patch('/admin/publishers/{id}','PublisherController@update');

Route::delete('/admin/publishers/{id}','PublisherController@destroy');

/*BOOKS related routes*/

Route::get('/admin/books', 'BooksController@index');

Route::get('/admin/book','BooksController@create');

Route::get('/admin/books/{id}', 'BooksController@edit');

Route::patch('/admin/books/{id}', 'BooksController@update');

Route::delete('/admin/books/{id}', 'BooksController@destroy');

Route::post('/admin/books', 'BooksController@store');

Route::post('/relatedbook', 'BooksController@getRelatedBook');

/*AUTHORS related routes*/

Route::get('/admin/authors', 'AuthorsController@index');

Route::get('/admin/author', 'AuthorsController@create');

Route::post('/admin/authors', 'AuthorsController@store');

Route::get('/admin/authors/{id}','AuthorsController@edit');

Route::patch('/admin/authors/{id}','AuthorsController@update');

Route::delete('/admin/authors/{id}','AuthorsController@destroy');


/*GENRES related routes*/

Route::get('/admin/genres','GenresController@create');

Route::get('/admin/genres/{id}','GenresController@show');

Route::post('/admin/genres','GenresController@store');

Route::patch('/admin/genres/{id}','GenresController@update');

Route::delete('/admin/genres/{id}','GenresController@destroy');

/*COLLECTIONS related routes*/

Route::get('/admin/collections','CollectionsController@index');

Route::post('/admin/collections','CollectionsController@store');

Route::get('/admin/collections/{id}','CollectionsController@edit');

Route::patch('/admin/collections/{id}','CollectionsController@update');

Route::post('/admin/collections/{id}/books','CollectionsController@addBooks');

Route::delete('/admin/collections/{id}','CollectionsController@destroy');

/*MAGAZINE routes*/

Route::get('/admin/magazines','MagazinesController@create');

Route::post('/admin/magazines', 'MagazinesController@store');

Route::get('/admin/magazines/{id}', 'MagazinesController@edit');

Route::patch('/admin/magazines/{id}', 'MagazinesController@update');

Route::delete('/admin/magazines/{id}', 'MagazinesController@destroy');
/*ISSUE routes*/

Route::get('/admin/issue','MagazinesController@createIssue');

Route::get('/admin/issues','MagazinesController@allIssues');

Route::post('/admin/issues','MagazinesController@storeIssue');

Route::get('/admin/issues/{id}','MagazinesController@editIssue');

Route::patch('/admin/issues/{id}','MagazinesController@updateIssue');

Route::delete('/admin/issues/{id}','MagazinesController@destroyIssue');

/*FLAT PAGES*/

Route::get('/admin/pages','PagesController@index');

Route::get('/admin/pages/create','PagesController@create');

Route::post('/admin/pages','PagesController@store');

Route::get('/admin/pages/{id}','PagesController@edit');

Route::patch('/admin/pages/{id}','PagesController@update');

Route::delete('/admin/pages/{id}','PagesController@destroy');

/*NOTIFICATIONS*/

Route::get('/admin/notifications', 'NotificationController@index');

Route::get('/admin/notifications/create','NotificationController@create');

Route::post('/admin/notifications','NotificationController@store');

Route::get('/admin/notifications/{id}','NotificationController@edit');

Route::patch('/admin/notifications/{id}','NotificationController@update');

Route::delete('/admin/notifications/{id}','NotificationController@destroy');

/*DOWNLOAD Section*/

Route::get('/download/books/{filename}','KitobimController@downloadBook');

Route::get('/download/issuespdf/{filename}','KitobimController@downloadPdf');

Route::get('/download/issuesepub/{filename}','KitobimController@downloadEpub');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*AJAX*/

Route::post('/wishlistremove','KitobimController@removeFromWishlist');

Route::post('/ratebook','KitobimController@rateBook');

Route::post('/wishlist','KitobimController@addToWishlist');

Route::post('/authorsajax','AuthorsController@getAuthorsForSearch');

Route::post('/booksajax','BooksController@getBooksForSearch');

Route::post('/search','KitobimController@search');

Route::get('/search/results/{keyword}','KitobimController@wideSearch');