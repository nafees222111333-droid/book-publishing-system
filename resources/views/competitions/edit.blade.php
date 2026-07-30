@extends('layout_uaaaa.index')

@section('content')

<div class="container py-5">

<h2>Edit Competition</h2>
@if($errors->any())

<div class="alert alert-danger">

<ul class="mb-0">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<form action="{{ route('competitions.update',$competition->id) }}"
      method="POST">

@csrf
@method('PUT')

<div class="mb-3">
<label>Title</label>
<input type="text"
       name="title"
       class="form-control"
       value="{{ $competition->title }}">
</div>

<div class="mb-3">
<label>Type</label>
<input type="text"
       name="type"
       class="form-control"
       value="{{ $competition->type }}">
</div>

<div class="mb-3">
<label>Topic</label>
<input type="text"
       name="topic"
       class="form-control"
       value="{{ $competition->topic }}">
</div>

<div class="mb-3">
<label>Prize</label>
<input type="text"
       name="prize"
       class="form-control"
       value="{{ $competition->prize }}">
</div>

<div class="mb-3">
<label>Start Date</label>
<input type="date"
       name="start_date"
       class="form-control"
       value="{{ $competition->start_date }}">
</div>

<div class="mb-3">
<label>End Date</label>
<input type="date"
       name="end_date"
       class="form-control"
       value="{{ $competition->end_date }}">
</div>

<div class="mb-3">
<label>Description</label>
<textarea name="description"
          class="form-control"
          rows="5">{{ $competition->description }}</textarea>
</div>

<button class="btn btn-success">
Update Competition
</button>

</form>

</div>

@endsection