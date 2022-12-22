@extends('page.layout')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card border-0">
                    <div class="card-header bg-2 text-center text-light">
                        <h2 class="text-header">Login</h2>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                Berhasil Register, Silahkan Login
                            </div>
                            <script>
                                Swal.fire(
                                    'Berhasil',
                                    'Akun kamu berhasil didaftarkan',
                                    'success'
                                )
                            </script>
                            @endif
                        <form action="/login" method="POST">
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
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" name="password">
                            </div>
                            <div class="d-flex flex-column align-items-start">
                                <button type="submit" class="btn bg-1 text-light">Submit</button>
                                <span class="text-primary mt-2"><a class="text-decoration-none" href="/register">Belum punya
                                        akun?</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
