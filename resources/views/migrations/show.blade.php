@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Migration</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Migration    </div>

    <div class="panel-body">
                

        <form action="{{ url('/migrations') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="migration" class="col-sm-3 control-label">Migration</label>
            <div class="col-sm-6">
                <input type="text" name="migration" id="migration" class="form-control" value="{{$model['migration'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="batch" class="col-sm-3 control-label">Batch</label>
            <div class="col-sm-6">
                <input type="text" name="batch" id="batch" class="form-control" value="{{$model['batch'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/migrations') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection