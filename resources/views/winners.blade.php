@extends('layout_uaaaa.index')

@section('content')

<div class="container py-5">

<h2 class="mb-4">🏆 Competition Winners</h2>

<table class="table table-bordered">

<thead class="table-dark">

<tr>
    <th>#</th>
    <th>Winner</th>
    <th>Competition</th>
    <th>Certificate</th>
</tr>

</thead>

<tbody>

@foreach($winners as $winner)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $winner->user->name }}</td>

<td>{{ $winner->competition->title }}</td>

<td>

<<button class="btn btn-success" disabled>
Certificate Coming Soon
</button>
</a>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection