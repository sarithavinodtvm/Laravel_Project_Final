@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
    <h1>List of Books</h1>
@stop

@section('content')
<html>
    <body>
        <h1>Add New Book</h1>
        <form name="frmReg" method="post" action="saveBookDetails" >
            @csrf
            Name <input type="text" name="txtName" id="txtName" /></br>
            Author <input type="text" name="txtAuth" id="txtAuth"  /><br>
            Description<textarea name="txtDescr" id="txtDescr"></textarea><br>
            <input type="submit" value="Save"/></br>
            <input type="reset" value="Cancel"/>
        </form>
    </body>
</html>
@stop
