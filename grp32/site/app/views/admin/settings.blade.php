@extends('layouts.master')

@include('layouts.navbar')

@section('styles')
@parent
{{ HTML::style('css/signup.css') }}
@stop

@section('mainbody')

<br> <!--TODO Tirar estes br-->
<br>
<br>
<br>

<div class="container" ng-controller="mainController">
  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">


    {{ Form::open(array('class' => 'border-login', 'method' => 'post', 'route' => 'settings','name' => 'settingsForm','files'=>true)) }}
    <h3 class="center">Administrator Settings</h3>
    <hr>
    <div class="div-obligatory">
      <div class="box-obligatory"></div>
      <span class="text-obligatory">- obligatory fields</span>
    </div>
    @if(Session::has('messageSuccessful'))
    <div class="bg-success">
      <p class="text-success">{{  Session::get('messageSuccessful')  }}</p>
    </div>
    @endif

    @if(Session::has('messageSizeError'))
    <div class="bg-danger">
      <p class="text-danger">{{  Session::get('messageSizeError')  }}</p>
    </div>
    @endif

    <br/>
    <hr>
        <!-- *******************************************************************************************************
             ***********************************************Dice Image**********************************************
             *******************************************************************************************************-->
         
             <div class="center" style="min-height:50px;min-width:50;width:50px;margin:auto;">
              {{HTML::image($diceImage->diceImage, "user diceImage", array('style'=>'height:50px;width:50px;'))}}
            </div>
            <br/>
            <div class="@if ($errors->has('diceImage')) has-error @endif">
              @if ($errors->has('diceImage')) <p class="help-block">{{ $errors->first('diceImage') }}</p> @endif
            </div>
            <div class="input-group margin-center margin-bottom-20">
              {{ Form::labelStart('diceImage', array('class'=>'input-group-addon')) }}
              {{ Form::label('diceImage', ' ', array('class'=>'fa fa-camera')) }}
              {{ Form::labelEnd() }}
              {{ Form::file('diceImage','', array('class'=>'form-control')) }}
            </div>
        <!-- *******************************************************************************************************
             ************************************************FORM END**********************************************
             *******************************************************************************************************-->   
             <div class="row input-auto">
              <div>
                {{ Form::submit('Save', array('class' => 'btn btn-success pull-right', 'ng-disabled' => 'userForm.$invalid')) }}
              </div>
            </div>
            {{ Form::close() }}
          </div>
        </div>

        @stop