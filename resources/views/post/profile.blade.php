@extends('layouts.app')
@section('content')

<div class="container bootstrap snippet">
        <div class="row">
              <div class="col-sm-10"><h1 align="center">{{$user->name}}</h1>
              </div>
        </div>
                    <div class="row">
                        <div class="col-sm-3"><!--left col-->

                            <div class="text-center">
                                 
                            <img src="{{asset("storage/profile/$user->profile_image")}}" class="avatar rounded-circle img-thumbnail" alt="avatar">
                            </div></hr><br>
                            <form enctype="multipart/form-data" action="profile" method="POST">
                                {{-- <label>Update Profile Image</label> --}}
                                <input type="file" name="profile_image">
                                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                
                
                            
                    </div><!--/col-3-->
                    <div class="col-sm-9">
                            <hr>
         
                                    <div class="form-group">
                                        <div class="form-group">
                                                <div class="col-6">
                                                    <label for="password"><h4>Email Address</h4></label>
                                                <input type="text" class="form-control" name="password" value="{{$user->email}}" readonly>
                                                </div>
                                    </div>
                      
                                    
                                   <hr>
                </div><!--/tab-pane-->
</div><!--/col-9-->
{{-- <a href="http://localhost/spoonbook/public/posts" class="btn btn-primary">Go Back</a> --}}
<input type="submit" class="pull-right btn btn-sm btn-primary">
</form>


@endsection