<?php

class ChatRoomController extends BaseController {

	public function storeMessage()
	{
		$chatMessage = Input::all();
		$validation = Validator::make($chatMessage, ChatRoom::$rules);

		if ($validation->passes())
		{
			ChatRoom::create($chatMessage);
		}
	}

	public function getMessage()
	{
		/*Quando a base de dados estiver bem feita procurar de outra forma |TEMPORARIO|*/

		$message = ChatRoom::orderby('id', 'desc')->first();

		return $message;
	}
}