@extends('layout_uaaaa.index')

@section('content')

<div class="container py-5">

    <h2>Author Dashboard</h2>

    <div class="alert alert-success mt-4">
        Welcome {{ Auth::user()->name }}
    </div>

    <div class="row mt-4">

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h4>My Profile</h4>
                    <p>{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection