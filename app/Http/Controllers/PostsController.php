<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\CreatePostRequest;


class PostsController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::Paginate(3);
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create', ['users' => $users]);
    }


    public function store(CreatePostRequest $request)
    {
        // Post::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'user_id' => $request->user_id
        // ]);
        Post::create($request->only('title','description','user_id'));

        return redirect('/posts');

    }


    public function edit($id)
    {
        $post = Post::find($id);
        $users = User::all();
        return view('posts.edit', ['post' => $post, 'users' => $users]);
    }


    public function update(StorePostRequest $req, Post $post )
    {
        
            $post->update([

                'title' => $req->title,
                'description' => $req->description,
                'user_id' => $req->user_id

            ]);
            return redirect('/posts');
       


    }

    public function destroy($id)
    {
        Post::destroy($id);
        // Post::find($id)->delete();
        return redirect('/posts');

    }


    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }


}
