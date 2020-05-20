@extends('layouts.app')

@section('content')
@if(session()->has('success'))
<div class="alert alert-success">
{{session()->get('success')}}
</div>

@endif
<div class="d-flex justify-content-end">

<a href="{{route('posts.create')}}" class="btn btn-success mb-2">Add post</a>

</div>

@if($posts->count()>0)
<div class="card card-default">
<div class="card-header">Post</div>

<div class="card-body">
<table class="table">
<thead>
<th>Image</th> 
<th>Title</th>
<th>Category</th>
<th></th>
<th></th>
</thead>
<tbody>
@foreach($posts as $post)
<tr>
<td><img src="{{asset($post->image)}}"/></td>
<td>{{$post->title}}</td>
<td>{{$post->category->name}}</td>
@if($post->trashed())
<td>
<form action="{{route('restore-post', $post->id)}}" method="POST">
@csrf
@method('PUT')
<button class="btn btn-primary btn-sm">Restore</button>
</form>
</td>
@else
<td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
@endif

<td>
<form action="{{route('posts.destroy', $post->id)}}" method="POST">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger btn-sm">
{{($post->trashed()) ? 'Delete' : 'Trash'}}
</button>
</form>
</td>

</tr>
@endforeach
</tbody>
</table>
</div>
</div>

@else


<h3>There are currently no  posts</h3>

@endif

@endsection