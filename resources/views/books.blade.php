@extends('layout_uaaaa.index')

@section('content')

<div class="container py-5">

    <h2 class="text-center mb-5">All Books</h2>

    <div class="row">

        @foreach($books as $book)

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

            <div class="card shadow h-100 border-0">

                <img src="{{ asset('storage/'.$book->book_image) }}"
                     style="height:320px;object-fit:cover;"
                     class="card-img-top">

                <div class="card-body d-flex flex-column">

                    <h5 class="font-weight-bold">
                        {{ $book->title }}
                    </h5>

                    <small class="text-muted">
                        {{ $book->author }}
                    </small>

                    <p class="mt-2 mb-1">
                        <strong>Category:</strong>
                        {{ $book->category->name }}
                    </p>

                    <p class="text-success font-weight-bold">
                        Rs. {{ $book->price }}
                    </p>

                    @if($book->is_free)
                        <span class="badge badge-success mb-3">
                            FREE
                        </span>
                    @else
                        <span class="badge badge-primary mb-3">
                            PAID
                        </span>
                    @endif

                    <a href="{{ route('books.show',$book->id) }}"
                       class="btn btn-info btn-block mb-2">
                        View Details
                    </a>

                    @auth

                    <form action="{{ route('order.store',$book->id) }}" method="POST">

                        @csrf

                        <select name="book_type" class="form-control mb-2" required>
                            <option value="">Select Type</option>
                            <option value="PDF">PDF</option>
                            <option value="Hard Copy">Hard Copy</option>
                            <option value="CD">CD</option>
                        </select>

                        <textarea
                            name="address"
                            class="form-control mb-2"
                            rows="2"
                            placeholder="Delivery Address"></textarea>

                        <button class="btn btn-success btn-block">
                            Buy Now
                        </button>

                    </form>

                    @else

                    <a href="{{ route('login') }}"
                       class="btn btn-warning btn-block">
                        Login to Buy
                    </a>

                    @endauth

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection