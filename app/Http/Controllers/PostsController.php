<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\User;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $post = Post::all();
        // $post = Post::orderBy('id','DESC')->get();
        return view('post/index')->with('posts',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'this is the create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect('posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return 'this is the show function with the id ' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit')->with('posts',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->body = $request->input('body');
        $post->save();
        return redirect('/home');
        // return 'this is the update function' . $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/home');
    }

    public function get_data(){
        // $post = Post::all();
        $post = Post::orderBy('created_at','DESC')->get();
        return view('post.data')->with('posts',$post);
        // return 'this is a test for the ajax';
    }


    public function test(){
        $post = Post::orderBy('id','DESC')->get();
        return view('post.sandbox')->with('posts',$post);
    }
    

    public function profile(){
        $user_id = auth()->user()->id;
        $post = User::find($user_id);
        return view('post.profile')->with('user',$post);
    }

    public function updateProfile(Request $request){

        if($request->hasFile('profile_image')){
            // get filename with extension
             $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
            //Just Get the filename
             $filename = pathInfo($filenameWithExt,PATHINFO_FILENAME);
            //Just Get the extension
             $extension = $request->file('profile_image')->getClientOriginalExtension();
            //Filename to store
             $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload the file
            $path = $request->file('profile_image')->storeAs('public/profile',$fileNameToStore);
        }else{
            $fileNameToStore = 'default.jpg';
        }


        

        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        //delete previous profile image
        if($request->profile_image != 'default.jpg'){
            //Delete Image
            Storage::delete('public/profile/' . $user->profile_image);
        }
        $user->profile_image = $fileNameToStore;
        $user->save();
        return redirect('/profile');
    }
}
