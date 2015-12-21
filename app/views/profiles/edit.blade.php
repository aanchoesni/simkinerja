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
    <li class="active">@yield('title')</li>
@stop

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="box box-info">  
            <div class="box-body">
            {{ Form::model($user, array('url' => route('profile.update', ['profiles'=>$user->id]), 'method' => 'put'))}}
                @include('profiles._formedit')
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
    $(document).ready(function() { $("#unit_kerja").select2(); });
    $(document).ready(function() { $("#unit").select2(); });
    $(document).ready(function() { $("#jabatan").select2(); });
</script>
@stop