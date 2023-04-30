@extends('layout.master')
@section('parentPageTitle', 'Tables')
@section('title', 'Manage Roles')


@section('content')



<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Update Roles</h2>
                <ul class="header-dropdown dropdown">

                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

                </ul>
            </div>
            <!-- Begin: life time stats -->
            <div class="body">
                @if(Session::has('errorMsg'))
                <div class="alert alert-danger">{{Session::get('errorMsg')}}</div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                @endif
                @if(Session::has('successMsg'))
                <div class="alert alert-success">{{Session::get('successMsg')}}</div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                @endif
                <form action="{{url('edit-roles/'.$roles->id)}}" name="permission-form" method="post">
                @csrf
                    <div class="table-responsive">
                        <div>
                            <div class="form-group {{(@$errors->any() && $errors->first('name')) ? 'has-error' : ''}}">
                                <label class="control-label">Role Title</label>
                                <input type="text" name="name" placeholder="Enter Role Title"  value="{{old('name',$roles->name)}}" class="form-control">
                                @if ($errors->any() && $errors->first('name'))
                                <span class="help-block">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th>Module Name</th>
                                <th>Access Rights</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($menus)
                                    @foreach($menus as $key => $val)
                                    <tr>
                                        <td colspan="2">
                                            <div class="md-checkbox">
                                                @if(in_array($key, $rm_view))
                                                <label class="switch">
                                                    <input type="checkbox" checked name="master-check[]" id="master-{{$key}}" value="{{$key}}" onclick="mark_child_checkbox({{$key}});" class="md-check">
                                                    <span class="slider round bg-theme"></span>
                                                </label>
                                                @else
                                                <label class="switch">
                                                    <input type="checkbox" name="master-check[]" id="master-{{$key}}" value="{{$key}}" onclick="mark_child_checkbox({{$key}});" class="md-check">
                                                    <span class="slider round bg-theme"></span>
                                                </label>
                                                @endif
                                                <label for="master-{{$key}}">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                <strong>{{$val['name']}}</strong></label>
                                            </div>
                                        </td>
                                    </tr>
                                    @foreach($val['child'] as $child)
                                    <tr>
                                    <td>{{$child->name}}</td>
                                    <td>
                                        <div class="md-checkbox">
                                        @if(in_array($child->id, $rm_view))
                                            <label class="switch">
                                                <input type="checkbox" name="view-check[]" id="view-{{$key}}-{{$child->id}}" class="md-check" value="{{$child->id}}" checked>
                                                <span class="slider round bg-theme"></span>
                                            </label>
                                            @else
                                            <label class="switch">
                                                <input type="checkbox" name="view-check[]" id="view-{{$key}}-{{$child->id}}" class="md-check" value="{{$child->id}}">
                                                <span class="slider round bg-theme"></span>
                                            </label>
                                            @endif
                                            <label for="view-{{$key}}-{{$child->id}}">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span></label>
                                        </div>
                                    </td>
                                    </tr>
                                    @endforeach
                                    @endforeach
                                @else
                                <tr>
                                <td colspan="2">No Records Found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <!-- End: life time stats -->
                        </div>
                        <div class="form-actions right">
                            <a type="button" href="{{ url('list-roles') }}" class="btn btn-default">Back</a>
                            <button type="submit" class="btn btn-primary " data-style="expand-right">
                           Update Role</button>
                        </div>
                </form>
                    </div>
                </div>
            </div>
        </div>

    @stop


    @section('page-script')
<script>
    function deleteUser(id)
    {
        if(confirm('Are you sure you want to delete?'))
        {
            window.location.href="{{url('deleteuser')}}/"+id;
        }
    }

    function mark_child_checkbox(top_menu_id)
    {
        var mastercheckbox=document.getElementById('master-'+top_menu_id);

        var view_arr=document.getElementsByName("view-check[]");
        var view_length=view_arr.length;


        if(mastercheckbox.checked==true)
        {
            for(k=0;k<view_length;k++)
            {
                var vid = view_arr[k].id;
                var chvid = vid.search('-'+top_menu_id+'-');
                if(chvid > 0)
                document.getElementById(vid).checked = true;
            }
        }
        else
        {
            for(k=0;k<view_length;k++)
            {
                var vid = view_arr[k].id;
                var chvid = vid.search('-'+top_menu_id+'-');
                if(chvid > 0)
                document.getElementById(vid).checked = false;
            }
        }

    }
</script>
@stop

