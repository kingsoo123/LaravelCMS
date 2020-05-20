@extends('layouts.app')

@section('content')
@if(session()->has('success'))
<div class="alert alert-success">
{{session()->get('success')}}
</div>

@endif


@if(session()->has('error'))
<div class="alert alert-danger">
{{session()->get('error')}}
</div>

@endif
<div class="d-flex justify-content-end">

<a href="{{route('tags.create')}}" class="btn btn-success mb-2">Add tag</a>
</div>
@if($tags->count() === 0)
<h3>There are no tags yet

@else
<div class="card card-default">
<div class="card-header">tag</div>

<div class="card-body">
<table class="table">
<thead><th>Name</th> <th>Post count</th><th></th></thead>
<tbody>
@foreach($tags as $tag)
<tr>
<td>{{$tag->name}}</td>
<td>{{$tag->post->count()}}</td>
<td><a href="{{route('tags.edit', $tag->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
<td>
<form action="{{route('tags.destroy', $tag->id)}}" method="POST">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger btn-sm">Delete</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>

@endif
@endsection