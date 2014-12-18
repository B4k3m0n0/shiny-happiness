@extends('layouts.master')

@extends('layouts.navbar')

@extends('layouts.score-card')

@section('styles')
@parent
{{ HTML::style('css/game.css') }}
@stop

@section('mainbody')

<div class="circle">

</div>

<div class="contentor">
	<div class="players">
		@for ($i=0; $i < 10; $i++)
			<div>
				<div></div>
			</div>
		@endfor
	</div>
	<div class="grandient"></div>
</div>

<div></div>

@stop