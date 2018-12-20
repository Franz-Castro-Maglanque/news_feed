<div class="container-fluid gedf-wrapper">
    <div class="row">

            <div class="col-md-3">
                  
                </div>


<div class="col-md-6 gedf-main">

    <!--- \\\\\\\Post-->
    <div class="card gedf-card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Make
                        a publication</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Images</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                    @csrf
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                    <div class="form-group">
                        <label class="sr-only" for="message">post</label>
                        <textarea class="form-control" id="message" rows="3" placeholder="What are you thinking?" name="body"></textarea>
                    </div>

                </div>
                <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Upload image</label>
                        </div>
                    </div>
                    <div class="py-4"></div>
                </div>
            </div>
            <div class="btn-toolbar justify-content-between">
                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">share</button>
                </div>
  
            </div>
            </form>
        </div>
    </div>
    <!-- Post /////-->
@foreach($posts as $post)
    <!--- \\\\\\\Post-->
    <div class="card gedf-card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mr-2">
                    <img class="rounded-circle" width="45" src="storage/profile/{{$post->user->profile_image}}" alt="">
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
                            <button class="dropdown-item" href="" id="editPost">Edit Post</button>
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
<script type="text/javascript">

    $(document).ready(function(){
  
          $('#editPost').on('click',function(){
       
           
        });
    });
    </script>