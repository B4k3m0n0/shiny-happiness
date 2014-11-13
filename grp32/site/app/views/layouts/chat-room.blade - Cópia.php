@yield('layouts.master')

@section('styles')
	@parent
	{{ HTML::style('css/chat.css') }}
@stop

@section('chat-room')
<a class="chat-button open fa fa-minus"></a>
<div id="chat" class="chat-room open">
	<div class="chat-wrapper"  ng-controller="ChatController">
		<div class="chat-top" >
		  <div class="chat-user-image">
				<img src="http://2.bp.blogspot.com/-wGkhtTgPpPg/VCxX5_0__QI/AAAAAAAAaME/R_D1UhoC-0Y/s1600/LeeSin_Square_0.png">
		  </div>
		  <p class="chat-top-title" ng-init="username = '{{$username}}'">{{$username}}</p>
		</div>
		<div class="chat-body">
		  <ul>
		  	<!-- CHAT MESSAGES-->
		  </ul>
		</div>
		<div class="chat-input">
		  <form class="chat-form" ng-submit="submit()">
		    <textarea class="chat-text margin-bottom-10" placeholder="Send a message" name="message" cols="50" rows="10" ng-keydown="sendMessage($event)" ng-model="message"></textarea>
		    
		    <!-- Option Menu -->
		      <div class="chat-menu closed">
		    	<div class="chat-menu-container">
		      	<p class="center">CHAT COLOR OPTIONS</p>
			      	<div class="chat-colors">
				      	<table class="chat-colors-table">
				      	  	@for ($i = 1; $i <= 2; $i++)
							  	<tr>
								   	@for ($j = 1; $j <= 5; $j++)
								   	  <td>
								   	  	<a class="chat-color{{$i}}{{$j}} colors"></a>
								   	  </td>
							    	@endfor
						  		</tr>
							@endfor
						</table>
			      	</div>
			      	<div class="checkbox">
					    <label>
					    	<input type="checkbox"> Time Stamp
					    </label>
					</div>
		      	</div>
		      </div>
		      <!-- End Option Menu -->

			  <div class="row">
				<div class="chat-options" title="Chat Settings">
			  	<a class="fa fa-cog"></a>
			  </div>

			  <div class="chat-users">
			  	<div class="chat-wrapper">
					<div class="chat-top">
					  <div>
							<a class="fa fa-close users-close"></a>
					  </div>
					  <p class="chat-top-title">Users List</p>
					</div>
					<div class="chat-users-body">
					  <ul>
					  	<!-- CHAT USERS-->
					  </ul>
					</div>
					</div>
			  </div>


			  <div class="chat-users-list" title="Users List">
			  	<a class="fa fa-list"></a>
			  </div>
		 	  <div class="chat-send">
		      <input class="btn btn-primary pull-right" type="submit" value="Chat">
		    </div>
		 	</div>
	 	  </form>	
		</div>
	</div>
</div>

@stop