@extends('layouts.app')

@section('content')
@if(session()->has('success'))
<div class="alert alert-success">
{{session()->get('success')}}
</div>

@endif


@if($users->count()>0)
<div class="card card-default">
<div class="card-header">Users</div>

<div class="card-body">
<table class="table">
<thead>
<th>Image</th> 
<th>Name</th>
<th>Email</th>
<th></th>
<th></th>
</thead>
<tbody>
@foreach($users as $user)
<tr>
<td>

</td>
<td>{{$user->name}}</td>
<td>{{$user->email}}</td>

<td>
@if(!$user->isAdmin())
<form action="{{route('users.make-admin', $user->id)}}" method="POST">
@csrf
<button type="submit" class="btn btn-success btn-sm">Make admin</button>
</form>

@endif
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