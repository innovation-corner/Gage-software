@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">{{ ucfirst('government_position_policies') }}</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        List of {{ ucfirst('government_position_policies') }}
    </div>

    <div class="panel-body">
        <div class="">
            <table class="table table-striped" id="thegrid">
              <thead>
                <tr>
                                        <th>Id</th>
                                        <th>Government Position Id</th>
                                        <th>Policy Name</th>
                                        <th>Government Policy Category Id</th>
                                        <th>Year</th>
                                        <th>Policy Header</th>
                                        <th>Policy Description Content</th>
                                        <th>Image Urls</th>
                                        <th>Inserted By</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Deleted At</th>
                                        <th style="width:50px"></th>
                    <th style="width:50px"></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
        <a href="{{url('government_position_policies/create')}}" class="btn btn-primary" role="button">Add government_position_policy</a>
    </div>
</div>




@endsection



@section('scripts')
    <script type="text/javascript">
        var theGrid = null;
        $(document).ready(function(){
            theGrid = $('#thegrid').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                "responsive": true,
                "ajax": "{{url('government_position_policies/grid')}}",
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/government_position_policies') }}/'+row[0]+'">'+data+'</a>';
                        },
                        "targets": 1
                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/government_position_policies') }}/'+row[0]+'/edit" class="btn btn-default">Update</a>';
                        },
                        "targets": 12                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="#" onclick="return doDelete('+row[0]+')" class="btn btn-danger">Delete</a>';
                        },
                        "targets": 12+1
                    },
                ]
            });
        });
        function doDelete(id) {
            if(confirm('You really want to delete this record?')) {
               $.ajax({ url: '{{ url('/government_position_policies') }}/' + id, type: 'DELETE'}).success(function() {
                theGrid.ajax.reload();
               });
            }
            return false;
        }
    </script>
@endsection