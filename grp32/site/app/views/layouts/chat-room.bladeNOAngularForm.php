@extends('layouts.master')

@section('chat-room')
	<div class="chat-top" ng-controller="ChatController">
	  <div class="chat-user-image">
		<img src="http://2.bp.blogspot.com/-wGkhtTgPpPg/VCxX5_0__QI/AAAAAAAAaME/R_D1UhoC-0Y/s1600/LeeSin_Square_0.png">
	  </div>
	  <p class="chat-username">TODO: UserName</p>
	</div>
	<div class="chat-body">
	  <ul class="chat-message-lines">
	  	@foreach ($messages as $message)
	  	  <li>
    	  	<span class="chat-username-span">{{{ isset($message->username) ? $message->username : 'Anonymous' }}}:</span>
    	  	<span>{{{$message->message}}}</span>
    	  </li>
		@endforeach
	  </ul>	
	</div>
	<div class="chat-input">
	  {{ Form::open(array('class' => 'chat-form')) }}
	    {{ Form::textarea('message', '', array('class' => 'chat-text margin-bottom-10', 'placeholder' => 'Send a message')) }}

	    <!-- Option Menu -->
	      <div class="chat-menu closed">
	      	<p class="center">CHAT COLOR OPTIONS</p>
	      	<div class="chat-colors">
	      	  <table class="chat-colors-table">
	      	  	@for ($i = 1; $i <= 2; $i++)
				  <tr>
				   	@for ($j = 1; $j <= 5; $j++)
				   	  <td>
				   	  	<a class="chat-color"></a>
				   	  </td>
				    @endfor
				  </tr>
				@endfor
			  </table>
	      	</div>
	      </div>
	      <!-- End Option Menu -->

		  <div class="row">
			<div class="col-md-6">
		  	  <a class="glyphicon glyphicon-cog chat-button-options"></a>
		  	</div>
	 	  <div class="col-md-6">
	        {{ Form::submit('Chat', array('class' => 'btn btn-primary pull-right')) }}
	      </div>
	 	</div>
 	  {{ Form::close() }}	
	</div>	

@stop