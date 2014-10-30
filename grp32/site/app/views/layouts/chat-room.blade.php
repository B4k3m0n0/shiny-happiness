@yield('layouts.master')

@section('chat-room')
<a class="chat-button open glyphicon glyphicon-minus"></a>
<div class="chat-room open" ng-app="app">
  <div class="chat-wrapper"  ng-controller="ChatController">
	<div class="chat-top" >
	  <div class="chat-user-image">
		<img src="http://2.bp.blogspot.com/-wGkhtTgPpPg/VCxX5_0__QI/AAAAAAAAaME/R_D1UhoC-0Y/s1600/LeeSin_Square_0.png">
	  </div>
	  <p class="chat-username">{{$username}}</p>
	</div>
	<div class="chat-body">
	  <ul class="chat-message-lines">
	  	<li ng-repeat="message in messages">
    	  <span class="chat-username-span">@{{ message.username || "Anonymous" }}:</span>
    	  <span>@{{ message.message }}</span>
    	</li>
	  </ul>	
	</div>
	<div class="chat-input">
	  <form class="chat-form" ng-submit="submitMessages()">
	    <textarea class="chat-text margin-bottom-10" placeholder="Send a message" name="message" cols="50" rows="10" ng-model="message" ng-value="chatMessage.message"></textarea>
	    
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
	        <input class="btn btn-primary pull-right" type="submit" value="Chat">
	      </div>
	 	</div>
 	  </form>	
	</div>
  </div>
</div>

@stop