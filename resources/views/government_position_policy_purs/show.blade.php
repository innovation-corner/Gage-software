@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Government_position_policy_pur</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Government_position_policy_pur    </div>

    <div class="panel-body">
                

        <form action="{{ url('/government_position_policy_purs') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="pur_user_id" class="col-sm-3 control-label">Pur User Id</label>
            <div class="col-sm-6">
                <input type="text" name="pur_user_id" id="pur_user_id" class="form-control" value="{{$model['pur_user_id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="rating_id" class="col-sm-3 control-label">Rating Id</label>
            <div class="col-sm-6">
                <input type="text" name="rating_id" id="rating_id" class="form-control" value="{{$model['rating_id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="remark" class="col-sm-3 control-label">Remark</label>
            <div class="col-sm-6">
                <input type="text" name="remark" id="remark" class="form-control" value="{{$model['remark'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="government_position_policy_id" class="col-sm-3 control-label">Government Position Policy Id</label>
            <div class="col-sm-6">
                <input type="text" name="government_position_policy_id" id="government_position_policy_id" class="form-control" value="{{$model['government_position_policy_id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="created_at" class="col-sm-3 control-label">Created At</label>
            <div class="col-sm-6">
                <input type="text" name="created_at" id="created_at" class="form-control" value="{{$model['created_at'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="updated_at" class="col-sm-3 control-label">Updated At</label>
            <div class="col-sm-6">
                <input type="text" name="updated_at" id="updated_at" class="form-control" value="{{$model['updated_at'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="deleted_at" class="col-sm-3 control-label">Deleted At</label>
            <div class="col-sm-6">
                <input type="text" name="deleted_at" id="deleted_at" class="form-control" value="{{$model['deleted_at'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/government_position_policy_purs') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection