<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function viewAllBooks(){
        $books=Book::all();
        return view("viewAllBooks", ["books"=>$books]);
    }
}
