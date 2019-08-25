@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">Government_staff_office</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Add/Modify Government_staff_office    </div>

    <div class="panel-body">
                
        <form action="{{ url('/government_staff_offices'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            @if (isset($model))
                <input type="hidden" name="_method" value="PATCH">
            @endif


                                    <div class="form-group">
                <label for="id" class="col-sm-3 control-label">Id</label>
                <div class="col-sm-6">
                    <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
                </div>
            </div>
                                                                                                                        <div class="form-group">
                <label for="government_staff_id" class="col-sm-3 control-label">Government Staff Id</label>
                <div class="col-sm-2">
                    <input type="number" name="government_staff_id" id="government_staff_id" class="form-control" value="{{$model['government_staff_id'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="government_position_id" class="col-sm-3 control-label">Government Position Id</label>
                <div class="col-sm-2">
                    <input type="number" name="government_position_id" id="government_position_id" class="form-control" value="{{$model['government_position_id'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="year" class="col-sm-3 control-label">Year</label>
                <div class="col-sm-2">
                    <input type="number" name="year" id="year" class="form-control" value="{{$model['year'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="created_by" class="col-sm-3 control-label">Created By</label>
                <div class="col-sm-2">
                    <input type="number" name="created_by" id="created_by" class="form-control" value="{{$model['created_by'] or ''}}">
                </div>
            </div>
                                                                                                            <div class="form-group">
                <label for="created_at" class="col-sm-3 control-label">Created At</label>
                <div class="col-sm-3">
                    <input type="date" name="created_at" id="created_at" class="form-control" value="{{$model['created_at'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="updated_at" class="col-sm-3 control-label">Updated At</label>
                <div class="col-sm-3">
                    <input type="date" name="updated_at" id="updated_at" class="form-control" value="{{$model['updated_at'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="deleted_at" class="col-sm-3 control-label">Deleted At</label>
                <div class="col-sm-3">
                    <input type="date" name="deleted_at" id="deleted_at" class="form-control" value="{{$model['deleted_at'] or ''}}">
                </div>
            </div>
                                    
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button> 
                    <a class="btn btn-default" href="{{ url('/government_staff_offices') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection