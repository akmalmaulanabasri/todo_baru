@extends('page.dashboard.layout')
@section('content')
    <div class="wrapper bg-white">
        <div class="d-flex align-items-start justify-content-between">
            <div class="d-flex flex-column">
                <div class="h5">Completed Todo's</div>
                <p class="text-muted text-justify">
                    Here's a list of activities you have to do
                </p>
                <br>
                <span>
                    <a class="mr-2 text-success" href="{{ route('add') }}">Create New Task</a>
                    <a class="" href="{{ route('dashboard') }}">Uncompleted Task</a>
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
        <form action="{{ route('todoUnComplete') }}" method="post">
            @csrf
            <div id="comments" class="mt-1">
                @foreach ($todos as $t)
                    <div class="comment d-flex align-items-start justify-content-between">
                        <div class="mr-2">
                            <label class="option">
                                <input type="checkbox" name="todo[{{ $t->id }}]" value="{{ $t->id }}">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="d-flex flex-column w-75">
                            <b class="text-justify">
                                {{ $t->title }}
                            </b>
                            <p class="text-muted">Deadline <span class="date">{{ $t->date }}</span></p>
                        </div>
                        <div class="ml-auto">
                            <span class="fas fa-arrow-right btn"></span>
                        </div>
                    </div>
                @endforeach
            </div>
            @if (count($todos) != 0)
                <button type="submit" name="action" value="uncomplete"
                    class="btn btn-success mt-2 ml-auto">Uncomplete</button>
                <button type="submit" name="action" value="delete" class="btn btn-danger mt-2 ml-auto">Delete</button>
            @endif
        </form>
    </div>

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

@endsection()
