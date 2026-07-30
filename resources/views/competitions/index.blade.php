@extends('layout_uaaaa.index')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">Competitions</h2>

    <form method="GET" action="{{ route('competitions.index') }}" class="mb-3">

        <div class="row">

            <div class="col-md-8">

                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Search Competition..."
                       value="{{ request('search') }}">

            </div>

            <div class="col-md-4">

                <button class="btn btn-dark w-100">
                    Search
                </button>

            </div>

        </div>

    </form>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))

<div class="alert alert-danger">
    {{ session('error') }}
</div>

@endif

    <a href="{{ route('competitions.create') }}"
       class="btn btn-success mb-3">
        Add Competition
    </a>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Type</th>
            <th>Topic</th>
            <th>Prize</th>
            <th>Start</th>
            <th>End</th>
            <th width="280">Action</th>
        </tr>

        </thead>

        <tbody>

        @foreach($competitions as $competition)

        <tr>

            <td>{{ $loop->iteration }}</td>
            <td>{{ $competition->title }}</td>
            <td>{{ $competition->type }}</td>
            <td>{{ $competition->topic }}</td>
            <td>{{ $competition->prize }}</td>
            <td>{{ $competition->start_date }}</td>
            <td>{{ $competition->end_date }}</td>

            <td>
@php
$winner = $competition->submissions->where('status','Winner')->first();
@endphp

@if($winner)

<div class="alert alert-success p-2 mb-2">

🏆 <strong>Winner:</strong>
{{ $winner->user->name }}

</div>

@endif

                @if(\Carbon\Carbon::today()->lte(\Carbon\Carbon::parse($competition->end_date)))

                    <a href="{{ route('submission.create',$competition->id) }}"
                       class="btn btn-primary btn-sm">
                        Participate
                    </a>

                @else

                    <button class="btn btn-danger btn-sm" disabled>
                        Competition Closed
                    </button>

                @endif

                <a href="{{ route('competitions.edit',$competition->id) }}"
                   class="btn btn-warning btn-sm">
                    ✏ Edit
                </a>

                <form action="{{ route('competitions.destroy',$competition->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this competition?')">
                        🗑 Delete
                    </button>

                </form>

            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection