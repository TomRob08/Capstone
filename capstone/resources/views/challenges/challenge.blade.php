@extends('navbar.nav')

@section('content')
<div class="container-fluid position-relative half-fluid">
    <div class="container">
        <div class="row">
            @foreach ($challenges as $card)
                @forelse ($completed as $completion)
                    @if ($completion->id === Auth::user()->id && $completion->name === $card->name)
                        <div class="col-lg-6 offset-lg-0 position-lg-absolute">
                            <div class="container mt-3">
                                <div class="card border-secondary bg-success">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$card->name}}</h4>
                                        <p class="card-text">{{$card->description}}</p>
                                        <br>
                                        <br>
                                        <a href="{{$card->URL}}" class="card-link">Click here</a>
                                        <a style="float: right;">{{$card->score}} points</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @break
                    @elseif ($loop->last)
                        <div class="col-lg-6 offset-lg-0 position-lg-absolute">
                            <div class="container mt-3">
                                <div class="card border-secondary">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$card->name}}</h4>
                                        <p class="card-text">{{$card->description}}</p>
                                        <!-- <br> -->
                                        <div class="container mt-3">
                                            <form action="{{ route('challenge') }}" method="post">
                                                @csrf
                                                <div class="mb-3 mt-3">
                                                    <input type="text" class="form-control" id="answer" placeholder="Enter answer" name="answer" autocomplete="off">
                                                    <input type="hidden" value="{{ $card->name }}" name="name"> 
                                                </div>
                                            </form>
                                        </div>
                                        <a href="{{$card->URL}}" class="card-link">Click here</a>
                                        <a style="float: right;">{{$card->score}} points</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="col-lg-6 offset-lg-0 position-lg-absolute">
                        <div class="container mt-3">
                            <div class="card border-secondary">
                                <div class="card-body">
                                    <h4 class="card-title">{{$card->name}}</h4>
                                    <p class="card-text">{{$card->description}}</p>
                                    <!-- <br> -->
                                    <div class="container mt-3">
                                        <form action="{{ route('challenge') }}" method="post">
                                            @csrf
                                            <div class="mb-3 mt-3">
                                                <input type="text" class="form-control" id="answer" placeholder="Enter answer" name="answer" autocomplete="off">
                                                <input type="hidden" value="{{ $card->name }}" name="name"> 
                                            </div>
                                        </form>
                                    </div>
                                    <a href="{{$card->URL}}" class="card-link">Click here</a>
                                    <a style="float: right;">{{$card->score}} points</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            @endforeach
        </div>
    </div>
</div>
<br>
@endsection