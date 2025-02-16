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
                <button class="btn btn-primary btnEdit" data-id="{{ $book->id }}">Edit</button>
                <a href="#deleteModal" class="btn btn-danger " data-toggle="modal" data-id="{{$book->id}}"> Delete </a>
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
<div class="modal fade" id="editModal" tabindex="-1" role="dialog"  aria-hidden="true">
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
                    <input type="hidden" name="txtId" id="txtId"/>
                <div class="form-group">
                    <label for="txtTitle">Title</label>
                    <input type="text" name="txtTitle" id="txtTitle" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="txtAuth">Author</label>
                    <input type="text" name="txtAuth" id="txtAuth" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="txtDescr">Description</label>
                    <textarea name="txtDescr" id="txtDescr" class="form-control"></textarea><br>
                </div>
			</div>
			<div class="modal-footer">
                <button type="button" id="btnUpdate" class="btn btn-primary">Save</button>
				<button type="button" id="btnCanel" class="btn btn-secondary">Cancel</button>
			</div>
            </form>
		</div>
	</div>
</div>
{{--end of Modal--}}

@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('.btnEdit').click(function() {
            bookId = $(this).data('id');
            jQuery.noConflict(); 
            $.ajax({
                url: '/getBookData/' + bookId,
                method: 'GET',
                success: function(data) {
                    $('#txtId').val(data.book.id);
                    $('#txtTitle').val(data.book.bookTitle);
                    $('#txtAuth').val(data.book.bookAuthor);
                    $('#txtDescr').val(data.book.bookDescription);
                    $('#editModal').modal('show');
                }
            });
        });

        $('#btnUpdate').click(function() {
            jQuery.noConflict(); 
            $.ajax({
                url: '/updateBookDetails/',
                method: 'POST',
                data: {
                    txtId: $('#txtId').val(),
                    txtTitle: $('#txtTitle').val(),  
                    txtAuth: $('#txtAuth').val(),  
                    txtDescr: $('#txtDescr').val(),  
                    _token: $('meta[name="csrf-token"]').attr('content')    
                },
                success: function(response) {
                    alert(response.message);
                    $('#editModal').modal('hide');
                }
            });
        });
    });
</script>
@stop

