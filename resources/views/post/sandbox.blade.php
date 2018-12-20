@extends('layouts.app')
@section('content')

@foreach($posts as $post)

{{$post->body}}
<hr>

@endforeach
@endsection