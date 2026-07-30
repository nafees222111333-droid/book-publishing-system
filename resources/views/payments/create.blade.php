@extends('layout_uaaaa.index')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">Payment</h2>

    <div class="card p-4">

        <h4>Total Amount : Rs. {{ $order->total_price }}</h4>

        <form action="{{ route('payment.store') }}" method="POST">

            @csrf

            <input type="hidden" name="order_id" value="{{ $order->id }}">

            <div class="mb-3">
                <label>Payment Method</label>

                <select name="payment_method" class="form-control">

                    <option value="Credit Card">Credit Card</option>

                    <option value="Cheque">Cheque</option>

                    <option value="DD">Demand Draft</option>

                    <option value="VPP">VPP</option>

                </select>

            </div>

            <button class="btn btn-success">
                Pay Now
            </button>

        </form>

    </div>

</div>

@endsection