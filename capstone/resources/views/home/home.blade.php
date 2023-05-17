@extends('navbar.nav')

@section('content')

<div class="clearfix">
    <div class="container mt-5 float-start" style="width: 40%;">
    <h1 style="text-align: center;">Scoreboard</h1>            
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>Username</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leaders as $leader)
                <tr>
                    <td>{{$leader->username}}</td>
                    <td>{{$leader->total}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container mt-5 float-end" style="width: 50%;">
        <h1 style="text-align: center;">Welcome to</h1>
        <h1 style="text-align: center;">Capture the flag</h1>
        <h3>The rules:</h3>
        <ul>
            <li>Don't Cheat</li>
            <li>Have fun</li>
        </ul>
    </div>
</div>
@endsection
