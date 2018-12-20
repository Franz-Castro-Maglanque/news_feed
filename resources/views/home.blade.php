@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Your Posts</h3>
                    @foreach($posts as $post)
    <!--- \\\\\\\Post-->
    <div class="card gedf-card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mr-2">
                        <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                    </div>
                    <div class="ml-2">
                    <div class="h5 m-0"><a href="">{{$post->user->name}}</a></div>
                    <?php  $newDate = date("M d", strtotime($post->created_at)); ?>
                    <div>{{$newDate}}</div>
                       
                    </div>
                </div>
                @if(!Auth::guest())
                <div>
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                            {{-- <button class="dropdown-item" href="" id="editPost">Edit Post</button> --}}
                            <a href="posts/{{$post->id}}/edit" class="dropdown-item">Edit Post</a>
                        <form action="posts/{{$post->id}}" method="POST">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <input type="submit" class="dropdown-item" value="Delete Post">
                        </form>
                          
                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>
        <div class="card-body">

            <p class="card-text">

                     {{$post->body}}
                     
            </p>
        
        </div>
        
    </div>
    <!-- Post /////-->
@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
