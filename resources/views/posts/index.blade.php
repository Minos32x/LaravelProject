@extends('layouts.app')

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
    <th>Slug</th>
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
    <td>{{$post->slug}}</td>
    <td><a href="posts/show/{{$post->id}}"><button class="btn btn-info">View</button></a></td>
    <td>
    <a href="posts/edit/{{$post->id}}"><button class="btn btn-warning">Edit</button></a>
    </td>


   
<td>
<form action="{{ url('posts/destroy', ['id' => $post->id]) }}" method="post">
    <input type="hidden" name="_method" value="delete" />
    {{ csrf_field()}}
    {{ method_field('DELETE') }}
    <button onclick="return confirm('Are You Sure?')" type="submit"class="btn btn-danger">Delete</button>
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