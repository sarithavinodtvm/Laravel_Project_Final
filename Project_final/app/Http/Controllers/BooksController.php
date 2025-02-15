<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    //view all books
    public function viewAllBooks(){
        $books=Book::all();
        return view("viewAllBooks", ["books"=>$books]);
    }

    //load page to add new book
    public function loadBookEntryPage(){
        return view('bookEntryPage');
    }

    //save new book details
    public function saveBookDetails(Request $request){
            $title=$request->input("txtName");
            $author=$request->input("txtAuth");
            $description=$request->input("txtDescr");
            $book=new Book;
            $book->bookTitle=$title;
            $book->bookAuthor=$author;
            $book->bookDescription=$description;
            $book->save();
            //echo "inserted successfully";
            return redirect("viewAllBooks");
    }
}
