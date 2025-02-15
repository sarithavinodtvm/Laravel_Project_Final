@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
    <h1>List of Books</h1>
@stop

@section('content')
<table class="table table-striped">
    <thead>
        <th>Slno</th>
        <th>Title</th>
        <th>Author</th>
        <th>Description</th>
        <th>Actions</th>
    </thead>
    @foreach($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->bookTitle}}</td>
            <td>{{$book->bookAuthor}}</td>
            <td>{{$book->bookDescription}}</td>
            <td>
                <a href="loadEditBookPage" class="btn btn-success"> Edit </a>
                <a href="deleteBook" class="btn btn-danger"> Delete </a>
            </td>
        </tr>
    @endforeach
</table>
@stop