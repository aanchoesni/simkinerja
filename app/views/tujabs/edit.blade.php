@extends('layouts.master')

@section('asset')
    {{HTML::style("assets/css/select2-bootstrap.css")}} 
    <link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
@stop

@section('title')
	{{ $title }}
@stop

@section('breadcrumb')
	<li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route('admin.tujab.index') }}">Tugas Jabatan</a></li>
    <li class="active">@yield('title')</li>
@stop

@section('content')
<div class="row">
    <div class="col-lg-6">
    	<div class="box box-info">	
        	<div class="box-body">
        	{{ Form::model($tujab, array('url' => route('admin.tujab.update', ['tujabs'=>$tujab->id]), 'method' => 'put'))}}
        		@include('tujabs._form')
        	{{ Form::close() }}
        	</div>
        </div>
    </div>
</div>
@stop

@section('script')
<script src="{{ asset('packages/select2/select2.min.js')}}"></script>
<script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() { $("#unitkerja_id").select2(); });
    $(document).ready(function() { $("#unit_id").select2(); });
    $(document).ready(function() { $("#jabatan_id").select2(); });
</script>
@stop