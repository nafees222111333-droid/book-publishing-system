@extends('layout_uaaaa.index')

@section('content')

<div class="container py-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h3>My Profile</h3>
        </div>

        <div class="card-body">

            <h4>Name: {{ $user->name }}</h4>

            <h5>Email: {{ $user->email }}</h5>

            <hr>

            <p><strong>Total Orders:</strong>
                {{ \App\Models\Order::where('user_id',$user->id)->count() }}
            </p>

            <p><strong>Competitions Joined:</strong>
                {{ \App\Models\Submission::where('user_id',$user->id)->count() }}
            </p>

        </div>

    </div>

</div>

@endsection