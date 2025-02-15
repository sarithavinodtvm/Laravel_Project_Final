<table class="table">
    <thead>
        <th>Slno</th>
        <th>Title</th>
        <th>Author</th>
        <th>Description</th>
    </thead>
    @foreach($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->bookTitle}}</td>
            <td>{{$book->bookAuthor}}</td>
            <td>{{$book->bookDescription}}</td>
        </tr>
    @endforeach
</table>