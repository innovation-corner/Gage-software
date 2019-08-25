@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">Government_position_policy</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Add/Modify Government_position_policy    </div>

    <div class="panel-body">
                
        <form action="{{ url('/government_position_policies'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
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
                <label for="government_position_id" class="col-sm-3 control-label">Government Position Id</label>
                <div class="col-sm-2">
                    <input type="number" name="government_position_id" id="government_position_id" class="form-control" value="{{$model['government_position_id'] or ''}}">
                </div>
            </div>
                                                                                    <div class="form-group">
                <label for="policy_name" class="col-sm-3 control-label">Policy Name</label>
                <div class="col-sm-6">
                    <input type="text" name="policy_name" id="policy_name" class="form-control" value="{{$model['policy_name'] or ''}}">
                </div>
            </div>
                                                                                                            <div class="form-group">
                <label for="government_policy_category_id" class="col-sm-3 control-label">Government Policy Category Id</label>
                <div class="col-sm-2">
                    <input type="number" name="government_policy_category_id" id="government_policy_category_id" class="form-control" value="{{$model['government_policy_category_id'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="year" class="col-sm-3 control-label">Year</label>
                <div class="col-sm-2">
                    <input type="number" name="year" id="year" class="form-control" value="{{$model['year'] or ''}}">
                </div>
            </div>
                                                                                    <div class="form-group">
                <label for="policy_header" class="col-sm-3 control-label">Policy Header</label>
                <div class="col-sm-6">
                    <input type="text" name="policy_header" id="policy_header" class="form-control" value="{{$model['policy_header'] or ''}}">
                </div>
            </div>
                                                                                                                                    <div class="form-group">
                <label for="policy_description_content" class="col-sm-3 control-label">Policy Description Content</label>
                <div class="col-sm-6">
                    <input type="text" name="policy_description_content" id="policy_description_content" class="form-control" value="{{$model['policy_description_content'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="image_urls" class="col-sm-3 control-label">Image Urls</label>
                <div class="col-sm-6">
                    <input type="text" name="image_urls" id="image_urls" class="form-control" value="{{$model['image_urls'] or ''}}">
                </div>
            </div>
                                                                        <div class="form-group">
                <label for="inserted_by" class="col-sm-3 control-label">Inserted By</label>
                <div class="col-sm-2">
                    <input type="number" name="inserted_by" id="inserted_by" class="form-control" value="{{$model['inserted_by'] or ''}}">
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
                    <a class="btn btn-default" href="{{ url('/government_position_policies') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection