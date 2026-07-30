@extends('layout_uaaaa.index')

@section('content')

<div class="container mt-5 mb-5">

    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h3>Add New Book</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label>Book Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group mt-3">
                    <label>Author</label>
                    <input type="text" name="author" class="form-control" required>
                </div>

                <div class="form-group mt-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5" required></textarea>
                </div>

                <div class="form-group mt-3">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" required>
                </div>

                <div class="form-group mt-3">
                    <label>Book Type</label>
                    <select name="type" class="form-control">
                        <option value="PDF">PDF</option>
                        <option value="Hard Copy">Hard Copy</option>
                        <option value="CD">CD</option>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label>Book Image</label>
                    <input type="file" name="book_image" class="form-control" required>
                </div>

                <div class="form-group mt-3">
                    <label>PDF File</label>
                    <input type="file" name="pdf_file" class="form-control">
                </div>

                <div class="form-check mt-3">
                    <input type="checkbox" class="form-check-input" name="is_free" value="1">
                    <label class="form-check-label">Free Book</label>
                </div>

                <button type="submit" class="btn btn-success mt-4">
                    Save Book
                </button>

            </form>

        </div>

    </div>

</div>

@endsection 