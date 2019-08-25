@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Password_reset</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Password_reset    </div>

    <div class="panel-body">
                

        <form action="{{ url('/password_resets') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-6">
                <input type="text" name="email" id="email" class="form-control" value="{{$model['email'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="token" class="col-sm-3 control-label">Token</label>
            <div class="col-sm-6">
                <input type="text" name="token" id="token" class="form-control" value="{{$model['token'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="created_at" class="col-sm-3 control-label">Created At</label>
            <div class="col-sm-6">
                <input type="text" name="created_at" id="created_at" class="form-control" value="{{$model['created_at'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/password_resets') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection