<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreatePostRequest;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Resources\PostResource;


class PostsController extends Controller
{
    public function index(){
        $post = Post::with('user')->Paginate(30);
        return PostResource::collection($post);
    }

    public function store(CreatePostRequest $request){
        $data=Post::create($request->all());
        return new PostResource($data);
    }
}
