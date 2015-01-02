@extends('layouts.master')

@extends('layouts.navbar')

@section('mainbody')

@section('styles')
@parent
{{ HTML::style('css/torneio.css') }}
@stop

@section('scripts')
@parent
{{ HTML::script('js/tournament.js') }}
@stop

<div class="col-md-4 col-md-offset-4" ng-controller="TournamentController">

  {{ Form::open(array('class' => 'border-login', 'method' => 'post', 'route' => 'tournament', 'name' => 'tournamentForm')) }}
  <h3 class="center">Create a new tournament</h3>
  <hr>
  <div class="input-group margin-center margin-bottom-20">
    {{ Form::labelStart('tournamentName', array('class'=>'input-group-addon')) }}
    {{ Form::label('tournamentName', ' ', array('class'=>'fa fa-cubes')) }}
    {{ Form::labelEnd() }}
    <input type="text" name="tournamentName" class="form-control" ng-model="tournamentName" placeholder="Tournament Name" required>
  </div>
  <div>
    {{ Form::label('numRoundsText', 'Number of Rounds') }}
  </div>
  <div class="input-group margin-center margin-bottom-20">
    {{ Form::labelStart('numRounds', array('class' => 'input-group-addon')) }}
    {{ Form::label('numRounds', ' ', array('class'=>'fa fa-cube')) }}
    {{ Form::labelEnd() }}
    <select class="form-control" ng-options="round.label for round in rounds" ng-model="numberRounds"></select>
  </div>
  <div class="input-group margin-center margin-bottom-20">
    <br/>
    {{ Form::labelStart('botBoolean', array('class'=>'')) }}
    {{ Form::label('botBoolean', 'Enable Bots') }}
    {{ Form::labelEnd() }}
    <input type="checkbox" id="blankCheckbox" value="option1" ng-model="checked">
  </div>
  <div>
    {{ Form::label('numBotsText', 'Number of Bots') }}
  </div>
  <div class="input-group margin-center margin-bottom-20">
    {{ Form::labelStart('numBots', array('class' => 'input-group-addon')) }}
    {{ Form::label('numBots', ' ', array('class'=>'fa fa-child')) }}
    {{ Form::labelEnd() }}
    <select class="form-control" ng-options="bot.label for bot in bots" ng-model="numberBots" ng-disabled="!checked"></select>
  </div>
  <div class="input-group margin-center margin-bottom-20">
    {{ Form::labelStart('tournamentRegistrationStartDate', array('class'=>'input-group-addon')) }}
    {{ Form::label('tournamentRegistrationStartDate', ' ', array('class'=>'fa fa-calendar')) }}
    {{ Form::labelEnd() }}
    <input type="date" name="tournamentRegistrationStartDate" class="form-control" ng-model="tournamentRegistrationStartDate" placeholder="Registration Start Date (01-01-1999)" required>
  </div>
  <div class="input-group margin-center margin-bottom-20">
    {{ Form::labelStart('tournamentRegistrationStartHour', array('class'=>'input-group-addon')) }}
    {{ Form::label('tournamentRegistrationStartHour', ' ', array('class'=>'fa fa-clock-o')) }}
    {{ Form::labelEnd() }}
    <input type="time" name="tournamentRegistrationStartHour" class="form-control" ng-model="tournamentRegistrationStartHour" placeholder="Registration Start Time (00:00)" required>
  </div>
  <div class="input-group margin-center margin-bottom-20">
    {{ Form::labelStart('tournamentRegistrationEndDate', array('class'=>'input-group-addon')) }}
    {{ Form::label('tournamentRegistrationEndDate', ' ', array('class'=>'fa fa-calendar')) }}
    {{ Form::labelEnd() }}
    <input type="date" name="tournamentRegistrationEndDate" class="form-control" ng-model="tournamentRegistrationEndDate" placeholder="Registration End Date (01-01-1999)" required>
  </div>
  <div class="input-group margin-center margin-bottom-20">
    {{ Form::labelStart('tournamentRegistrationEndHour', array('class'=>'input-group-addon')) }}
    {{ Form::label('tournamentRegistrationEndHour', ' ', array('class'=>'fa fa-clock-o')) }}
    {{ Form::labelEnd() }}
    <input type="time" name="tournamentRegistrationEndHour" class="form-control" ng-model="tournamentRegistrationEndHour" placeholder="Registration End Time (00:00)" required>
  </div>
  <div class="row">
    <div class=" col-md-12">
      <button type="submit" class="btn btn-primary pull-right" ng-disabled="tournamentForm.$invalid">Create</button>
    </div>
  </div>
  {{ Form::close() }}
</div>

@stop