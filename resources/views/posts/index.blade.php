@extends('layout.master')

@section('content')

<h1 class="text-center">Posts Index</h1>
<br>
<div class="text-center"> <a href="posts/create"><button class="btn btn-success">Create Post</button></a> </div>

<br><br><br>

    <table class="table">
<thead class="thead-dark">
<tr>
    <th>Post ID</th>
    <th>Title</th>
    <th>Posted By</th>
    <th>Created At</th>
    <th>Action</th>
    
</tr>
</thead>
<tbody>
@foreach($posts as $post)
<tr>
    <td>{{$post->id}}</td>
    <td>{{$post->title}}</td>
    <td>{{$post->user->name}}</td>
    <td>{{$post->created_at->format('Y-m-d')}}</td>
    <td><a href="posts/show/{{$post->id}}"><button class="btn btn-info">View</button></a>
    <a href="posts/edit/{{$post->id}}"><button class="btn btn-warning">Edit</button></a>
    <a href="posts/destroy/{{$post->id}}"><button class="btn btn-danger">Delete</button></a>
    <form method="delete">

    </form>
    
    </td>

</tr>
    



@endforeach

</tbody>
    </table>

@foreach($posts->links() as $link)

<a href="{{$link}}"><button> Page:{{$link()}} </button></a>
@endforeach

<div class="pagination">Page {{$posts->links()}}</div>

@endsection