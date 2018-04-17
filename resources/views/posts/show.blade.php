@extends('layouts.app')

@section('content')

    <h1 class="text-center">Post Details</h1>

    <div class="container-fluid">
        <div style="border:2px solid grey">
            <span style="margin-top:0px">Post Info</span>
            <div>
                <div><strong>Title:</strong> {{$post->title}} <br></div>
                <div><strong>Description:</strong>{{$post->description}} </div>
                <div><strong>Comment:</strong>
                    @foreach($post->comments as $comment)
                        {{$comment->body}}
                    @endforeach
                </div>
                <div><strong>Tag:</strong>{{$post->tag}} </div>
                <div><img src="storage/app/{{$post->image}}"></div>

                <img src="{{asset('storage/$post->image')}}" alt="">


            </div>

        </div>

        <br><br>

        <div style="border:2px solid grey">
            <span style="margin-top:0px">User Info</span>
            <div>
                <div><strong>Name:</strong> {{$post->user->name}} <br></div>
                <div><strong>Email:</strong>{{$post->user->email}} </div>
                <div><strong>Created-At:</strong>{{$post->user->better_date}} </div>

            </div>

        </div>


    </div>



@endsection