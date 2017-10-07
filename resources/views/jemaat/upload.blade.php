@extends('index')

@section('content')

<form action="/uploadfile" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h2>Upload Data Kaum Saleh:</h2>
    <br />
    <input type="file" name="dataKaumSaleh" required />
    <br /><br />
    <input type="submit" value="Upload" />
</form>

@stop