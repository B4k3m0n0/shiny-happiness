@extends('layouts.master')

@extends('layouts.navbar')

@section('mainbody')

@section('styles')
@parent
@stop

@section('scripts')
@parent
{{ HTML::script('js/banUser.js') }}
@stop


<br>
<br>
<br>
<br>

<div class="col-md-4 col-md-offset-4" ng-controller='BanUserController'>

	<h1 class="center">Users List</h1>
	<h1 class="center">FALTA MANDAR PARA O PERFIL QUANDO SE CARREGA NO USERNAME</h1>

	<table class="table table-bordered" ng-init="users='{{$users}}';bannedUsers='{{$bannedUsers}}'" >
		<thead>
			<tr>
				<th>Player Name</th>
				@if(Auth::user()->admin == 1)
				<th>Options</th>
				@else
				<th>Status</th>
				@endif
			</tr>
		</thead>
		<tbody>

			<tr ng-repeat="user in arrayUsers">
				<td><a href="">[[user]]</a></td>
				@if(Auth::user()->admin == 1)
				<td>
					
					<button class="btn" ng-click='toggleBanUser(user)' ng-class="bannedUsers.indexOf(','+user)==-1 ? 'btn-danger' : 'btn-success'">[[bannedUsers.indexOf(','+user)==-1 ? 'Ban' : 'Unban']]</button>


				</td>
				@else
				<td>
					<span ng-class="bannedUsers.indexOf(','+user)==-1 ? 'text-success' : 'text-danger'">[[bannedUsers.indexOf(','+user)==-1 ? 'In good Standing' : 'Banned']]</span>
					@endif
				</td>
			</tr>
		</tbody>
	</table>
</div>


