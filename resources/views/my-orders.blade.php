@extends('layout_uaaaa.index')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">My Orders</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">

        <thead>

        <tr>

            <th>#</th>
            <th>Book</th>
            <th>Type</th>
            <th>Price</th>
            <th>Shipping</th>
            <th>Total</th>
            <th>Status</th>
            <th>Payment</th>
            <th>Action</th>

        </tr>

        </thead>

        <tbody>

        @forelse($orders as $order)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $order->book?->title ?? 'Book Deleted' }}</td>
            <td>{{ $order->book_type }}</td>

            <td>Rs. {{ $order->price }}</td>

            <td>Rs. {{ $order->shipping_charge }}</td>

            <td>Rs. {{ $order->total_price }}</td>

            
            <td>
    <span class="badge bg-warning text-dark">
        {{ $order->status }}
    </span>
</td>

<td>
    @if($order->payment_status=='Paid')
        <span class="badge bg-success">Paid</span>
    @else
        <span class="badge bg-danger">Pending</span>
    @endif
</td>

<td>

    @if($order->payment_status!='Paid')

        <a href="{{ route('payment.create',$order->id) }}"
           class="btn btn-primary btn-sm">
            Pay Now
        </a>
@elseif($order->status=='Approved' && $order->book_type=='PDF')

    @if($order->book && $order->book->pdf_file)

        <a href="{{ asset('storage/'.$order->book->pdf_file) }}"
           class="btn btn-success btn-sm"
           target="_blank">
            Download PDF
        </a>

    @else

        <span class="text-danger">
            PDF Not Available
        </span>

    @endif

    @else

        <span class="text-success">Completed</span>

    @endif

</td>

        </tr>

        @empty

        <tr>

             <td colspan="9" class="text-center">
                    No Orders Found
            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection