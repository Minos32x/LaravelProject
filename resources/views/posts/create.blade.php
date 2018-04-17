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

        <form method="POST" enctype="multipart/form-data" action="/posts">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputTitle">Title</label>
                <input type="text" class="form-control" id="exampleInputTitle" name="title">

            </div>
            <div class="form-group">
                <label for="exampleInputDesc">Description</label>

                <textarea class="form-control" id="exampleInputDesc" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputTag">Tag</label>
                <input type="text" class="form-control" id="exampleInputTag" name="tag">

            </div>

            <div class="form-group">
                <label for="exampleInputComment">Comment</label>

                <textarea class="form-control" id="exampleInputComment" name="comment"></textarea>
            </div>


            <div class="form-group">
                Author
                <select class="form-control form-control-lg" name="user_id">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>

                    @endforeach
                </select>
            </div>
            <div class="form-group">

            <!-- <form action="{{ URL::to('posts/create') }}" method="post" enctype="multipart/form-data"> -->
                <label for="exampleInputUpload">Select image to upload:</label>
                <input type="file" name="image" id="file exampleInputUpload">
                <div class="text-center"><input class="btn btn-success " type="submit" value="Submit" name="submit">
                </div>
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <!-- </form> -->
            </div>


            <!-- <div class="text-center"> <button type="submit" class="btn btn-primary">Submit</button></div> -->
        </form>

    </div>



@endsection