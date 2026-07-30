@extends('layout_uaaaa.index')

@section('content')

@php
use Illuminate\Support\Str;
@endphp
<li class="nav-item">
    <a href="{{ route('profile') }}" class="nav-link">
        Profile
    </a>
</li>

<div class="container py-5">

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold">📊 Admin Dashboard</h2>
        <p class="text-muted">
            Welcome Back, {{ Auth::user()->name }}
        </p>
    </div>

    <div>
        <a href="{{ route('books.create') }}" class="btn btn-primary">
            + Add Book
        </a>
    </div>

</div>
<div class="alert alert-primary shadow mb-4">

<h2>
Welcome Admin 👋
</h2>

<p>

Manage Books, Blogs, Orders, Competitions and Winners from one dashboard.

</p>

</div>

<div class="row">

<div class="col-md-3 mb-4">
<div class="card bg-primary text-white">
<div class="card-body">
    <i class="fa fa-book fa-2x float-end"></i>
<h5>Total Books</h5>
<h2>{{ $totalBooks }}</h2>
</div>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="card bg-success text-white">
<div class="card-body">
        <i class="fa fa-users fa-2x float-end"></i>

<h5>Total Authors</h5>
<h2>{{ $totalAuthors }}</h2>
</div>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="card bg-warning text-white">
<div class="card-body">
    <i class="fa fa-shopping-cart fa-2x float-end"></i>
<h5>Total Orders</h5>
<h2>{{ $totalOrders }}</h2>
</div>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="card bg-danger text-white">
<div class="card-body">
    <i class="fa fa-users fa-2x float-end"></i>
<h5>Total Users</h5>
<h2>{{ $totalUsers }}</h2>
</div>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="card bg-info text-white">
<div class="card-body">
<h5>Categories</h5>
<h2>{{ $totalCategories }}</h2>
</div>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="card bg-secondary text-white">
<div class="card-body">
<h5>Competitions</h5>
<h2>{{ $totalCompetitions }}</h2>
</div>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="card bg-dark text-white">
<div class="card-body">
<h5>Submissions</h5>
<h2>{{ $totalSubmissions }}</h2>
</div>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="card bg-success text-white">
<div class="card-body">
<h5>Total Revenue</h5>
<h2>Rs. {{ number_format($totalRevenue,2) }}</h2>
</div>
</div>
</div>

</div>

</div>


<hr class="my-4">

<div class="row">

    <div class="col-md-3 mb-3">
        <a href="{{ route('books.index') }}" class="btn btn-primary w-100">
            📚 Manage Books
        </a>
    </div>

    <div class="col-md-3 mb-3">
        <a href="{{ route('competitions.index') }}" class="btn btn-success w-100">
            🏆 Competitions
        </a>
    </div>

    <div class="col-md-3 mb-3">
        <a href="{{ route('submissions.index') }}" class="btn btn-info w-100">
            📝 Submissions
        </a>
    </div>

    <div class="col-md-3 mb-3">
        <a href="{{ route('orders.index') }}" class="btn btn-warning w-100">
            📦 Orders
        </a>
    </div>

<div class="col-md-3 mb-3"><a href="{{ route('books.create') }}" class="btn btn-primary w-100">Add Book</a></div>

<div class="col-md-3 mb-3"><a href="{{ route('categories.create') }}" class="btn btn-success w-100">Add Category</a></div>

<div class="col-md-3 mb-3"><a href="{{ route('blogs.create') }}" class="btn btn-info w-100">Add Blog</a></div>

<div class="col-md-3 mb-3"><a href="{{ route('competitions.create') }}" class="btn btn-warning w-100">Add Competition</a></div>

</div>

</div>

<h3 class="mt-5 mb-3">Latest Competitions</h3>

<table class="table table-bordered">

<thead class="table-dark">
            <tr>
            <th>Title</th>
            <th>Topic</th>
            <th>Deadline</th>
        </tr>
    </thead>

    <tbody>

    @forelse($latestCompetitions as $competition)

    <tr>
        <td>{{ $competition->title }}</td>
        <td>{{ $competition->topic }}</td>
        <td>{{ $competition->deadline }}</td>
    </tr>

    @empty

    <tr>
        <td colspan="3" class="text-center">
            No Competition Found
        </td>
    </tr>

    @endforelse

    </tbody>

</table>
<h3 class="mt-5 mb-3">Latest Submissions</h3>

<table class="table table-bordered">

    <thead class="table-dark">
        <tr>
            <th>User</th>
            <th>Competition</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>

    @forelse($latestSubmissions as $submission)

    <tr>
<td>
    {{ $submission->user->name ?? 'User Deleted' }}
</td>
<td>
    {{ $submission->competition->title ?? 'Competition Deleted' }}
</td>
        <td>

            @if($submission->status=="Winner")

                <span class="badge bg-success">Winner</span>

            @else

                <span class="badge bg-warning text-dark">
                    {{ $submission->status }}
                </span>

            @endif

        </td>

    </tr>

    @empty
<div class="card shadow mt-4">

<div class="card-header bg-info text-white">
    <h4>Latest Blogs</h4>
</div>

<div class="card-body">

@foreach(\App\Models\Blog::latest()->take(5)->get() as $blog)

<div class="mb-3 border-bottom pb-2">

<h5>{{ $blog->title }}</h5>

<p>{{ Str::limit($blog->description,80) }}</p>

</div>

@endforeach

</div>

</div>
    <tr>
        <td colspan="3" class="text-center">
            No Submission Found
        </td>
    </tr>

    @endforelse

    </tbody>

</table>
<h3 class="mt-5 mb-3">Latest Orders</h3>

<table class="table table-bordered">

    <thead class="table-dark">

        <tr>

            <th>ID</th>

            <th>User</th>

            <th>Status</th>

        </tr>

    </thead>

    <tbody>

    @forelse($latestOrders as $order)

        <tr>

            <td>{{ $order->id }}</td>

            <td>{{ $order->user->name ?? 'N/A' }}</td>

            <td>{{ $order->status }}</td>

        </tr>

    @empty

        <tr>

            <td colspan="3" class="text-center">

                No Orders Found

            </td>

        </tr>

    @endforelse

    </tbody>

</table>
    <hr>

</div>
@endsection

