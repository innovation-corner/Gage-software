@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">{{ ucfirst('government_staff_office_purs') }}</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        List of {{ ucfirst('government_staff_office_purs') }}
    </div>

    <div class="panel-body">
        <div class="">
            <table class="table table-striped" id="thegrid">
              <thead>
                <tr>
                                        <th>Id</th>
                                        <th>Pur User Id</th>
                                        <th>Rating Id</th>
                                        <th>Remark</th>
                                        <th>Government Staff Office Id</th>
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
        <a href="{{url('government_staff_office_purs/create')}}" class="btn btn-primary" role="button">Add government_staff_office_pur</a>
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
                "ajax": "{{url('government_staff_office_purs/grid')}}",
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/government_staff_office_purs') }}/'+row[0]+'">'+data+'</a>';
                        },
                        "targets": 1
                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/government_staff_office_purs') }}/'+row[0]+'/edit" class="btn btn-default">Update</a>';
                        },
                        "targets": 8                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="#" onclick="return doDelete('+row[0]+')" class="btn btn-danger">Delete</a>';
                        },
                        "targets": 8+1
                    },
                ]
            });
        });
        function doDelete(id) {
            if(confirm('You really want to delete this record?')) {
               $.ajax({ url: '{{ url('/government_staff_office_purs') }}/' + id, type: 'DELETE'}).success(function() {
                theGrid.ajax.reload();
               });
            }
            return false;
        }
    </script>
@endsection