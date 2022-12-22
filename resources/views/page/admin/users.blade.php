@extends('page.dashboard.layout')

@section('content')

    <div class="container mt-3 p-2 bg-secondary text-light" >
        <h2 class="text-light">Daftar User</h2>
        <table class="table border">
            <tr>
                <td class="text-light">No</td>
                <td class="text-light">Nama</td>
                <td class="text-light">Username</td>
                <td class="text-light">Role</td>
            </tr>
            @foreach ($users as $u)
            <tr>
                <td class="text-light">{{ $loop->iteration }}</td>
                <td class="text-light">{{ $u->name }}</td>
                <td class="text-light">{{ $u->username }}</td>
                <td class="text-light">{{ $u->role }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    
@endsection