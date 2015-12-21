@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('breadcrumb')
	<li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route('admin.unit.index') }}">Unit</a></li>
    <li class="active">@yield('title')</li>
@stop

@section('content')
<div class="row">
    <div class="col-lg-6">
    	<div class="box box-info">	
        	<div class="box-body">
        	{{ Form::model($unit, array('url' => route('admin.unit.update', ['units'=>$unit->id]), 'method' => 'put')) }}
        		@include('units._form')
        	{{ Form::close() }}
        	</div>
        </div>
    </div>
</div>
@stop