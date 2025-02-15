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
                <a class="btn btn-success" onClick="$('#editModal').modal('show')" > Edit </a>
                <a class="btn btn-danger" onClick="$('#deleteModal').modal('show')"> Delete </a>
            </td>
        </tr>
    @endforeach
</table>

{{--Modal for delete confirmation--}}
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
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
{{--end of Modal}}

{{--Modal for populating book details for updation--}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="demoModalLabel">Edit Book Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
            <form name="frmReg" method="post" action="saveBookDetails" onSubmit="return validateBookDetails()" >
			<div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="txtName">Name</label>
                    <input type="text" name="txtName" id="txtName" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="txtAuth">Author</label>
                    <input type="text" name="txtAuth" id="txtAuth" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="txtAuth">Description</label>
                    <textarea name="txtDescr" id="txtDescr" class="form-control"></textarea><br>
                </div>
			</div>
			<div class="modal-footer">
                <input type="submit" value="Save" class="btn btn-primary"/>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			</div>
            </form>
		</div>
	</div>
</div>
{{--end of Modal--}}

@stop