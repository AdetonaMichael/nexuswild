<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all()); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        // upload the image
        $image = $request->image->store('posts');
        //create the post 
        Post::create([
          'title'=> $request->title,
          'description'=>$request->description,
          'content'=>$request->content,
          'image'=>$image,
          'published_at'=>$request->published_at

        ]);
        // flash the message
        session()->flash('success', 'Post Created Successfully!...');
        // redirect the user
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post) {
        $data = $request->only(['title','description','published_at','content']);
        
        //check image
        if($request->hasFile('image')){
              
             //upload image
             $image = $request->image->store('posts');

              // delete old one
              $post->deleteImage();

              $data['image'] = $image;
        }
           
            // update attribute
            $post->update($data);

            // flash message
            session()->flash('success',"Post Updated Successfully...");

            // re-direct the user
            return redirect(route('posts.index'));
    
    }
    /**
     * Remove the specified resource from storage.
     *

     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();  
        if($post->trashed()){
            $post->forceDelete();
        }else{
            $post->deleteImage();
            $post->delete();
        }
        session()->flash('success', 'The Item Has been Deleted Successfully!...');
        return redirect(route('posts.index'));
        }
    
    /**
     * Displays a list of all trashed posts
     * @return \Illuminate\Http\Response
     */
    public function trashed(){
        $trashed = Post::onlyTrashed()->get();
        return view('posts.index')->with('posts', $trashed);
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();
        session()->flash('success', 'Post Restored Successfully...');
        return redirect()->back();
    }
}
