@extends('layout_uaaaa.index')

@section('content')

<div class="container py-5">

<h2>Edit Blog</h2>

<form action="{{ route('blogs.update',$blog->id) }}"
method="POST"
enctype="multipart/form-data">

@csrf

@method('PUT')

<input
type="text"
name="title"
value="{{ $blog->title }}"
class="form-control mb-3">

<textarea
name="description"
rows="6"
class="form-control mb-3">{{ $blog->description }}</textarea>

<img
src="{{ asset('storage/'.$blog->image) }}"
width="180"
class="mb-3">

<input
type="file"
name="image"
class="form-control mb-3">

<button
class="btn btn-success">

Update

</button>

</form>

</div>

@endsection