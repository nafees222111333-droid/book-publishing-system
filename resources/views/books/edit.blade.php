@extends('layout_uaaaa.index')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">Edit Book</h2>

    <form action="{{ route('books.update',$book->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Category</label>

            <select name="category_id" class="form-control">

                @foreach($categories as $category)

                    <option value="{{ $category->id }}"
                        {{ $book->category_id == $category->id ? 'selected' : '' }}>

                        {{ $category->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">
            <label>Book Title</label>

            <input type="text"
                   name="title"
                   class="form-control"
                   value="{{ $book->title }}">
        </div>

        <div class="mb-3">
            <label>Author</label>

            <input type="text"
                   name="author"
                   class="form-control"
                   value="{{ $book->author }}">
        </div>

        <div class="mb-3">
            <label>Description</label>

            <textarea
                name="description"
                class="form-control"
                rows="5">{{ $book->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Price</label>

            <input type="number"
                   name="price"
                   class="form-control"
                   value="{{ $book->price }}">
        </div>

        <div class="mb-3">
            <label>Type</label>

            <select name="type" class="form-control">

                <option value="PDF"
                    {{ $book->type=="PDF" ? 'selected':'' }}>
                    PDF
                </option>

                <option value="Hard Copy"
                    {{ $book->type=="Hard Copy" ? 'selected':'' }}>
                    Hard Copy
                </option>

                <option value="CD"
                    {{ $book->type=="CD" ? 'selected':'' }}>
                    CD
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label>Current Image</label>

            <br>

            <img src="{{ asset('storage/'.$book->book_image) }}"
                 width="120">

        </div>

        <div class="mb-3">

            <label>New Image (Optional)</label>

            <input type="file"
                   name="book_image"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>New PDF (Optional)</label>

            <input type="file"
                   name="pdf_file"
                   class="form-control">

        </div>

        <div class="form-check mb-3">

            <input
                class="form-check-input"
                type="checkbox"
                name="is_free"
                value="1"
                {{ $book->is_free ? 'checked' : '' }}>

            <label class="form-check-label">
                Free Book
            </label>

        </div>

        <button class="btn btn-success">
            Update Book
        </button>

        <a href="{{ route('books.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection