@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('breadcrumb')
	<li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route('admin.template.index') }}">Template</a></li>
    <li class="active">@yield('title')</li>
@stop

@section('content')
<div class="row">
    <div class="col-lg-6">
    	<div class="box box-info">	
        	<div class="box-body">
        	{{ Form::model($template, array('url' => route('admin.template.update', ['templates'=>$template->id]), 'method' => 'put')) }}
        		@include('templates._form')
        	{{ Form::close() }}
        	</div>
        </div>
    </div>
</div>
@stop