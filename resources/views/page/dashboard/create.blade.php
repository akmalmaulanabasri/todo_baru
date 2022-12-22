@extends('page.dashboard.layout')

@section('content')
    <div class="wrapper bg-white">
        <div class="d-flex align-items-start justify-content-between">
            <div class="d-flex flex-column">
                <div class="h5">Create New Todo</div>
                <p class="text-muted text-justify">
                    Here's a list of activities you have to do
                </p>
                <br>
            </div>
            <div class="info btn ml-md-4 ml-0">
                <span class="fas fa-info" title="Info"></span>
            </div>
        </div>
        <form action="{{ route('addTodo') }}" method="POST" class="form-group">
            @csrf
            <div class="mt-0">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Title of todo">
            </div>
            <div class="mt-3">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
            <div class="mt-3">
                <label for="description">Description</label>
                <textarea type="text" name="description" id="description" class="form-control"></textarea>
            </div>

            <input type="submit" value="Add Todo" class="btn bg-2 text-white mt-3">
        </form>
    </div>
@endsection
