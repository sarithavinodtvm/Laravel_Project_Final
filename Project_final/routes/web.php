<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route to View all books 

Route::get('/viewAllBooks', [BooksController::class, 'viewAllBooks']);

//Route to load new book entry page

Route::get('/addNewBook', [BooksController::class, 'loadBookEntryPage']);

//Route to save new book details

Route::post('/saveBookDetails', [BooksController::class, 'saveBookDetails']);

//Route to get book details by ID

Route::get('/getBookData/{bookId}', [BooksController::class, 'getBookDataById']);

//Route to update boook details by ID

Route::post('/updateBookDetails', [BooksController::class, 'updateBookDetails']);


