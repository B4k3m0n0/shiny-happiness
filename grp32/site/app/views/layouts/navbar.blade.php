@section('styles')
@parent
{{ HTML::style('css/navbar.css') }}
@stop



@section('navbar')
<div class="container">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{URL::to('lobby')}}" id="yahtezeeBrand">YAHTZEE</a>
	</div>

	@if(Auth::check())

	<div class="collapse navbar-collapse navbar-responsive-collapse" >
		<ul class="nav navbar-nav navbar-right">
			<li ng-class="{'active' : page == 'profile'}">
				<a href="{{URL::to('profile')}}" class="navbar-link">Profile</a>
			</li>
			<li ng-class="{'active' : page == 'tournaments'}">
				<a href="{{URL::to('tournaments')}}" class="navbar-link">Tournaments</a>
			</li>
			<li ng-class="{'active' : page == 'scores'}">
				<a href="{{URL::to('scores')}}" class="navbar-link">Top Scores</a>
			</li>
			<li>
				<a href="{{URL::to('logout')}}" class="navbar-link">Logout</a>
			</li>
		</ul>
	</div>
	@else
	<div class="collapse navbar-collapse navbar-responsive-collapse" >
		<ul class="nav navbar-nav navbar-right">
			<li ng-class="{'active' : page == 'scores'}">
				<a href="{{URL::to('scores')}}" class="navbar-link">Top Scores</a>
			</li>
			<li>
				<a href="{{URL::to('login')}}" class="navbar-link">Login</a>
			</li>
		</div>



		@endif
	</div>
	@stop