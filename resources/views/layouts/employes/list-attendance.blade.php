@extends('layout.master')
@section('parentPageTitle', 'Tables')
@section('title', 'Manage Attendance')


@section('content')



<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Attendance List</h2>
                <ul class="header-dropdown dropdown">
<li>        @if(in_array('add-attendance', $rights_array))
    <a href="{{url('add-attendance')}}" class="btn btn-primary theme-bg btn-round plain text-white"><i class="fa fa-plus"></i></a>
    @endif</li>
                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

                </ul>
            </div>
            <div class="body">
                @if(Session::has('errorMsg'))
                <div class="alert alert-danger alert-dismissible fade show">{{Session::get('errorMsg')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </div>
                
            @endif
            @if(Session::has('successMsg'))
         
            <div class="alert alert-success alert-dismissible fade show">{{Session::get('successMsg')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </div>
            @endif
                <div class="table-responsive">
                    <table class="table table-striped table-hover dataTable js-last-exportable" id="a-table">
                        <thead>
                            <tr>
                                <th width="5%" >#</th>
                                <th width="1%"></th>
                              
                                <th>Employee Name</th>
                                <th>Attendance Type</th>
                                <th>Date</th>
                                <th>Time</th>
                               
                                <th>Created By</th>
                                {{-- <th width="10%">Action</th> --}}
                        </thead>

                        <tbody>
                            @if($attendances)
                            <?php $index=1; ?>
                            @foreach($attendances as $attendance)
                            <tr>
                                <td>{{ $index++}}</td>
                                <td class="pr-1 pl-1">   

                                    <div class="btn-group float-right" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn rounded-circle "   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa  fa-ellipsis-v icon-sizes"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                        @if(in_array('edit-attendance', $rights_array))
                                        <a href="{{url('edit-attendance/'.$attendance->id)}}" class="dropdown-item "><i class="fa fa-edit"></i> Edit </a>
                                        @endif
                                        @if(in_array('delete-attendance', $rights_array))
                                        <a href="javascript:;" onclick="deleteleave({{$attendance->id}});" class="dropdown-item" >
                                        <i class="fa fa-trash-o"></i> Delete </a>
                                        @endif
                                        </div>
                                    </div>

                                </td>
                           
                                <td>{{$attendance->employee_name}}</td>
                                <td>{{$attendance->attendance_type}}</td>
                                <td>{{$attendance->attendance_date}}</td>
                                <td>{{$attendance->attendance_time}}</td>
                              
                                <td>{{$attendance->name}}</td>
                                {{-- <td>@if(in_array('edit-employees', $rights_array))<a href="{{url('edit-employees/'.$employee->id)}}" class="btn btn-outline btn-circle btn-sm purple"><i class="fa fa-edit"></i> Edit </a>&nbsp;&nbsp;@endif @if(in_array('edit-roles-employees', $rights_array))<a href="{{url('edit-roles-employees/'.$employee->id)}}" class="btn btn-outline btn-circle btn-sm green"><i class="fa fa-edit"></i> View/Edit Rights </a>&nbsp;&nbsp;@endif @if(in_array('delete-employees', $rights_array))<a href="javascript:;" onclick="deleteemployee({{$employee->id}});" class="btn btn-outline btn-circle dark btn-sm black">
                                                <i class="fa fa-trash-o"></i> Delete </a>@endif</td>
                                </tr> --}}
                                {{-- <td class="float-right">
                                   
                                   
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-primary rounded-circle "   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa  fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                        @if(in_array('edit-leave/', $rights_array))
                                        <a href="{{url('edit-leave/'.$leave->id)}}" class="dropdown-item "><i class="fa fa-edit"></i> Edit </a>
                                        @endif
                                        @if(in_array('delete-leave/', $rights_array))
                                        <a href="javascript:;" onclick="deleteleave({{$leave->id}});" class="dropdown-item" >
                                        <i class="fa fa-trash-o"></i> Delete </a>
                                        @endif
                                        </div>
                                    </div>
                                </td> --}}
                            </tr>
                            @endforeach
                        @else
                        <tr>
                        <td colspan="5">No Records Found</td>
                        </tr>
                        @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}">
@stop
@section('vendor-script')
<script>
    function deleteleave(id)
        {
            if(confirm('Are you sure you want to delete?'))
            {
                window.location.href="{{url('delete-attendance')}}/"+id;
            }
        }

</script>
<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
@stop

@section('page-script')
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
@stop

