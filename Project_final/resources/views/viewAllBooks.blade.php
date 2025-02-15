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
                <a class="btn btn-danger" onClick="$('#demoModal').modal('show')"> Delete </a>
            </td>
        </tr>
    @endforeach
</table>

{{--Modal for delete confirmation--}}
<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="demoModalLabel">Confirmation - Delete Book</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				Are you sure you want to delete this book?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				<button type="button" class="btn btn-primary">Yes</button>
			</div>
		</div>
	</div>
</div>
{{--end of Modal for delete confirmation--}}

@stop