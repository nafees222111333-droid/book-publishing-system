@extends('layout_uaaaa.index')

@section('content')

<div class="container py-5">
    <div class="row">

        <div class="col-md-5">
            <img src="{{ asset('storage/'.$book->book_image) }}" class="img-fluid rounded">
        </div>

        <div class="col-md-7">
            <h2>{{ $book->title }}</h2>

            <h5>Author: {{ $book->author }}</h5>

            <h4 class="text-success">Rs {{ $book->price }}</h4>

            <hr>

            <p>{{ $book->description }}</p>

            <a href="#" class="btn btn-primary">
                Add To Cart
            </a>

        </div>

    </div>
</div>

@endsection