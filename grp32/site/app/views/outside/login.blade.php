@extends('layouts.master')

@extends('layouts.navbar')

@section('mainbody')

<div class="col-md-4 col-md-offset-4">

  {{ Form::open(array('class' => 'border-login')) }}
  	<h3 class="center">Login to your account</h3>
  	<hr>
  	<div class="input-group margin-bottom-20">
  	  <span class="input-group-addon">
  	  	<i class="fa fa-user"></i>
  	  </span>
  	  {{ Form::text('username', Input::old('username'), array('class'=>'form-control', 'placeholder'=>'Username')) }}
  	</div>
  	<div class="input-group margin-bottom-20">
      <span class="input-group-addon">
      	<i class="fa fa-lock"></i>
      </span>
        {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
    </div>
 	<div class="row">
 	  <div class=" col-md-12">
    	{{ Form::submit('Login', array('class' => 'btn btn-success pull-right')) }}
      </div>
 	</div>
  {{ Form::close() }}
</div>

@stop