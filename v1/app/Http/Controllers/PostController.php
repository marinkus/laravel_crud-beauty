<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Photo;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|min:3|max:20',
                'price' => 'required|numeric|min:1',
                'photo.*' => 'sometimes|required|mimes:jpg|max:7000',
                'comment' => 'required|min:5|max:100'
            ]
        );
        Post::create([
            'title' => $request->title,
            'price' => $request->price,
            'comment' => $request->comment
        ])->addPhotos($request->file('photo'));

        return redirect()->route('post_index')->with('msg', 'Post successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate(
            [
                'title' => 'required|min:3|max:20',
                'price' => 'required|numeric|min:1',
                'photo.*' => 'sometimes|required|mimes:jpg|max:7000',
                'comment' => 'required|min:5|max:100'
            ]
        );
        $post->update([
            'title' => $request->title,
            'price' => $request->price,
            'comment' => $request->comment
        ]);
        $post->removePhotos($request->delete_photo)
        ->addPhotos($request->file('photo'));

        return redirect()->route('post_index')->with('msg', 'Post successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->getPhotos()->count()) {
            $delIds = $post->getPhotos()->pluck('id')->all();
            $post->removePhotos($delIds);
        }
        $post->delete();
        return redirect()->route('post_index')->with('msg', 'Post deleted!');
    }
}
