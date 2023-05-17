@extends('navbar.nav')

@section('content')

<div class="container mt-3">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Add</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('delete') }}">Delete</a>
        </li>
    </ul>

    <h2>Add Challenge</h2>
    <form action="{{ route('add') }}" method="post">
        @csrf
        <div class="mb-3 mt-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="answer">Answer:</label>
            <input type="text" class="form-control" id="answer" name="answer" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="URL">URL:</label>
            <input type="text" class="form-control" id="url" name="url" autocomplete="off">
        </div>
        <div class="mb-3 mt-3">
            <label for="desc">Description:</label>
            <textarea class="form-control" rows="5" id="desc" name="desc"></textarea>
        </div>
        <div class="mb-3 mt-3">
            <label for="score" class="form-label">Score</label>
            <select class="form-select" id="score" name="score">
                <option>10</option>
                <option>20</option>
                <option>30</option>
                <option>40</option>
                <option>50</option>
            </select>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <br>
</div>

@endsection