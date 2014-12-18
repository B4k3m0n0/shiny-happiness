@yield('layouts.master')

@section('styles')
@parent
{{ HTML::style('css/lobby.css') }}
@stop

@section('scripts')
@parent
{{ HTML::script('js/lobby.js') }}
@stop

@section('mainbody')
<div id="lobby" class="lobby" ng-controller="LobbyController">
	<table ng-hide="createGame">
		<tr class="lobby-options" ng-init='games = {{$games}}'>
			<td class="lobby-clicable" ng-click="filterByName(); predicate = 'title'">Game Name <a class="fa" ng-class="{'fa-chevron-circle-up': nameFilter == 2, 'fa-chevron-circle-down': nameFilter == 1, 'fa-chevron-circle-left': nameFilter == 0}"></a></td>
			<td class="lobby-clicable" ng-click="filterBySize(); predicate = 'num_bots*1 + num_players*1'">Size <a class="fa" ng-class="{'fa-chevron-circle-up': sizeFilter == 2, 'fa-chevron-circle-down': sizeFilter == 1, 'fa-chevron-circle-left': sizeFilter == 0}"></a></td>
			<td class="lobby-clicable" ng-click="filterByStatus(); predicate = 'status'">Status <a class="fa" ng-class="{'fa-chevron-circle-up': statusFilter == 2, 'fa-chevron-circle-down': statusFilter == 1, 'fa-chevron-circle-left': statusFilter == 0}"></a></td>
			<td class="lobby-clicable" ng-click="filterByBots(); predicate = 'num_bots'">Bots <a class="fa" ng-class="{'fa-chevron-circle-up': botsFilter == 2, 'fa-chevron-circle-down': botsFilter == 1, 'fa-chevron-circle-left': botsFilter == 0}"></a></td>
		</tr>
		<tr class="lobby-games-list" ng-repeat="game in games | orderBy:predicate:reverse" ng-controller="ItemController" ng-mouseenter="showIt()" ng-mouseleave="hideIt()">
			<td class="no-upper">@{{game.title}}
				<br>
				<button type="button" class="btn btn-primary" ng-show="show">Enter</button>
				<button type="button" class="btn btn-info" ng-show="show">Spectate</button>
			</td>
			<td>@{{game.num_bots*1 + game.num_players*1}}</td>
			<td>@{{game.status}}</td>
			<td>@{{game.num_bots}}</td>
		</tr>
		<tr class="lobby-options">
			<td colspan='4' class="lobby-clicable" ng-click="createGame = true">
				Create Game
			</td>
		</tr>
	</table>


	<table ng-show="createGame">
		<tr>
			<td colspan='2' class="lobby-create">
				<div class="col-sm-4 form-inline divisor">
					<label for="gameName" class="control-label inline">Game Name:</label>
					<input type="text" class="form-control inline" id="gameName" placeholder="Game Name">
				</div>
				<div class="col-sm-4 form-inline divisor">
					<label for="numPlayers" class="control-label inline">Total Number of Players:</label>
					<select class="form-control" id="numPlayers">
						@for ($i=1; $i <= 9; $i++)
							<option>{{$i}}</option>
						@endfor
					</select>
					<label for="numBots" class="control-label inline">Number of Bots:</label>
					<select class="form-control" id="numBots">
						@for ($i=1; $i <= 9; $i++)
							<option>{{$i}}</option>
						@endfor
					</select>
				</div>
				<div class="col-sm-4 form-inline">
					<button type="button" class="btn btn-primary">Create</button>
					<br>
					<button type="button" class="btn btn-info">Back to Avalible Games</button>
				</div>
			</td>
		</tr>
		@for ($i=0; $i < 5; $i++)  
		<tr class="lobby-players-list">
			@for ($j=0; $j < 2; $j++)
			<td>
				Username
				<div class="pull-right">
					<button type="button" class="btn btn-primary create-game-options">Add Bot</button>
					<button type="button" class="btn btn-danger create-game-options">Remove</button>
				</div>
			</td>
			@endfor
		</tr>
		@endfor
	</table>
</div>
@stop