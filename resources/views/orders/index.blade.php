@extends('layout_uaaaa.index')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">All Orders</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Book</th>
                <th>Type</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        @foreach($orders as $order)

        <tr>

            <td>{{ $order->id }}</td>

            <td>{{ $order->user->name }}</td>

            <td>{{ $order->book->title ?? 'Book Deleted' }}</td>
            <td>{{ $order->book_type }}</td>

            <td>Rs. {{ $order->total_price }}</td>

            <td>
                <span class="badge bg-warning text-dark">
                    {{ $order->status }}
                </span>
            </td>

            <td>{{ $order->address }}</td>

            <td>

                <a href="{{ route('orders.approve',$order->id) }}"
                   class="btn btn-success btn-sm">
                    Approve
                </a>

                <a href="{{ route('orders.reject',$order->id) }}"
                   class="btn btn-danger btn-sm">
                    Reject
                </a>

            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection