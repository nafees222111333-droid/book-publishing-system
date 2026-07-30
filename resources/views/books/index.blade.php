@extends('layout_uaaaa.index')

@section('content')

<div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="mb-4">All Books</h2>

    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">
        Add New Book
    </a>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Price</th>
                <th width="180">Action</th>
            </tr>

        </thead>

        <tbody>

        @forelse($books as $book)

     <tr>

    <td>{{ $book->id }}</td>

    <td>
        <img src="{{ asset('storage/'.$book->book_image) }}"
             width="70"
             height="90"
             style="object-fit:cover;">
    </td>

    <td>{{ $book->title }}</td>

    <td>{{ $book->author }}</td>

    <td>{{ $book->category->name }}</td>

    <td>Rs. {{ $book->price }}</td>

    <td>

        <a href="{{ route('books.edit',$book->id) }}"
           class="btn btn-warning btn-sm">
            Edit
        </a>

        <form action="{{ route('books.destroy',$book->id) }}"
              method="POST"
              style="display:inline;">

            @csrf
            @method('DELETE')

            <button
                class="btn btn-danger btn-sm"
                onclick="return confirm('Delete this book?')">

                Delete

            </button>

        </form>

    </td>

</tr>

            <td>

                <form action="{{ route('books.destroy',$book->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    
                </form>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="7" class="text-center">
                No Books Found
            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection