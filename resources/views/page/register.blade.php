@extends('page.layout')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card border-success">
                    <div class="card-header bg-2 text-center text-light">
                        <h2>Register</h2>
                    </div>
                    <div class="card-body">
                        <form action="/register" method="POST">
                            @if ($errors->any())
                                <div class="alert alert-danger mt-3" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" value="{{ old('name') }}" id="name"
                                    name="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ old('email') }}" id="email"
                                    name="email">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" value="{{ old('username') }}" id="username"
                                    name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" value="{{ old('password') }}" id="password"
                                    name="password">
                            </div>
                            <div class="d-flex align-items-start flex-column">
                                <button type="submit" class="btn bg-1 text-light">Submit</button>
                                <span class="text-primary mt-2"><a class="text-decoration-none" href="/login">Sudah punya
                                        akun?</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
