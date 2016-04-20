<?php namespace App\Http\Controllers\admin;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller as Controller;
use Request;
use Datatables;
use Validator;
use Input;
class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		//retrieve users
		$usersList=User::all();
        return View('admin.dashboard.index',compact('usersList'));


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.dashboard.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name' => 'required|max:255|min:4',
			'surname' => 'required|max:255|min:4',
			'email' => 'required|email|max:255|unique:users',
			'location' => 'required|max:255|min:4',
			'password' => 'required|confirmed|min:6',
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return redirect('admin/create')
					->withErrors($validator);
					//->withInput(Input::except('password'));
		} 
		else 
		{
			// store
			$user = new User;
			$user->name       = Request::Input('name');
			$user->surname    = Request::Input('surname');
			$user->email 	  = Request::Input('email');
			$user->location   = Request::Input('location');
			$user->password   = bcrypt(Request::Input('password'));
			$user->save();

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
		   $user=User::find($id);
   		   return view('admin.dashboard.delete',compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		   $user=User::find($id);
   		   return view('admin.dashboard.edit',compact('user'));
	}
	public function test()
	{
		return view('admin.users.index');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		   $userUpdate=Request::all();
		   $user=User::find($id);
		   $user->update($userUpdate);
		   return redirect('admin/users');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		   User::find($id)->delete();
   		   return redirect('admin/users');
	 }
	public function data()
    {
        $users = User::select(array('users.id','users.name','users.email','users.surname', 'users.created_at' , 'users.location','users.updated_at'));
        echo '<pre>';
        var_dump($users);
        die();
        return Datatables::of($users)
            ->edit_column('confirmed', '@if ($confirmed=="1") <span class="glyphicon glyphicon-ok"></span> @else <span class=\'glyphicon glyphicon-remove\'></span> @endif')
            ->add_column('actions', '@if ($id!="1")<a href="{{{ URL::to(\'admin/users/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/users/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
                @endif')
            ->remove_column('id')

            ->make();
    }

}
