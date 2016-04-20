@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">Update SkillsGap</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('skills/'.$skill->id).'/update' }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" required>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Problem Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="problem_name" value="{{ $skill->problem_name }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Problem Description</label>
                            <div class="col-xs-6">
                                 <textarea class="form-control" name="problem_description" value="{{ $skill->problem_description }}" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ $skill->email }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $skill->username }}" name="username" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Update Skills Gap
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection