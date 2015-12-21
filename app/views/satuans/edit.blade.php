@extends('layouts.master')

@section('title')
    {{ $title }}
@stop

@section('breadcrumb')
    <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route('admin.satuan.index') }}">Satuan</a></li>
    <li class="active">@yield('title')</li>
@stop

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="box box-info">  
            <div class="box-body">
            {{ Form::model($satuan, array('url' => route('admin.satuan.update', ['satuans'=>$satuan->id]), 'method' => 'put')) }}
                @include('satuans._form')
            {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop