@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Government_official_post</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Government_official_post    </div>

    <div class="panel-body">
                

        <form action="{{ url('/government_official_posts') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="header" class="col-sm-3 control-label">Header</label>
            <div class="col-sm-6">
                <input type="text" name="header" id="header" class="form-control" value="{{$model['header'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="content" class="col-sm-3 control-label">Content</label>
            <div class="col-sm-6">
                <input type="text" name="content" id="content" class="form-control" value="{{$model['content'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="title" class="col-sm-3 control-label">Title</label>
            <div class="col-sm-6">
                <input type="text" name="title" id="title" class="form-control" value="{{$model['title'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="posted_by" class="col-sm-3 control-label">Posted By</label>
            <div class="col-sm-6">
                <input type="text" name="posted_by" id="posted_by" class="form-control" value="{{$model['posted_by'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="government_id" class="col-sm-3 control-label">Government Id</label>
            <div class="col-sm-6">
                <input type="text" name="government_id" id="government_id" class="form-control" value="{{$model['government_id'] or ''}}" readonly="readonly">
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
                <a class="btn btn-default" href="{{ url('/government_official_posts') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection