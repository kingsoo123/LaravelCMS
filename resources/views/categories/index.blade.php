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

<a href="{{route('categories.create')}}" class="btn btn-success mb-2">Add category</a>
</div>
@if($categories->count() === 0)
<h3>There are no categories yet</h3>

@else
<div class="card card-default">
<div class="card-header">Category</div>

<div class="card-body">
<table class="table">
<thead><th>Name</th> <th>Post count</th><th></th></thead>
<tbody>
@foreach($categories as $category)
<tr>
<td>{{$category->name}}</td>
<td>{{$category->post->count()}}</td>
<td><a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
<td>
<form action="{{route('categories.destroy', $category->id)}}" method="POST">
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