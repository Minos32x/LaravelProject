@extends('layouts.app')

@section('content')

    <h1 class="text-center">Post Details</h1>

    <div class="container-fluid">
        <div style="border:2px solid grey">
            <strong style="margin-top:0px; font-size: 20px">Post Info:</strong>
            <div>
                <div><strong style="font-size: 15px">Title:</strong> {{$post->title}} <br></div>
                <div><strong style="font-size: 15px">Description:</strong>{{$post->description}} </div>
                <div><strong style="font-size: 15px">Comments:</strong>
                    <ul>
                        @foreach($post->comments as $comment)
                            <li> {{$comment->body}}</li>
                        @endforeach
                    </ul>
                </div>
                <div><strong>Tag:</strong>{{$post->tag}} </div>

                <img src="{{asset('/storage/uploads/'.$post->image)}}" width="100%" height="150px">


            </div>

        </div>


        <div style="border:2px solid grey">
            <strong style="margin-top:0px; font-size: 20px">User Info:</strong>
            <div>
                <div><strong style="font-size: 15px">Name:</strong> {{$post->user->name}} <br></div>
                <div><strong style="font-size: 15px">Email:</strong>{{$post->user->email}} </div>
                <div><strong style="font-size: 15px">Created-At:</strong>{{$post->user->better_date}} </div>

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

        <form method="post" action="/posts/comment/{{$post->id}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputComment">Comment</label>

                <textarea class="form-control" id="exampleInputComment" name="comment"></textarea>
            </div>
            <div class="text-center"><input class="btn btn-success " type="submit" value="Submit" name="submit"></div>


        </form>


    </div>



@endsection