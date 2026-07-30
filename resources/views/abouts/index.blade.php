@extends('layout_uaaaa.index')

@section('content')

<div class="container mt-5">

    <a href="{{ route('abouts.create') }}" class="btn btn-success mb-3">
        Add About
    </a>

    <table class="table table-bordered">

        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
        </tr>

        @foreach($abouts as $about)

        <tr>

            <td>
                <img src="{{ asset('storage/'.$about->image) }}" width="100">
            </td>

            <td>{{ $about->title }}</td>

            <td>{{ $about->description }}</td>

        </tr>

        @endforeach

    </table>

</div>

@endsection