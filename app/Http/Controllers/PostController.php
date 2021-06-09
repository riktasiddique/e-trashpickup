<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post:: Paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'title' => "required",
            'image_1' => "required",
            'description' => "required",
            'weight' => "required",
            'price' => "required"
            
        ]);

        $user = Auth::user();

        $image_1 = $request->image_1;
        $image_2 = $request->image_2;
        $image_3 = $request->image_3;
        
        $path_1 = $image_1 ? Storage::url($request->file('image_1')->store('public/images/' . $user->id)): '';
        $path_2 = $image_2 ? Storage::url( $request->file('image_2')->store('public/images/' . $user->id)) : '';
        $path_3 = $image_3 ?  Storage::url($request->file('image_3')->store('public/images/' . $user->id)) : '';

        $post = new Post();
        $post->user_id =  $user->id;
        $post->image1 =  $path_1;
        $post->image2 =  $path_2;
        $post->image3 =  $path_3;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->weight = $request->weight;
        $post->price = $request->price;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post Created Successfuly!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
