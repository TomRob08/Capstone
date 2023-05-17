<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sql.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: dodgerblue;">
    <img src="{{ asset('images/Holocron.png') }}" alt="Holocron">
    <form action="{{ route('sql') }}" method="post">
        @csrf
        <!-- <div class="container p-3 my-3 -->
        <div class="mb-3 mt-3 container p-3 my-3">
            <h5>This Holocron contains information about many Star Wars movies.</h5>
            <label for="name">Please enter a Star Wars movie title (ex. A New Hope):</label>
            <input type="text" class="form-control" id="name" name="name" autocomplete="off">

            <table class="table table">
                @forelse ($query as $row)
                @if ($loop->first)
                <thead>
                    <tr>
                        <th>Release year</th>
                        <th>Description</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                @endif
                <tbody>
                    <tr>
                        <td>{{$row->year}}</td>
                        <td>{{$row->description}}</td>
                        <td>{{$row->rating}}</td>
                    </tr>
                </tbody>
                @empty
                @endforelse
            </table>
        </div>
    </form>
</body>
</html>