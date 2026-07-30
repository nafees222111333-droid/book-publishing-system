@extends('layout_uaaaa.index')

@section('content')

<div class="container py-5">

<div class="d-flex justify-content-between">

<h2>Blogs</h2>

<a href="{{ route('blogs.create') }}" class="btn btn-primary">

Add Blog

</a>

</div>

<hr>

<div class="row">

@foreach($blogs as $blog)

<div class="col-md-4">

<div class="card mb-4">

<img src="{{ asset('storage/'.$blog->image) }}"
height="250"
style="object-fit:cover"
class="card-img-top">

<div class="card-body">

<h4>{{ $blog->title }}</h4>

<p>

{{ Str::limit($blog->description,100) }}

</p>

<a href="{{ route('blogs.edit',$blog->id) }}"
class="btn btn-warning">

Edit

</a>

<form action="{{ route('blogs.destroy',$blog->id) }}"
method="POST"
class="d-inline">

@csrf

@method('DELETE')

<button class="btn btn-danger">

Delete

</button>

</form>

</div>

</div>

</div>

@endforeach

</div>

</div>

@endsection