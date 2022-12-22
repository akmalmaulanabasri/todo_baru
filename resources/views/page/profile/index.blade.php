@extends('page.dashboard.layout')

@section('content')
    <div class="container mt-5">
        <div class="card w-100">
            <div class="card-body">
                <h2>Edit Profile</h2>

                <div class="mt-3">
                    <form action="{{ route('dashboard.profile.update', $user->id) }}" method="POST" class="form-group" enctype="multipart/form-data">
                        @csrf
                        <label for="username" class="form-label mt-3">Username</label>
                        <input type="text" name="username" id="username" readonly value="{{ $user->username }}"
                            class="form-control">

                        <label for="#" class="form-label mt-3">Nama</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}"
                            class="form-control">

                        <label for="email" class="form-label mt-3">Email</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}"
                            class="form-control">

                        <label for="#" class="form-label mt-3">Profile Picture</label>
                        {{-- <input type="file" name="image_profile" id="" class="form-l"> --}}
                        <div class="input-group mb-3">
                            <input name="image_profile" type="file" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>

                        <input type="submit" value="Update Profile" class="btn btn-success mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
