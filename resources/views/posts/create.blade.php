@extends('layouts.app')

@section('content')

<h1 class="text-center">Post Create</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <div class="alert-danger">{{ $error }}</div>
            @endforeach
        </ul>
    </div>
@endif

<div class="container-fluid">
<form method="POST" action="/posts">
{{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" class="form-control" id="exampleInputTitle"  name="title">
  
  </div>
  <div class="form-group">
    <label for="exampleInputDesc">Description</label>
    
    <textarea class="form-control" id="exampleInputDesc" name="description"></textarea>
  </div>
  <div class="form-group">
    Author
  <select class="form-control form-control-lg" name="user_id">
      @foreach($users as $user)
  <option value="{{$user->id}}">{{$user->name}}</option>

  @endforeach
</select>
  </div>
 <div class="text-center"> <button type="submit" class="btn btn-primary">Submit</button></div>
</form>

</div>



@endsection