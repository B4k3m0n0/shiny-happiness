<?php

class ProjetoController extends BaseController {

	/**
	 * Projeto Repository
	 *
	 * @var Projeto
	 */
	protected $projeto;

	public function __construct(Projeto $projeto)
	{
		$this->projeto = $projeto;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		/*$messages = $this->projeto->all();*/

		return View::make('outside/login');
	}

	public function signup(){
		return View::make('outside/signup');
	}


	public function getMessages()
	{
		$messages = $this->projeto->all();
		return $messages;
	}

	public function getNewMessages()
	{		
		$messages = $this->projeto->orderby('created_at', 'desc')->first();

		return $messages;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('projetos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, projeto::$rules);

		if ($validation->passes())
		{
			$this->projeto->create($input);

			/*return Redirect::to('layout');*/
		}

		/*return Redirect::route('projetos.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');*/
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$projeto = $this->projeto->findOrFail($id);

		return View::make('projetos.show', compact('projeto'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$projeto = $this->projeto->find($id);

		if (is_null($projeto))
		{
			return Redirect::route('projetos.index');
		}

		return View::make('projetos.edit', compact('projeto'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Projeto::$rules);

		if ($validation->passes())
		{
			$projeto = $this->projeto->find($id);
			$projeto->update($input);

			return Redirect::route('projetos.show', $id);
		}

		return Redirect::route('projetos.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->projeto->find($id)->delete();

		return Redirect::route('projetos.index');
	}

}
