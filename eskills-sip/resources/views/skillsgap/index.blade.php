
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
						    @foreach ($skills as $skill)
						    <div>
						      <p>{{ $skill->problem_name }} </p>
						      <p>{{ $skill->problem_description }}</p>
						      <p>Created By {{ $skill->username }}  at {{ $skill->created_at}}</p>
						      <p><a href="{{{URL::to('/skills',$skill->id).'/edit'}}}" class="fa fa-pencil fa-fw" data-toggle="tooltip" title="Edit Skills Gap"></a>
						      <a href="{{{URL::to('/admin/skills',$skill->id).'/delete'}}}" class="fa fa-trash-o fa-fw" data-toggle="tooltip" title="Delete Skills Gap"></a></p>
						      <p>
						      	<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/store') }}">
						      		<div class="form-group">
								        <div class="col-xs-6">
								            <textarea class="form-control" name="content" rows="5" placeholder="leave a comment"></textarea>
								        </div>
								    </div>
								    <div class="form-group">
			                            <div class="col-md-6 col-md-offset-4">
			                                <button type="submit" class="btn btn-default">
			                                    Leave Comment
			                                </button>
			                            </div>
			                        </div>
						      	</form>
						      </p>
						      </div>
						    @endforeach
						@else
						There are no Skillgaps in the database
						@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
