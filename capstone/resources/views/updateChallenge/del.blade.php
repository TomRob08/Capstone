@extends('navbar.nav')

@section('content')

<div class="container mt-3">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Delete</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('add') }}">Add</a>
        </li>
    </ul>
    
    <h2>Delete Challenge</h2>
    <form action="{{ route('delete') }}" method="post">
        @csrf
        <div class="mb-3 mt-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" autocomplete="off">
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
</div>

@endsection