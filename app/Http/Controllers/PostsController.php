<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('checkCat')->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index' , compact('posts', $posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create' , ['categories' => Category::all() , 'tags' => Tag::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $image = ($request->image->store('postImages','public'));     //=>second Para refere to disk
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category,
            'content' => $request->content,
            'image' => $image,
            'user_id' => $request->user_id,
        ]);
        if($request->tags){
            $post->tags()->attach($request->tags);
        }
        session()->flash('success', 'The Post Created Successfully');
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
        return view('posts.show' , compact('post', $post));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags= Tag::all();
        return view('posts.edit')->withpost($post)->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title' , 'description', 'content']);
        if($request->hasFile('image')){
            Storage::disk('public')->delete($post->image);
            $data['image'] = $request->image->store('postImages', 'public');
        }
        $post->update($data);
        session()->flash('success', 'The Post Updated Successfully');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // Remodify destroy method to difine trashed posts and non trashed
    public function destroy($id)
    {        
        $post = Post::withTrashed()->where('id', $id)->first();
        if($post->trashed()){
            $post->forceDelete();
            Storage::disk('public')->delete($post->image);
            session()->flash('deleted', 'The Post was deleted Successfully');
        }else{
            $post->delete();
            session()->flash('deleted', 'The Post was trashed Successfully');
        }
        return redirect(route('posts.index'));
    }

    // show trashed items
    public function trashed(){
        $trashed = Post::onlyTrashed()->get();
        return view('posts.index')->withposts ($trashed);
    }

    public function restore($id){

        Post::withTrashed()->where('id',$id)->restore();
        session()->flash('success', 'The Post Was Restored Successfully');
        return redirect(route('posts.index'));
    }

}
