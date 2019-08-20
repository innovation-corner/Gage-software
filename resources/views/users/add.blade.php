@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">User</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Add/Modify User    </div>

    <div class="panel-body">
                
        <form action="{{ url('/users'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
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
                <label for="name" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="name" class="form-control" value="{{$model['name'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" name="email" id="email" class="form-control" value="{{$model['email'] or ''}}">
                </div>
            </div>
                                                                                                            <div class="form-group">
                <label for="user_type_id" class="col-sm-3 control-label">User Type Id</label>
                <div class="col-sm-2">
                    <input type="number" name="user_type_id" id="user_type_id" class="form-control" value="{{$model['user_type_id'] or ''}}">
                </div>
            </div>
                                                                                                                        <div class="form-group">
                <label for="email_verified_at" class="col-sm-3 control-label">Email Verified At</label>
                <div class="col-sm-6">
                    <input type="text" name="email_verified_at" id="email_verified_at" class="form-control" value="{{$model['email_verified_at'] or ''}}">
                </div>
            </div>
                                                            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="text" name="password" id="password" class="form-control" value="{{$model['password'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="remember_token" class="col-sm-3 control-label">Remember Token</label>
                <div class="col-sm-6">
                    <input type="text" name="remember_token" id="remember_token" class="form-control" value="{{$model['remember_token'] or ''}}">
                </div>
            </div>
                                                                                                                                    <div class="form-group">
                <label for="created_at" class="col-sm-3 control-label">Created At</label>
                <div class="col-sm-6">
                    <input type="text" name="created_at" id="created_at" class="form-control" value="{{$model['created_at'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="updated_at" class="col-sm-3 control-label">Updated At</label>
                <div class="col-sm-6">
                    <input type="text" name="updated_at" id="updated_at" class="form-control" value="{{$model['updated_at'] or ''}}">
                </div>
            </div>
                        
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button> 
                    <a class="btn btn-default" href="{{ url('/users') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection