@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">List of Users</div>
				<div class="panel-body">
                        <h3><a href="{{{URL::to('/admin/users/create')}}}" class="btn btn-default">add user</a></h3>
					@if ($usersList->count())
						<table class="table table-striped table-bordered">
						    <thead>
						    <tr>
						        <th>Firstname</th>
						        <th>Lastname</th>
						        <th>Email</th>
						        <th>Location</th>
						        <th>Created_at</th>
						        <th>Updated_at</th>
						        <th>Update</th>
						        <th>Delete</th>
						    </tr>
						    </thead>

						    <tbody>
						    @foreach ($usersList as $user)
						    <tr>
						      <td>{{ $user->name }}</td>
						      <td>{{ $user->surname }}</td>
						      <td>{{ $user->email }}</td>
						      <td>{{ $user->location }}</td>
						      <td>{{ $user->created_at}}</td>
						      <td>{{ $user->updated_at}}</td>
						      <td><a href="{{{URL::to('/admin/users',$user->id).'/edit'}}}" class="btn btn-default">Update</a></td>
						      <td><a href="{{{URL::to('/admin/users',$user->id).'/delete'}}}" class="btn btn-default">Delete</a></td>
						    @endforeach
						    </tbody>
						</table>
						@else
						There are no users
						@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
