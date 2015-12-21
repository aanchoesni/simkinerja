@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('breadcrumb')
	<li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route('admin.unitkerja.index') }}">Unit Kerja</a></li>
    <li class="active">@yield('title')</li>
@stop

@section('content')
<div class="row">
    <div class="col-lg-6">
    	<div class="box box-info">	
        	<div class="box-body">
        	{{ Form::model($unitkerja, array('url' => route('admin.unitkerja.update', ['unitkerjas'=>$unitkerja->id]), 'method' => 'put')) }}
        		@include('unitkerjas._form')
        	{{ Form::close() }}
        	</div>
        </div>
    </div>
</div>
@stop