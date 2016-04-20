@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">SkillsGap List</div>
				<div class="panel-body">
                        <h3><a href="{{{URL::to('/skills/create')}}}" class="btn btn-default">add new skill gap</a></h3>
					@if ($skills->count())
						<table class="table table-striped table-bordered">
						    <thead>
						    <tr>
						        <th>Problem Name</th>
						        <th>Problem Description</th>
						        <th>Username</th>
						        <th>Email</th>
						        <th>Status</th>
						        <th>Created_at</th>
						        <th>Updated_at</th>
						        <th>Update</th>
						        <th>Delete</th>
						    </tr>
						    </thead>

						    <tbody>
						    @foreach ($skills as $skill)
						    <tr>
						      <td>{{ $skill->problem_name }}</td>
						      <td>{{ $skill->problem_description }}</td>
						      <td>{{ $skill->username }}</td>
						      <td>{{ $skill->email }}</td>
						      <td>{{ $skill->status }}</td>
						      <td>{{ $skill->created_at}}</td>
						      <td>{{ $skill->updated_at}}</td>
						      <td><a href="{{{URL::to('/skills',$skill->id).'/edit'}}}" class="btn btn-default">Update</a></td>
						      <td><a href="{{{URL::to('/admin/skills',$skill->id).'/delete'}}}" class="btn btn-default">Delete</a></td>
						    @endforeach
						    </tbody>
						</table>
						@else
						There are no Skillgaps in the database
						@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
