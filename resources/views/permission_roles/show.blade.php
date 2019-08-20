@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Permission_role</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Permission_role    </div>

    <div class="panel-body">
                

        <form action="{{ url('/permission_roles') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="permission_id" class="col-sm-3 control-label">Permission Id</label>
            <div class="col-sm-6">
                <input type="text" name="permission_id" id="permission_id" class="form-control" value="{{$model['permission_id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="role_id" class="col-sm-3 control-label">Role Id</label>
            <div class="col-sm-6">
                <input type="text" name="role_id" id="role_id" class="form-control" value="{{$model['role_id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/permission_roles') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection