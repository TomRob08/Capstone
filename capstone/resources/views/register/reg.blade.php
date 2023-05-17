@extends('navbar.nav')

@section('content')
<div class="container mt-3">
    <h2>Register</h2>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="mb-3 mt-3">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="{{ old('username') }}" required>
        </div>
        <div class="mb-3">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation">Confirm password:</label>
            <input type="password" class="form-control" id="password_confirmation" placeholder="Repeat your password" name="password_confirmation" required>
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
        <div class="form-check mb-3">
            <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Remember me
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection