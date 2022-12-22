@extends('page.layout')

@section('content')

<div class="container mt-3">
    <div class="card w-100 rounded-0">
        <div class="card-head text-center bg-primary text-white">
            <h2>Welcome to home</h2>
        </div>
        <div class="card-body d-flex justify-content-center">
            <a href="/login" class="btn mx-3 btn-success">Login</a>
            <a href="/register" class="btn mx -3 btn-warning">Register</a>
        </div>
    </div>
</div>

@endsection