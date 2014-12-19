@extends('layouts.master')

@extends('layouts.navbar')

@section('styles')
@parent
{{ HTML::style('css/signup.css') }}
@stop

@section('mainbody')

<div class="container">
  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">


    {{ Form::open(array('class' => 'border-login', 'method' => 'post', 'route' => 'signup')) }}
    <h3 class="center">Create your account</h3>
    <hr>
    <div class="div-obligatory">
      <div class="box-obligatory"></div>
      <span class="text-obligatory">- obligatory fields</span>
    </div>
    <hr>
    <div class="input-group input-auto margin-bottom-20">
      {{ Form::labelStart('username', array('class'=>'input-group-addon signup-obligatory')) }}
      {{ Form::label('username', ' ', array('class'=>'fa fa-user')) }}
      {{ Form::labelEnd() }}
      {{ Form::text('username', Input::old('username'), array('class'=>'form-control', 'placeholder'=>'Username')) }}    
    </div>
    <div class="@if ($errors->has('username')) has-error @endif">
      @if ($errors->has('username')) <p class="help-block" >{{ $errors->first('username') }}</p> @endif
    </div>
    <div class="input-group input-auto margin-bottom-20">
      {{ Form::labelStart('password', array('class'=>'input-group-addon signup-obligatory')) }}
      {{ Form::label('password', ' ', array('class'=>'fa fa-lock')) }}
      {{ Form::labelEnd() }}
      {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
    </div>
    <div class="@if ($errors->has('password')) has-error @endif">
      @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
    </div>
    <div class="input-group input-auto margin-bottom-20">
      {{ Form::labelStart('fullname', array('class'=>'input-group-addon signup-obligatory')) }}
      {{ Form::label('fullname', ' ', array('class'=>'fa fa-male')) }}
      {{ Form::labelEnd() }}
      {{ Form::text('fullname', Input::old('fullname'), array('class'=>'form-control', 'placeholder'=>'Full Name')) }}
    </div>
    <div class="@if ($errors->has('fullname')) has-error @endif">
      @if ($errors->has('fullname')) <p class="help-block">{{ $errors->first('fullname') }}</p> @endif
    </div>
    <div class="input-group input-auto margin-bottom-20">
      {{ Form::labelStart('email', array('class'=>'input-group-addon signup-obligatory')) }}
      {{ Form::label('email', ' ', array('class'=>'fa fa-envelope')) }}
      {{ Form::labelEnd() }}
      {{ Form::email('email', Input::old('email'), array('class'=>'form-control', 'placeholder'=>'E-Mail')) }}
    </div>
    <div class="@if ($errors->has('email')) has-error @endif">
      @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
    </div>
    <div class="input-group input-auto margin-bottom-20">
      {{ Form::labelStart('creditcard', array('class'=>'input-group-addon signup-obligatory')) }}
      {{ Form::label('creditcard', ' ', array('class'=>'fa fa-credit-card')) }}
      {{ Form::labelEnd() }}
      {{ Form::text('creditcard', Input::old('creditcard'), array('class'=>'form-control', 'placeholder'=>'Credit Card')) }}
    </div>
    <div class="@if ($errors->has('creditcard')) has-error @endif">
      @if ($errors->has('creditcard')) <p class="help-block">{{ $errors->first('creditcard') }}</p> @endif
    </div>
    <div class="input-group input-auto margin-bottom-20">
      {{ Form::labelStart('birthdate', array('class'=>'input-group-addon signup-obligatory')) }}
      {{ Form::label('birthdate', ' ', array('class'=>'fa fa-calendar')) }}
      {{ Form::labelEnd() }}
      {{ Form::text('birthdate', Input::old('birthdate'), array('class'=>'form-control', 'placeholder'=>'Birth Date (dd-mm-yyyy)')) }}
    </div>
    <div class="@if ($errors->has('birthdate')) has-error @endif">
      @if ($errors->has('birthdate')) <p class="help-block">{{ $errors->first('birthdate') }}</p> @endif
    </div>
    <div class="input-group input-auto margin-bottom-20">
      {{ Form::labelStart('country', array('class'=>'input-group-addon signup-obligatory')) }}
      {{ Form::label('country', ' ', array('class'=>'fa fa-map-marker')) }}
      {{ Form::labelEnd() }}
      {{ Form::text('country', Input::old('country'), array('class'=>'form-control', 'placeholder'=>'Country')) }}
    </div>
    <div class="@if ($errors->has('country')) has-error @endif">
      @if ($errors->has('country')) <p class="help-block">{{ $errors->first('country') }}</p> @endif
    </div>
    <div class="input-group input-auto margin-bottom-20">
      {{ Form::labelStart('picture', array('class'=>'input-group-addon')) }}
      {{ Form::label('picture', ' ', array('class'=>'fa fa-camera')) }}
      {{ Form::labelEnd() }}
      {{ Form::text('picture', Input::old('picture'), array('class'=>'form-control', 'placeholder'=>'Picture')) }}
    </div>
    <div class="@if ($errors->has('picture')) has-error @endif">
      @if ($errors->has('picture')) <p class="help-block">{{ $errors->first('picture') }}</p> @endif
    </div>
    <div class="input-group input-auto margin-bottom-20">
      {{ Form::labelStart('address', array('class'=>'input-group-addon')) }}
      {{ Form::label('address', ' ', array('class'=>'fa fa-home')) }}
      {{ Form::labelEnd() }}
      {{ Form::text('address', Input::old('address'), array('class'=>'form-control', 'placeholder'=>'Address')) }}
    </div>
    <div class="@if ($errors->has('address')) has-error @endif">
      @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
    </div>
    <div class="input-group input-auto margin-bottom-20">
      {{ Form::labelStart('phone', array('class'=>'input-group-addon')) }}
      {{ Form::label('phone', ' ', array('class'=>'fa fa-phone')) }}
      {{ Form::labelEnd() }}
      {{ Form::text('phone', Input::old('phone'), array('class'=>'form-control', 'placeholder'=>'Phone Number')) }}
    </div>
    <div class="@if ($errors->has('phone')) has-error @endif">
      @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
    </div>
    <div class="input-group input-auto margin-bottom-20">
      {{ Form::labelStart('facebook', array('class'=>'input-group-addon')) }}
      {{ Form::label('facebook', ' ', array('class'=>'fa fa-facebook-square')) }}
      {{ Form::labelEnd() }}
      {{ Form::text('facebook', Input::old('facebook'), array('class'=>'form-control', 'placeholder'=>'Facebook')) }}
    </div>
    <div class="@if ($errors->has('facebook')) has-error @endif">
      @if ($errors->has('facebook')) <p class="help-block">{{ $errors->first('facebook') }}</p> @endif
    </div>
    <div class="input-group input-auto margin-bottom-20">
      {{ Form::labelStart('twitter', array('class'=>'input-group-addon')) }}
      {{ Form::label('twitter', ' ', array('class'=>'fa fa-twitter')) }}
      {{ Form::labelEnd() }}
      {{ Form::text('twitter', Input::old('twitter'), array('class'=>'form-control', 'placeholder'=>'Twitter')) }}
    </div>
    <div class="@if ($errors->has('twitter')) has-error @endif">
      @if ($errors->has('twitter')) <p class="help-block">{{ $errors->first('twitter') }}</p> @endif
    </div>
    <div class="row input-auto">
      <div>
        {{ Form::submit('Create', array('class' => 'btn btn-success pull-right')) }}

      </div>
    </div>
    {{ Form::close() }}
  </div>
</div>

@stop