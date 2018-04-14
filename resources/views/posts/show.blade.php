@extends('layout.master')

@section('content')

<h1 class="text-center">Post Details</h1>

<div class="container-fluid">
<div style="border:2px solid grey">
    <span style="margin-top:0px">Post Info</span>
<div>
  <div>  <strong>Title:</strong> {{$post->title}} <br> </div>
   <div> <strong>Description:</strong>{{$post->description}} </div>
   
</div>
    
</div>

<br><br>

<div style="border:2px solid grey">
    <span style="margin-top:0px">User Info</span>
<div>
  <div>  <strong>Name:</strong> {{$post->user->name}} <br> </div>
   <div> <strong>Email:</strong>{{$post->user->email}} </div>
   <div> <strong>Created-At:</strong>{{$post->user->created_at->format('l j\'S \of F Y  H:i:s a')}} </div>
    
</div>
    
</div>



</div>



@endsection