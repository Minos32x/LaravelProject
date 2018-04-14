@extends('layout.master')

@section('content')

<h1 class="text-center">Post Edit</h1>

<div class="container-fluid">
<form method="POST" action="/posts/update/{{$post->id}}">
{{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" class="form-control" id="exampleInputTitle"  name="title" value="{{$post->title}}">
  
  </div>
  <div class="form-group">
    <label for="exampleInputDesc">Description</label>
    
    <textarea class="form-control" id="exampleInputDesc" name="description" >{{$post->description}}</textarea>
  </div>
  <div class="form-group">
    Author
  <select class="form-control form-control-lg" name="user_id" value="{{$post->user_id}}">
      @foreach($users as $user)
  <option value="{{$user->id}}">{{$user->name}}</option>

  @endforeach
</select>
  </div>
 <div class="text-center"> <button type="submit" class="btn btn-primary">Submit</button></div>
</form>

</div>



@endsection