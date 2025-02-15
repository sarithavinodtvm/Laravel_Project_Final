@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
    <h1>Add new Book</h1>
@stop

@section('content')
        <form name="frmReg" method="post" action="saveBookDetails" onSubmit="return validateBookDetails()" >
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
            <input type="submit" value="Save" class="btn btn-primary"/>
            <input type="reset" value="Cancel" class="btn btn-warning"/>
        </form>
@stop

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
    function validateBookDetails(){
        if($('#txtName').val()==""){
            alert("Book name cannot be null");
            return false;
        }
        else if($('#txtAuth').val()==""){
            alert("Author name cannot be null");
            return false;
        }
        else
            return true;

    }
    </script>
@stop
