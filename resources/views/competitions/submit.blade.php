@extends('layout_uaaaa.index')

@section('content')

<div class="container py-5">

    <h2>{{ $competition->title }}</h2>
    @if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <p><strong>Type:</strong> {{ $competition->type }}</p>

    <p><strong>Topic:</strong> {{ $competition->topic }}</p>

    <p><strong>Prize:</strong> {{ $competition->prize }}</p>

    <p>{{ $competition->description }}</p>

    <hr>

    <form action="{{ route('submission.store',$competition->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">

            <label>Upload Story / Essay</label>

            <input type="file"
                   name="document"
                   class="form-control"
                   required>

        </div>

        <button class="btn btn-primary">
            Submit
        </button>

    </form>

</div>

@endsection