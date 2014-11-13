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
		  	<li ng-repeat="data in datas"> 
		  		<span class="chat-timer" ng-show="timeStamp">@{{data.time}}</span>
		  		<span class="chat-username-span" ng-style="{'color' : data.color}">@{{data.username}}:</span>
		  		<span> @{{data.message}}</span>
		  	</li>
		  </ul>
		</div>
		<div class="chat-input">
		  <form class="chat-form" ng-submit="submit()">
		    <textarea class="chat-text margin-bottom-10" placeholder="Send a message" name="message" cols="50" rows="10" ng-keydown="sendMessage($event)" ng-model="message"></textarea>
		    
		    <!-- Option Menu -->
		      <div ng-show="showOptions" ng-mouseenter="overOptions = true" ng-mouseleave="overOptions = false" click-outside="closeThis()" class="chat-menu">
		    	<div class="chat-menu-container">
		      	<p class="center">CHAT COLOR OPTIONS</p>
			      	<div class="chat-colors">
				      	<table class="chat-colors-table">
						  	<tr ng-repeat="palette in palettes">
							   	<td ng-repeat="line in palette.lines">
									<a class="colors" ng-class="{'color-selected': isActive(line)}" ng-style="line" ng-click="colorPicked(line)"></a>
							   	</td>
					  		</tr>
						</table>
			      	</div>
			      	<div class="checkbox">
					    <label>
					    	<input type="checkbox" ng-model="timeStamp"> Time Stamp
					    </label>
					</div>
		      	</div>
		      </div>
		      <!-- End Option Menu -->

			  <div class="row">
				  <div class="chat-options" title="Chat Settings">
					  <a class="fa fa-cog" ng-click="showOptions = !showOptions" ng-mouseenter="overButton = true" ng-mouseleave="overButton = false"></a>
				  </div>

				  <div class="chat-users" ng-class="{'chat-users-up': chatList, 'chat-users-down': !chatList}">
				  	<div class="chat-wrapper">
						<div class="chat-top">
						  <div>
							<a class="fa fa-close users-close" ng-click="chatList = false"></a>
						  </div>
						  <p class="chat-top-title">Users List</p>
						</div>
						<div class="chat-users-body">
						  <ul>
						  	<li class="type-user-span"><span>Spectator</span></li>
						  	<li class="list-users-span" ng-repeat="user in users">@{{user}}</li>
						  </ul>
						</div>
						</div>
				  </div>
				  <div class="chat-users-list" title="Users List">
				  	<a class="fa fa-list" ng-click="chatList = true"></a>
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