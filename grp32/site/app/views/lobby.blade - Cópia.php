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
			<td>@{{game.title}}
				</br>
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
		<tr class="lobby-options" ng-repeat="firstKey in unsorted(options)">
			<td ng-class="{'lobby-clicked': $index == firstSelect, 'lobby-clicable': $index != firstSelect}" 
			ng-click="optionClick(firstKey, $index)">@{{firstKey}}</td>
			<td ng-class="{'lobby-clicked': $index == secondSelect, 'lobby-clicable': $index != secondSelect}" 
			ng-click="optionClick(secondKey[$index], $index)" ng-show="firstSelect != -1">@{{secondKey[$index]}}</td>
			<td colspan="2" rowspan="2" ng-show="$first && secondSelect != -1">
				<div class="container-fluid container-lobby">
					<div ng-repeat="options in listOptions">
						<input type="text" class="capitalize form-control spacer" ng-hide="$last || options != 'game name'" placeholder="@{{options}}">
						<select class="form-control spacer" ng-hide="$last || options == 'game name'">
							<option>@{{options}}</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
						<button type="submit" class="btn btn-info pull-right spacer" ng-show="$last">@{{options}}</button>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" rowspan="5">GAME OWNER:
			</td>
			<td>Player1</td>
			<td>Player2</td>
		</tr>
		<tr>
			<td>Player3</td>
			<td>Player4</td>
		</tr>
		<tr>
			<td>Teste</td>
			<td>Teste</td>
		</tr>
		<tr>
			<td>Teste</td>
			<td>Teste</td>
		</tr>
		<tr>
			<td>Teste</td>
			<td>Teste</td>
		</tr>
	</table>
</div>
@stop