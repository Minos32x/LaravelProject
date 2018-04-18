<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Post;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Faker\Provider\Image;
use App\Comment;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->Paginate(3);
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store(CreatePostRequest $request)
    {
        $data = $request->all();

        $getimageName = time() . '.' . $request->image->getClientOriginalName();

        $path = Storage::putFileAs('public/uploads', $request->file('image'), $getimageName);

//      $path = $request->file('image')->store('public');

        $data['image'] = $getimageName;

        $post = Post::create($data);
        $post->attachTags([$request->tag]);



        return redirect('/posts');

    }


    public function edit($id)
    {
        $post = Post::find($id);
        $users = User::all();
        return view('posts.edit', ['post' => $post, 'users' => $users]);
    }


    public function update(StorePostRequest $req, Post $post)
    {

        $post->update([

            'title' => $req->title,
            'description' => $req->description,
            'user_id' => $req->user_id,

        ]);

        return redirect('/posts');

    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect('/posts');

    }


    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    public function comment(CreateCommentRequest $req, $id)
    {
//        $username=Post::find($id)->user->name;
//        dd($username);
        Comment::create([
            'commentable_id' => $id,
            'commentable_type' => 'Post',
            'body' => $req->comment,
        ]);

        return redirect('/posts/show/'.$id);
    }


}
