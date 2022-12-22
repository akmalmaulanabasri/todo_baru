@extends('page.dashboard.layout')
@section('content')
@if(Auth::user()->role == 'user')
    <div class="wrapper bg-white">
        <div class="d-flex align-items-start justify-content-between">
            <div class="d-flex flex-column">
                <div class="h5">My Todo's</div>
                <p class="text-muted text-justify">
                    Here's a list of activities you have to do
                </p>
                <br>
                <span>
                    <a class="mr-2 text-success" href="{{ route('add') }}">Create New Task</a>
                    <a class="" href="{{ route('completed') }}">Completed Task</a>
                </span>
            </div>
            <div class="info btn ml-md-4 ml-0">
                <span class="fas fa-info" title="Info"></span>
            </div>
        </div>
        <div class="work border-bottom pt-3">
            <div class="d-flex align-items-center py-2 mt-1">
                <div>
                    <span class="text-muted fas fa-comment btn"></span>
                </div>
                <div class="text-muted">{{ count($todos) }} todos</div>
                <button class="ml-auto btn bg-white text-muted fas fa-angle-down" type="button" data-toggle="collapse"
                    data-target="#comments" aria-expanded="false" aria-controls="comments"></button>
            </div>
        </div>
        <form action="{{ route('todoComplete') }}" method="post">
            @csrf
            <div id="comments" class="mt-1">
                @foreach ($todos as $t)
                    <div type="button" class="comment d-flex align-items-start justify-content-between">
                        <div class="mr-2">
                        </div>
                        <label class="option">
                            <input type="checkbox" name="todo[{{ $t->id }}]" value="{{ $t->id }}">
                            <span class="checkmark"></span>
                        </label>
                        <div data-bs-toggle="modal" data-bs-target="#modalDetail1"
                            class="d-flex flex-column w-75">
                            <b class="text-justify">
                                {{ $t->title }}
                            </b>
                            <p class="text-muted">Deadline <span class="date">{{ $t->date }}</span></p>
                        </div>
                        <a href="{{ route('todo-edit', $t->id) }}" class="ml-auto">
                            <span class="fas fa-arrow-right btn"></span>
                        </a>
                    </div>
                @endforeach
            </div>
            @if (count($todos) != 0)
                <button type="submit" name="action" value="uncomplete"
                    class="btn btn-success mt-2 ml-auto">Complete</button>
                <button type="submit" name="action" value="delete" class="btn btn-danger mt-2 ml-auto">Delete</button>
            @endif
        </form>
    </div>
    @endif
    
    @if(Auth::user()->role == 'admin')
    
    <div class="container mt-3">
        <div class="row">
            {{-- <div class="col-6"> --}}
                <div class="card m-3 col-5">
                    <h2 class="text-center">Total User</h2>
                    <div class="card-body text-center">
                        <h3 class="text-center">
                            {{ count($users) }}
                        </h3>
                    </div>
                </div>
            {{-- </div> --}}
            {{-- <div class="col-6"> --}}
                <div class="card m-3 col-5">
                    <h2 class="text-center">Total Todo</h2>
                    <div class="card-body text-center">
                        <h3 class="text-center">
                            {{ count($todoss) }}
                        </h3>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
    
    @endif
    @foreach ($todos as $t)
        <div class="modal fade" id="modalDetail1" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $t->title }}</h5>
                    </div>
                    <div class="modal-body">
                        <table class="table border">
                            <tr>
                                <td>Deadline</td>
                                <td> : </td>
                                <td>{{ $t->date }}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td> : </td>
                                <td>{{ $t->Description }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="{{ route('todo-edit', $t->id) }}" class="btn btn-warning">Edit Todo</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if (session('empty'))
        <script>
            Swal.fire(
                'Gagal',
                'Tidak ada yang dipilih',
                'error'
            )
        </script>
    @endif
    @if (session('success-update'))
        <script>
            Swal.fire(
                'Sukses',
                'Berhasil update todo',
                'success'
            )
        </script>
    @endif
    @if (session('success-delete'))
        <script>
            Swal.fire(
                'Sukses',
                'Berhasil delete todo',
                'success'
            )
        </script>
    @endif
@endsection
