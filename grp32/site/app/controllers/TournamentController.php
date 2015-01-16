<?php

class TournamentController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /tournament
	 *
	 * @return Response
	 */
	public function showTournaments(){

		if (Auth::check()) {
			return View::make('tournaments/tournaments');
		}
		return Redirect::to('login');
	}


	public function createTournament(){
		/*$nRounds = array("Number of Rounds","1","2","3","4","5");
		return View::make('tournament', compact('nRounds'));*/
	}

	public function showNewTournament(){

		if (Auth::check() ){
			return View::make('tournaments/newTournament');
		}
		return Redirect::to('login');

		/*if (Auth::check() ){
			$nRounds = array("Number of Rounds","1","2","3","4","5");
			return View::make('tournaments/newTournament', compact('nRounds'));
		}*/
	
	}

	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /tournament/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /tournament
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /tournament/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /tournament/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /tournament/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /tournament/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}