@extends('navbar.nav')

@section('content')

<head>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
</head>

@if (count($challenges) > 0)
<div class="row align-items-center">
    <div class="col-7">
	<div class="container">
	    <h3>Challenge activity</h3>
	    <div class="ct-chart ct-perfect-fourth">
		<script>
			var chart = new Chartist.Line('.ct-chart', {
			labels: {!! json_encode($dateRange) !!},
				series: [
					{!! json_encode($points) !!},
				]
		    			}, 
		    			{
			    			fullWidth: true,
				    			chartPadding: {
				    			right: 100,
					    		bottom: 50
						},
						lineSmooth: Chartist.Interpolation.simple({
						fillHoles: true,
						// divisor: 2
						}),
						low: 0

					}
			);
		</script>
	    </div>
	</div>
    </div>
    <div class="col-4">
	<div class="container p-3">
	    <table class="table table-bordered">
		<thead>
		<tr>
		    <th colspan="2">Completed Challenges</th>
		</tr>
		</thead>
		<tbody>
		<tr>
		    <th>Challenges</th>
		    <th>Score</th>
		</tr>
		@foreach ($challenges as $c)
		<tr>
		    <td>{{$c->name}}</td>
		    <td>{{$c->score}}</td>
		</tr>
		@endforeach
		</tbody>
	    </table>
	</div>
    </div>
</div>

@else
	<h1>Please Complete a challenge to see progress</h1>
@endif
@endsection
