@extends('layout_uaaaa.index')

@section('content')

<div class="container mt-5 mb-5">

    <div class="d-flex justify-content-between mb-3">

        <h2>All Categories</h2>

        <a href="{{ route('categories.create') }}"
           class="btn btn-primary">
            Add Category
        </a>

    </div>

    <table class="table table-bordered">

        <thead>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
        </tr>

        </thead>

        <tbody>

        @forelse($categories as $category)

        <tr>

            <td>{{ $category->id }}</td>

            <td>{{ $category->name }}</td>

            <td>{{ $category->slug }}</td>

        </tr>

        @empty

        <tr>

            <td colspan="3" class="text-center">
                No Categories Found
            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection