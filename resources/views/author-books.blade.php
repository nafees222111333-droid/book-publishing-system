@extends('layout_uaaaa.index')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">{{ $author }}</h2>

    <div class="row">

        @forelse($books as $book)

        <div class="col-md-3 mb-4">

            <div class="card h-100">

                <img src="{{ asset('storage/'.$book->book_image) }}"
                     class="card-img-top"
                     height="250"
                     style="object-fit:cover;">

                <div class="card-body">

                    <h5>{{ $book->title }}</h5>

                    <p>Rs. {{ $book->price }}</p>

                    <a href="{{ route('books.show', $book->id) }}"
                       class="btn btn-success">
                        View Book
                    </a>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12 text-center">
            <h4>No Books Found</h4>
        </div>

        @endforelse

    </div>

</div>

@endsection