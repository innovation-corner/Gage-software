@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Government_position_project</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Government_position_project    </div>

    <div class="panel-body">
                

        <form action="{{ url('/government_position_projects') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="government_position_id" class="col-sm-3 control-label">Government Position Id</label>
            <div class="col-sm-6">
                <input type="text" name="government_position_id" id="government_position_id" class="form-control" value="{{$model['government_position_id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="project_name" class="col-sm-3 control-label">Project Name</label>
            <div class="col-sm-6">
                <input type="text" name="project_name" id="project_name" class="form-control" value="{{$model['project_name'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="government_project_category_id" class="col-sm-3 control-label">Government Project Category Id</label>
            <div class="col-sm-6">
                <input type="text" name="government_project_category_id" id="government_project_category_id" class="form-control" value="{{$model['government_project_category_id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="project_header" class="col-sm-3 control-label">Project Header</label>
            <div class="col-sm-6">
                <input type="text" name="project_header" id="project_header" class="form-control" value="{{$model['project_header'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="project_description_content" class="col-sm-3 control-label">Project Description Content</label>
            <div class="col-sm-6">
                <input type="text" name="project_description_content" id="project_description_content" class="form-control" value="{{$model['project_description_content'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="image_urls" class="col-sm-3 control-label">Image Urls</label>
            <div class="col-sm-6">
                <input type="text" name="image_urls" id="image_urls" class="form-control" value="{{$model['image_urls'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="inserted_by" class="col-sm-3 control-label">Inserted By</label>
            <div class="col-sm-6">
                <input type="text" name="inserted_by" id="inserted_by" class="form-control" value="{{$model['inserted_by'] or ''}}" readonly="readonly">
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
                <a class="btn btn-default" href="{{ url('/government_position_projects') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection