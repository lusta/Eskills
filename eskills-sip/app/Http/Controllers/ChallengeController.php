<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Challenge;
use Validator;
use Request;
use Input;

class ChallengeController extends Controller {



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//retrive all challenges
		$challenges = Challenge::all();
		return view('challenges', compact('challenges'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('challenges.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$rules = array(
			'title' => 'required|max:255|min:4',
			'about' => 'required|max:255|min:6',
			'challenge_date' => 'required',
			'is_private' => 'numeric',
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return redirect('admin/users')
					->withErrors($validator);
		} 
		else 
		{
			// store
			$challenge = new Challenge();
			$challenge->user_id = Request::Input('user_id');
			$challenge->skills_gap_id = Request::Input('skills_gap_id');
			$challenge->title = Request::Input('title');
			$challenge->about = Request::Input('about');
			$challenge->challenge_date = Request::Input('challenge_date');
			$challenge->is_private = Request::Input('is_private');
			$challenge->save();

			// redirect
			return redirect('admin/users');
		}
	}

	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
