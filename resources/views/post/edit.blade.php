@extends('layouts.app')
@section('content')

{{-- <h1>Edit Post</h1>  
<form action="" method="post">
        <div class="form-group">
    <label>dsadas</label>
    <input type="text">
        </div>

</form> --}}
<h1>Edit Post</h1>
<form method="POST" action="../{{$posts->id}}" >
 @csrf
    <div class="form-group">
        <label for="description">Body</label>
    <textarea class="form-control" name="body" cols="50" rows="10" id="description">{{$posts->body}}</textarea>
    </div>
   
    <input name="_method" type="hidden" value="PUT">
    <input class="btn btn-primary" type="submit" value="Submit">
</form>



@endsection