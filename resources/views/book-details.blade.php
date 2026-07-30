@extends('layout_uaaaa.index')

@section('content')

<section class="ftco-section">
<div class="container">

<div class="row">

<div class="col-md-5">

<img src="{{ asset('storage/'.$book->book_image) }}"
class="img-fluid rounded">

</div>

<div class="col-md-7">

<h2>{{ $book->title }}</h2>

<hr>

<h5>Author :</h5>

<p>{{ $book->author }}</p>

<h5>Price :</h5>

<h3 class="text-success">
Rs {{ $book->price }}
</h3>

<h5>Description</h5>

<p>

{{ $book->description }}

</p>

<a href="#" class="btn btn-primary">

Add To Cart

</a>

</div>

</div>

</div>

</section>

@endsection