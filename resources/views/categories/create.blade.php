@extends('layout_uaaaa.index')

@section('content')

<div class="container mt-5 mb-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h3>Add Category</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('categories.store') }}" method="POST">

                @csrf

                <div class="form-group">
                    <label>Category Name</label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder="Enter Category Name"
                           required>
                </div>

                <button class="btn btn-success mt-3">
                    Save Category
                </button>

            </form>

        </div>

    </div>

</div>

@endsection