@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('breadcrumb')
	<li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route('admin.jabatan.index') }}">Jabatan</a></li>
    <li class="active">@yield('title')</li>
@stop

@section('content')
<div class="row">
    <div class="col-lg-6">
    	<div class="box box-info">	
        	<div class="box-body">
        	{{ Form::model($jabatan, array('url' => route('admin.jabatan.update', ['jabatans'=>$jabatan->id]), 'method' => 'put')) }}
        		@include('jabatans._form')
        	{{ Form::close() }}
        	</div>
        </div>
    </div>
</div>
@stop