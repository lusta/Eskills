@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">Delete Confirmation</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/users/'.$user->id).'/destroy' }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <div class="form-group">
                            <label class="col-md-4 control-label">Are you Sure You want to delete  <h1 style="color:green">{{$user->name}}</h1></label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Delete
                                </button>
                                <a href="{{{URL::to('/admin/users')}}}" class="btn btn-default">Cancel</a>
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