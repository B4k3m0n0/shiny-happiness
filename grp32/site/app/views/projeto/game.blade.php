@extends('layouts.master')

@include('layouts.navbar')

@include('layouts.chat', array('gameId' => $id, 'listPlayers' => $playerSequence))

@section('styles')
@parent
{{ HTML::style('css/game.css') }}
{{ HTML::style('css/dice.css') }}
{{ HTML::style('css/score-board.css') }}
@stop

@section('scripts')
@parent
{{ HTML::script('js/game.js') }}
@stop

@section('mainbody')

<div  ng-controller="GameController">
	<div class="score-board-main">
		<div class="score-board" ng-show="scoreButton" ng-init="listPlayers = '{{$playerSequence}}'; gameId = '{{$id}}'; currentPlayer = '{{$currentPlayer}}'; me = '{{Auth::user()->username}}'">
			<table>
				<thead>
					<tr>
						<th class="score-board-table">COMBOS</th>
						<th class="score-board-table" ng-repeat="namePlayer in namePlayers">[[namePlayer]]</th>
					</tr>
				</thead>
				<tbody>
					@for ($i = 0; $i < sizeof($scoreBoard[0]); $i++)
					<tr>
						<td class="score-board-table" data-toggle="tooltip" data-container="body" data-placement="right" title="{{$scoreBoard[1][$i]}}" ng-class="{'score-special': '{{$scoreBoard[0][$i]}}' == 'Sum' || '{{$scoreBoard[0][$i]}}' == 'Bonus'}">
							{{$scoreBoard[0][$i]}}
						</td>
						<td class="score-board-table" ng-repeat="namePlayer in namePlayers" @if(strpos($playerSequence, Auth::user()->username.';') !== false) ng-class="{'clicable board-animation': !isBonusSelected({{$i}}, namePlayer) && isNotNull({{$i}}, namePlayer) && currentPlayer == me && namePlayer == me && !('{{$scoreBoard[0][$i]}}' == 'Sum' || '{{$scoreBoard[0][$i]}}' == 'Bonus' || '{{$scoreBoard[0][$i]}}' == 'TOTAL SCORE'), 'selectedBonus': isBonusSelected({{$i}}, namePlayer) && isNotNull({{$i}}, namePlayer)}" @endif ng-click="selectBonus({{$i}})">
							<div>
								[[boardDataByPlayer[namePlayer][{{$i}}] ]]
							</div>
						</td>
					</tr>
					@endfor
				</tbody>
			</table>
		</div>
		<div class="score-board-button">
			<a class="fa clicable" ng-class="{'fa-chevron-circle-left': scoreButton, 'fa-chevron-circle-right': !scoreButton}" ng-init="scoreButton = true" ng-click="scoreButton = !scoreButton"></a>
		</div>
	</div>

	<div class="table">
		@for ($i=0; $i < 5; $i++)
		<div class="space3d" ng-click="selected({{$i}})" ng-class="{'clicable': diceRolled}">
			<div class="_3dbox">
				<div class="_3dface _3dface--front">
					<span>1</span>
				</div>
				<div class="_3dface _3dface--back">
					<span>6</span>
				</div>
				<div class="_3dface _3dface--top">
					<span>2</span>
				</div>
				<div class="_3dface _3dface--bottom">
					<span>5</span>
				</div>
				<div class="_3dface _3dface--left">
					<span>3</span>
				</div>
				<div class="_3dface _3dface--right">
					<span>4</span>
				</div>
			</div>
		</div>
		@endfor
		@if(strpos($playerSequence, Auth::user()->username.';') !== false)
		<div class="roll-button">
			<button type="button" class="btn btn-warning btn-lg" ng-disabled="playNumber == 3 || currentPlayer != me" ng-click="rollDice()">ROLL DICE</button>
		</div>
		@endif
	</div>

	<div class="players-container">
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
</div>
@stop