@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Api_log</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Api_log    </div>

    <div class="panel-body">
                

        <form action="{{ url('/api_logs') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="url" class="col-sm-3 control-label">Url</label>
            <div class="col-sm-6">
                <input type="text" name="url" id="url" class="form-control" value="{{$model['url'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="method" class="col-sm-3 control-label">Method</label>
            <div class="col-sm-6">
                <input type="text" name="method" id="method" class="form-control" value="{{$model['method'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="data_param" class="col-sm-3 control-label">Data Param</label>
            <div class="col-sm-6">
                <input type="text" name="data_param" id="data_param" class="form-control" value="{{$model['data_param'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="response" class="col-sm-3 control-label">Response</label>
            <div class="col-sm-6">
                <input type="text" name="response" id="response" class="form-control" value="{{$model['response'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="created" class="col-sm-3 control-label">Created</label>
            <div class="col-sm-6">
                <input type="text" name="created" id="created" class="form-control" value="{{$model['created'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="modified" class="col-sm-3 control-label">Modified</label>
            <div class="col-sm-6">
                <input type="text" name="modified" id="modified" class="form-control" value="{{$model['modified'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/api_logs') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection