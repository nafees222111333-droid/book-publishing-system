@extends('layout_uaaaa.index')

@section('content')

<div class="container py-5">

    <h2 class="text-center mb-5">
        Our Authors
    </h2>

    <div class="row">

        @forelse($authors as $author)

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

            <div class="card shadow border-0 h-100">

                <div class="card-body text-center">

                    <img src="https://ui-avatars.com/api/?name={{ urlencode($author->author) }}&background=0D8ABC&color=fff&size=150"
                        class="rounded-circle mb-3"
                        width="120"
                        height="120">

                    <h5 class="fw-bold">
                        {{ $author->author }}
                    </h5>

                    <hr>

                    <p class="mb-2">
                        📚 Total Books
                    </p>

                    <h4 class="text-primary">
                        {{ \App\Models\Book::where('author',$author->author)->count() }}
                    </h4>

                    <a href="{{ route('books.page',['search'=>$author->author]) }}"
                       class="btn btn-primary mt-3">
                        View Books
                    </a>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12 text-center">

            <h4>No Authors Found</h4>

        </div>

        @endforelse

    </div>

</div>

@endsection