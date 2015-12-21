@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('breadcrumb')
	<li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">@yield('title')</li>
@stop

@section('content')
<div class="row">
    <div class="col-lg-6">
    	<div class="box box-info">	
        	<div class="box-body">
        	{{ Form::open(array('url' => route('home.updatepassword'), 'method' => 'post')) }}
                <div class="form-group">
                    {{ Form::label('oldpassword', 'Password Lama') }}
                    {{ Form::password('oldpassword', array('class' => 'form-control','placeholder'=>'**********')) }}
                </div>
        		<div class="form-group">
                    {{ Form::label('newpassword', 'Password Baru') }}
                    {{ Form::password('newpassword', array('class' => 'form-control','placeholder'=>'**********')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('newpassword_confirmation', 'Konfirmasi Password') }}
                    {{ Form::password('newpassword_confirmation', array('class' => 'form-control','placeholder'=>'**********')) }}
                </div>
                <div class="box-footer">
                    {{Form::submit('SIMPAN', array('class'=>'btn btn-primary'))}}                        
                </div>
        	{{ Form::close() }}
        	</div>
        </div>
    </div>
</div>
@stop