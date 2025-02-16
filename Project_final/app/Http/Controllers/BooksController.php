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
            if($title=="")
                echo "Title cannot be null";
            else if($author=="")
                echo "Author cannot be null";
            else{
                $book=new Book;
                $book->bookTitle=$title;
                $book->bookAuthor=$author;
                $book->bookDescription=$description;
                $book->save();
                //echo "inserted successfully";
                return redirect("viewAllBooks");
            }
    }

    public function getBookDataById($bookId){
        $book=Book::find($bookId);
        return response()->json(['book' => $book]);
    }

    //update existing book details by book id
    public function updateBookDetails(Request $request){
        var_dump($request);
        $id=$request->input("txtId");
        $title=$request->input("txtTitle");
        $author=$request->input("txtAuth");
        $description=$request->input("txtDescr");
        if($title=="")
            echo "Title cannot be null";
        else if($author=="")
            echo "Author cannot be null";
        else{
            $book=Book::find($id);
            $book->bookTitle=$title;
            $book->bookAuthor=$author;
            $book->bookDescription=$description;
            $book->save();
            //echo "updated successfully";
            return response()->json(['message' => 'Book updated successfully!']);
        }
}
}
