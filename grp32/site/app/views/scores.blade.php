@extends('layouts.master')

@extends('layouts.navbar')

@section('mainbody')

@section('styles')
@parent
{{ HTML::style('css/profile.css') }}
@stop


<br>
<br>
<br>
<br>

<div class="col-md-4 col-md-offset-4" >

	<h1 class="center">Highest Scores</h1>


	<table class="table table-bordered" >
		<thead>
			<tr>
				<th>Player Name</th>
				<th>Highest Score</th>
				<th>Date</th>
				<th>Game Title</th>
			</tr>
		</thead>
		<tbody>
			@for($i=0;$i<10; $i++)
			<tr>
				<td>{{$scores[$i]->user}}</td>
				<td>{{$scores[$i]->score}}</td>
				<td>{{$data[$i]}}</td>
				<td>{{$gameNames[$i]}}</td>
			</tr>
			@endfor
		</tbody>

	</table>
</div>


