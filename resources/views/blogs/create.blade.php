@extends('layout_uaaaa.index')

@section('content')

<div class="container py-5">

<h2>Add Blog</h2>

<form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">

@csrf

<div class="mb-3">
<label>Title</label>
<input type="text" name="title" class="form-control">
</div>

<div class="mb-3">
<label>Description</label>
<textarea name="description" class="form-control" rows="5"></textarea>
</div>

<div class="mb-3">
<label>Image</label>
<input type="file" name="image" class="form-control">
</div>

<button class="btn btn-success">
Save Blog
</button>

</form>

</div>

@endsection