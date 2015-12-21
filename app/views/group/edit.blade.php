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
            {{ Form::model($groupbyid, array('url' => route('admin.group.update', ['groupbyid'=>$groupbyid->id]), 'method' => 'put')) }}
        		<div class="form-group">
                {{ Form::label('group', 'Group') }}
                {{ Form::text('name', null, array('class' => 'form-control','placeholder'=>'masukkan group')) }}
                {{ '<div>'.$errors->first('group').'</div>' }}
            </div>

            <div class="form-group">
                {{ Form::label('hakakses', 'Hak Akses') }} :
                <label class="checkbox-inline">
                {{Form::checkbox('cb[admin]', '1', (!empty($perm['admin']) == 1 ? true : false))}} Admin
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[kepala]', '1', (!empty($perm['kepala']) == 1 ? true : false))}} Kepala
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[staff]', '1', (!empty($perm['staff']) == 1 ? true : false))}} Staff
                </label>
            </div>
             
            <!--div class="form-group">
                {{ Form::label('user', 'User') }} :
                <label class="checkbox-inline">
                {{Form::checkbox('cb[user.read]', '1')}} Read
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[user.create]', '1')}} Create
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[user.update]', '1')}} Update
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[user.destroy]', '1')}} Destroy
                </label>
            </div>
            <div class="form-group">
                {{ Form::label('crud', 'CRUD Query Builder') }} :
                <label class="checkbox-inline">
                {{Form::checkbox('cb[cqb.read]', '1')}} Read
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[cqb.create]', '1')}} Create
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[cqb.update]', '1')}} Update
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[cqb.destroy]', '1')}} Destroy
                </label>
             
            </div>
            <div class="form-group">
                {{ Form::label('crud', 'CRUD Eloquent ORM') }} :
                <label class="checkbox-inline">
                {{Form::checkbox('cb[ceo.read]', '1')}} Read
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[ceo.create]', '1')}} Create
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[ceo.update]', '1')}} Update
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[ceo.destroy]', '1')}} Destroy
                </label>
            </div-->
            {{Form::submit('SIMPAN', array('class'=>'btn btn-primary'))}}
        	{{ Form::close() }}
        	</div>
        </div>
    </div>
</div>
@stop