@extends('layouts.master')

@extends('layouts.navbar')

@section('mainbody')

@section('styles')
@parent
{{ HTML::style('css/profile.css') }}
@stop

@section('scripts')
@parent
{{ HTML::script('js/profile.js') }}
@stop

<br> <!--TODO Tirar estes br-->
<br>
<br>
<br>
<div class="col-md-4 col-md-offset-4" ng-controller="ProfileController" >

	{{ Form::open(array('class' => 'border-login')) }} <!--TODO route = profile????-->

  <h3 class="center">User Profile</h3>
  

  <br>		
  <hr>


          <!-- *******************************************************************************************************
               ************************************************PICTURE************************************************
               *******************************************************************************************************-->

               <div class="thumbnail margin-center" style="min-height:150;min-width:150;width:160;">
                {{HTML::image($user['picture'], "user picture", array('style'=>'min-height:150;height:150;min-width:150;width:150;'))}}
              </div>
              <div class="@if ($errors->has('picture')) has-error @endif">
                @if ($errors->has('picture')) <p class="help-block">{{ $errors->first('picture') }}</p> @endif
              </div>
              

          <!-- **************************************************************************************************
               *********************************************USERNAME*********************************************
               **************************************************************************************************-->

               <div class="input-group margin-center margin-bottom-20">
                {{ Form::labelStart('username', array('class'=>'input-group-addon signup-obligatory')) }}
                {{ Form::label('username', ' ', array('class'=>'fa fa-user')) }}
                {{ Form::labelEnd() }}
                {{ Form::text('username', $user->username, array('class'=>'form-control', 'placeholder'=>'Username','readonly')) }}
              </div>

              <!-- <fieldset ng-disabled="toggleEdit">-->


          <!-- *******************************************************************************************************
               ************************************************FULLNAME***********************************************
               *******************************************************************************************************-->
               <div class="@if ($errors->has('fullname')) has-error @endif">
                @if ($errors->has('fullname')) <p class="help-block">{{ $errors->first('fullname') }}</p> @endif
              </div>
              <div class="input-group margin-center margin-bottom-20">
                {{ Form::labelStart('fullname', array('class'=>'input-group-addon signup-obligatory')) }}
                {{ Form::label('fullname', ' ', array('class'=>'fa fa-male')) }}
                {{ Form::labelEnd() }}
                {{ Form::text('fullname', $user->fullname, array('class'=>'form-control', 'placeholder'=>'Full Name','readonly')) }}
              </div>
          <!-- *******************************************************************************************************
               **************************************************EMAIL************************************************
               *******************************************************************************************************-->
               <div class="@if ($errors->has('email')) has-error @endif">
                @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
              </div>
              <div class="@if(Session::has('message')) has-error @endif">
                @if(Session::has('message')) <p class="help-block">{{ Session::get('message') }}</p> @endif	
              </div>
              <div class="input-group margin-center margin-bottom-20">
                {{ Form::labelStart('email', array('class'=>'input-group-addon signup-obligatory')) }}
                {{ Form::label('email', ' ', array('class'=>'fa fa-envelope')) }}
                {{ Form::labelEnd() }}
                {{ Form::email('email', $user->email, array('class'=>'form-control', 'placeholder'=>'E-Mail','readonly')) }}
              </div>

          <!-- *******************************************************************************************************
               ************************************************BIRTHDATE**********************************************
               *******************************************************************************************************-->
               <div class="@if ($errors->has('birthdate')) has-error @endif">
                @if ($errors->has('birthdate')) <p class="help-block">{{ $errors->first('birthdate') }}</p> @endif
              </div>
              <div class="@if(Session::has('messageInvalidAge')) has-error @endif">
                @if(Session::has('messageInvalidAge')) <p class="help-block">{{ Session::get('messageInvalidAge') }}</p> @endif 
              </div> 
              <div class="input-group margin-center margin-bottom-20">
                {{ Form::labelStart('birthdate', array('class'=>'input-group-addon signup-obligatory')) }}
                {{ Form::label('birthdate', ' ', array('class'=>'fa fa-calendar')) }}
                {{ Form::labelEnd() }}
                {{ Form::text('birthdate', $user->birthdate, array('class'=>'form-control', 'placeholder'=>'Birth Date (yyyy-mm-dd)','readonly')) }}
              </div>
          <!-- *******************************************************************************************************
               *************************************************COUNTRY***********************************************
               *******************************************************************************************************-->
               <div class="@if ($errors->has('country')) has-error @endif">
                @if ($errors->has('country')) <p class="help-block">{{ $errors->first('country') }}</p> @endif
              </div>
              <div class="input-group margin-center margin-bottom-20">
                {{ Form::labelStart('country', array('class'=>'input-group-addon signup-obligatory')) }}
                {{ Form::label('country', ' ', array('class'=>'fa fa-map-marker')) }}
                {{ Form::labelEnd() }}
                {{ Form::text('country', $user->country, array('class'=>'form-control', 'placeholder'=>'Country','readonly')) }}
              </div>    

          <!-- *******************************************************************************************************
               ***********************************************PHONE NUMBER********************************************
               *******************************************************************************************************-->
               <div class="@if ($errors->has('phone')) has-error @endif">
                @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
              </div>
              <div class="input-group margin-center margin-bottom-20">
                {{ Form::labelStart('phone', array('class'=>'input-group-addon')) }}
                {{ Form::label('phone', ' ', array('class'=>'fa fa-phone')) }}
                {{ Form::labelEnd() }}
                {{ Form::text('phone', $user->phone, array('class'=>'form-control', 'placeholder'=>'Phone Number','readonly')) }}
              </div>
          <!-- *******************************************************************************************************
               ************************************************FACEBOOK***********************************************
               *******************************************************************************************************-->
               <div class="@if ($errors->has('facebook')) has-error @endif">
                @if ($errors->has('facebook')) <p class="help-block">{{ $errors->first('facebook') }}</p> @endif
              </div>
              <div class="input-group margin-center margin-bottom-20">
                {{ Form::labelStart('facebook', array('class'=>'input-group-addon')) }}
                {{ Form::label('facebook', ' ', array('class'=>'fa fa-facebook-square')) }}
                {{ Form::labelEnd() }}
                {{ Form::text('facebook', $user->facebook, array('class'=>'form-control', 'placeholder'=>'Facebook','readonly')) }}
              </div>
          <!-- *******************************************************************************************************
               *************************************************TWITTER***********************************************
               *******************************************************************************************************-->
               <div class="@if ($errors->has('twitter')) has-error @endif">
                @if ($errors->has('twitter')) <p class="help-block">{{ $errors->first('twitter') }}</p> @endif
              </div>
              <div class="input-group margin-center margin-bottom-20">
                {{ Form::labelStart('twitter', array('class'=>'input-group-addon')) }}
                {{ Form::label('twitter', ' ', array('class'=>'fa fa-lock')) }}
                {{ Form::labelEnd() }}
                {{ Form::text('twitter', $user->twitter, array('class'=>'form-control', 'placeholder'=>'Twitter','readonly')) }}
              </div>
          <!-- *******************************************************************************************************
               ************************************************FORM END**********************************************
               *******************************************************************************************************-->
               <div class="row">
                
              </div>
              <!-- </fieldset>-->

              {{ Form::close() }}
            </div>