<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SkillsGap;
use Entrust;
use Validator;
use Input;
use App\user;
use Request;

class SkillsGapController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//retrieve list of skills gaps
		$skills=SkillsGap::all();
        return View('admin.skillsgap.index',compact('skills'));
	}
	public function skillGaps()
	{
		//retrieve list of skills gaps
		$skills=SkillsGap::all();
        return View('skillsgap.index',compact('skills'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('skillsgap.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'problem_name' => 'required|max:255|min:4',
			'problem_description' => 'required|max:255|min:10',
			'email' => 'required|email|max:255',
			'username' => 'required|max:255|min:4',
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return redirect('skills/create')
					->withErrors($validator);
		} 
		else 
		{
			// store
			$skill = new SkillsGap;
			//$skill->user_id = Auth::user()->id;
			$skill->problem_name = Request::Input('problem_name');
			$skill->problem_description = Request::Input('problem_description');
			$skill->username = Request::Input('username');
			$skill->email = Request::Input('email');
			$skill->status = "pending";	
			$skill->save();

            if (Entrust::hasRole('admin')) {
            // redirect
			return redirect('admin/skills');
            } else {
            return redirect('skills');
            }
            

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
		//return skill to be deleted
		$skill=SkillsGap::find($id);
   		return view('admin.skillsgap.delete',compact('skill'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		   $skill=SkillsGap::find($id);
   		   return view('skillsgap.edit',compact('skill'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		   $skillUpdate=Request::all();
		   $skill=SkillsGap::find($id);
		   $skill->update($skillUpdate);
		    if(Entrust::hasRole('admin'))		   
		    		return redirect('admin/skills');
		   return redirect('skillsgap/index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		   SkillsGap::find($id)->delete();
   		   return redirect('admin/skills');
	}

}
