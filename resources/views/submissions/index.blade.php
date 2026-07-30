@extends('layout_uaaaa.index')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">Competition Submissions</h2>

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

    <table class="table table-bordered table-striped">

        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Competition</th>
                <th>Document</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        @forelse($submissions as $submission)

        <tr>

            <td>{{ $loop->iteration }}</td>

<td>
    {{ $submission->user->name ?? 'User Deleted' }}
</td>
<td>
    {{ $submission->competition->title ?? 'Competition Deleted' }}
</td>
            <td>

                <a href="{{ asset('storage/'.$submission->document) }}"
                   target="_blank"
                   class="btn btn-info btn-sm mb-1">
                    View File
                </a>

                <br>

                <a href="{{ route('submissions.download',$submission->id) }}"
                   class="btn btn-secondary btn-sm">
                    Download
                </a>

            </td>

            <td>

                <span class="badge bg-warning text-dark">
                    {{ $submission->status }}
                </span>

            </td>


                <td>

    <a href="{{ route('submissions.approve',$submission->id) }}"
       class="btn btn-success btn-sm mb-1">
        Approve
    </a>

    <br>

    <a href="{{ route('submission.winner',$submission->id) }}"
       class="btn btn-warning btn-sm">
        🏆 Make Winner
    </a>

</td>

            

        </tr>

        @empty

        <tr>
            <td colspan="6" class="text-center">
                No Submission Found
            </td>
        </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection