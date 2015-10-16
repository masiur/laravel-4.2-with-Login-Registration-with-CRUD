<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{	
		$data = Input::all();
		$rules = array(
	        'first_name' => 'required',
	        'last_name' => 'required',
	        'email' => 'required|email',
	        'password' => 'required',
	        'password_confirm' => 'required|same:password'
	    	);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			//$message = $validator->message();

			return Redirect::route('users.create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			$data = new User;
			$data->first_name 	=Input::get('first_name');
			$data->last_name 	=Input::get('last_name');
			$data->email 		=Input::get('email');
			$data->password 	=Hash::make(Input::get('password'));

			$data->save();

			return Redirect::route('login');
		}



	/*	//$data = Input::only(['first_name', 'last_name', 'email', 'password']);
		$newUser = User::create($data);
		if($newUser) {
			Auth::login($newUser);
			return Redirect::route('profile');
		}
		//return Redirect::route('users.create')->withInput();
		*/
	}
	

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/*
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		return View::make('users.edit')
			->with('users', $user);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::all();
		$rules = array(
	        'first_name' => 'required',
	        'last_name' => 'required',
	        'email' => 'required|email',
	        'password' => 'required',
	        'password_confirm' => 'required|same:password'
	    	);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			//$message = $validator->message();

			return Redirect::back()
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			$data = User::find($id);
			$data->first_name 	=Input::get('first_name');
			$data->last_name 	=Input::get('last_name');
			$data->email 		=Input::get('email');
			$data->password 	=Hash::make(Input::get('password'));

			$data->save();
			Session::flash('message', 'Profile Successfully Updated!');
			return Redirect::route('users.index');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();
		Session::flash('message', 'Successfully Deleted');
			return Redirect::to('login');
	}

	// new added function 
	public function showLogin() {
		return View::make('users.login');
	}
	// handle the login 
	public function handleLogin() {
		$data = Input::only(['email', 'password']);
		// validation
		$validator = Validator::make(
			$data,
			[
				'email' => 'required|email|min:8',
				'password' => 'required',
			]
		);
		if($validator->fails()) {
			return Redirect::route('login')
			->withErrors($validator);
			

		} 
			

		if(Auth::attempt($data)) {
			return Redirect::to('/profile');
		}
		return Redirect::route('login')->withInput();
		
	}
	public function profile() {
		return View::make('users.profile')->with('users', User::all());
	}

	public function logout() {
		if(Auth::check()) {
			Auth::logout();
		}
		return Redirect::route('login');

	}

}