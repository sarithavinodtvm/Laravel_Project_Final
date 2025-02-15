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

//Routes to add new book

Route::get('/addNewBook', [BooksController::class, 'loadBookEntryPage']);

Route::post('/saveBookDetails', [BooksController::class, 'saveBookDetails']);
