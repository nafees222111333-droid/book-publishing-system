@extends('layout_uaaaa.index')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">Add Competition</h2>

    <form action="{{ route('competitions.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Competition Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Competition Type</label>
            <select name="type" class="form-control">
                <option value="Essay">Essay</option>
                <option value="Story">Story</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Topic</label>
            <input type="text" name="topic" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Prize</label>
            <input type="text" name="prize" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="5"></textarea>
        </div>

        <button class="btn btn-primary">
            Save Competition
        </button>

    </form>

</div>

@endsection