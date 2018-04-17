<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\CreatePostRequest;
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
//        $tags=explode(',',$request->tag);

        $data = $request->all();
//        dd($data);
        $data['image'] = $request->file('image')->store('public');
        $post = Post::create($data);
        $post->attachTags([$request->tag]);
//        Post::create([
//            'title' => $request->title,
//            'description' => $request->description,
//            'user_id' => $request->user_id,
//            'tags' => $tags,
//            'image' => $request->file('image')->store('public')
//        ]);


        // $getimageName = time().'.'.$request->uplode_image_file->getClientOriginalExtension();
        // $request->uplode_image_file->move(public_path('images'), $getimageName);


//        Post::create($request->only('title','description','user_id','comment','tag','image'));

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
        $comment = Comment::create([

            'commentable_id' => $req->id,
            'commentable_type' => get_class($post),
            'body' => $req->comment,
        ]);

        Post::comments()->save($comment);

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


}
