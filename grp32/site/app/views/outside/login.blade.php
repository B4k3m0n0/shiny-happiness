@extends('layouts.master')

@extends('layouts.navbar')

@section('mainbody')

@section('styles')
  @parent
  {{ HTML::style('css/signup.css') }}
@stop

<div class="container">
  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

  {{ Form::open(array('class' => 'border-login')) }}
  	<h3 class="center">Login to your account</h3>
  	<hr>
  	<div class="input-group input-auto margin-bottom-20">
  	  <span class="input-group-addon">
  	  	<i class="fa fa-user"></i>
  	  </span>
  	  {{ Form::text('username', Input::old('username'), array('class'=>'form-control', 'placeholder'=>'Username')) }}
  	</div>
  	<div class="input-group input-auto margin-bottom-20">
      <span class="input-group-addon">
      	<i class="fa fa-lock"></i>
      </span>
        {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
    </div>
 	<div class="input-auto row">
    <div>
      {{ link_to_route('signup', 'Signup', array(), array('class' => 'btn btn-info pull-left')) }}
    </div>
 	  <div>
    	{{ Form::submit('Login', array('class' => 'btn btn-success pull-right')) }}
    </div>
 	</div>
  {{ Form::close() }}
  </div>
</div>
@stop