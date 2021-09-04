<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Http\Middleware\VerifyCategoriesCount;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('verifyCategoriesCount')->only(['create','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')
        ->with('posts', Post::all())
        ->with('users', User::all())
        ->with('categories_count', Category::all())
        ->with('tag_count', Tag::all());
    }
    public function try(){
        return view('try');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
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
        $post = Post::create([
          'title'=> $request->title,
          'description'=>$request->description,
          'content'=>$request->content,
          'image'=>$image,
          'published_at'=>$request->published_at,
          'user_id' => auth()->user()->id,
          'category_id' => $request->category

        ]);

        if($request->tags){
            $post->tags()->attach($request->tags);
        }
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
    public function show(Post $post)
    {
        return view('blog.show')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
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
    public function category(Category $category){

        return view('blog.category')
        ->with('category', $category)
        ->with('posts', $category->posts()->searched()->paginate(6))
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    public function tag(Tag $tag){
        return view('blog.tag')
        ->with('tag', $tag)
        ->with('posts', $tag->posts()->searched()->paginate(6))
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }
}
