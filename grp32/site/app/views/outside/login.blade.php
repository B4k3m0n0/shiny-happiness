@extends('layouts.master')

@extends('layouts.navbar')

@section('mainbody')

@section('styles')
  @parent
  {{ HTML::style('css/signup.css') }}
@stop

<div class="col-md-4 col-md-offset-4">

  {{ Form::open(array('class' => 'border-login')) }}
  	<h3 class="center">Login to your account</h3>
  	<hr>
  	<div class="input-group margin-center margin-bottom-20">
  	  <span class="input-group-addon">
  	  	<i class="fa fa-user"></i>
  	  </span>
  	  {{ Form::text('username', Input::old('username'), array('class'=>'form-control', 'placeholder'=>'Username')) }}
  	</div>
  	<div class="input-group margin-center margin-bottom-20">
      <span class="input-group-addon">
      	<i class="fa fa-lock"></i>
      </span>
        {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
    </div>
 	<div class="row">
    <div class=" col-md-6">
      {{ link_to_route('signup', 'Signup', array(), array('class' => 'btn btn-info pull-left')) }}
    </div>
 	  <div class=" col-md-6">
    	{{ Form::submit('Login', array('class' => 'btn btn-success pull-right')) }}
    </div>
 	</div>
  {{ Form::close() }}
</div>

@stop