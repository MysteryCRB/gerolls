@extends('layout.master')
@section('parentPageTitle', 'Dashboard')
@section('title', 'Index')


@section('content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <h1>Hi, Welcome to GeRoll!</h1>
                <span>
                    This project was made by:<ul>
    <li>Almendo Gabriel Tetelepta (001202200002)</li>
    <li>Erlangga Fauzan Rezagani (001202200080)</li>
    <li>Nurul Aulia Halim (001202200103)</li>
    <li>Rayhan Maulana Rahman (001202200120)</li>
    <li>Safira Zahrotul Ilmi (001202200039)</li>
    <li>Shafira Aulia (001202200170)</li>
  </ul>

@if($attendance_in == false)
<div class="card">
    <div class="card-body">
        <form method="post">
            @csrf
            <div class="alert alert-info">Please click button below to attendance</div>
            <button type="submit" class="btn btn-primary">Attend In</button>
        </form>
    </div>
</div>
@endif

@if($attendance_in == true && $attendance_out == false)
<div class="card">
    <div class="card-body">
        <form method="post">
            @csrf
            <div class="alert alert-info">Please click button below to attendance</div>
            <button type="submit" class="btn btn-primary">Attend Out</button>
        </form>
    </div>
</div>
@endif
                </span>
            </div>
          
        </div>
    </div>
    
   

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/c3/c3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jvectormap/jquery-jvectormap-2.0.3.css') }}">
@stop

@section('vendor-script')
<script src="{{ asset('assets/bundles/flotscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/apexcharts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/jvectormap.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/toastr/toastr.js') }}"></script>

@stop

@section('page-script')

<script src="{{ asset('assets/js/index.js') }}"></script>
<script src="{{ asset('assets/js/pages/charts/c3.js') }}"></script>
<script src="{{ asset('assets/js/pages/charts/apex.js') }}"></script>
@stop
