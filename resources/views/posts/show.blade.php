@extends('layouts.app')

@section('content')

    <h1 class="text-center">Post Details</h1>

    <div class="container-fluid">
        <div style="border:2px solid grey">
            <strong style="margin-top:0px; font-size: 20px">Post Info:</strong>
            <div>
                <div><strong style="font-size: 20px">Title: </strong> {{$post->title}} <br></div>
                <div><img src="{{asset('/storage/uploads/'.$post->image)}}" width="100%" height="150px"></div>
                <div><strong style="font-size: 20px">Description: </strong>{{$post->description}} </div>
                <div><strong style="font-size: 20px">Comments: </strong>
                    <ul>
                        @foreach($post->comments as $comment)
                            <li style="font-size: 17px"> {{$comment->body}}</li>
                        @endforeach
                    </ul>
                </div>
                <div><strong>Tags: </strong>{{$post->tag}} </div>




            </div>

        </div>

        <div style="border:2px solid grey">
            <strong style="margin-top:0px; font-size: 20px">Author Info:</strong>
            <div>
                <div><strong style="font-size: 20px">Name: </strong> {{$post->user->name}} <br></div>
                <div><strong style="font-size: 20px">Email: </strong>{{$post->user->email}} </div>
                <div><strong style="font-size: 20px">Created-At: </strong>{{$post->user->better_date}} </div>

            </div>

        </div>

        <br>@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <div class="alert-danger">{{ $error }}</div>
                    @endforeach
                </ul>
            </div>
        @endif<br>

        @auth
        <form method="post" action="/posts/comment/{{$post->id}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputComment" ><strong style="font-size: 20px">Comment: </strong></label>

                <textarea class="form-control" id="exampleInputComment" name="comment"></textarea>
            </div>
            <div class="text-center"><input class="btn btn-success " type="submit" value="Submit" name="submit"></div>

        </form>
        @endauth
    </div>

@endsection