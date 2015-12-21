@extends('layouts.master')

@section('asset')
<!-- Table -->
{{HTML::style("assets/css/datatables/dataTables.bootstrap.css")}}
@stop

@section('script')
	<!-- DATA TABES SCRIPT -->
    {{HTML::script('assets/js/plugins/datatables/jquery.dataTables.js')}}
    {{HTML::script('assets/js/plugins/datatables/dataTables.bootstrap.js')}}
    <!-- page script -->
    <script type="text/javascript">
        $(function() {
            $("#tujab").dataTable();
        });
    </script>
@stop

@section('title')
	{{ $title }}
@stop

@section('title-button')
    <p>{{ HTML::buttonAdd() }}</p>
@stop

@section('breadcrumb')
    {{-- <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">@yield('title')</li> --}}
@stop

@section('content')
	<div class="row">
        <div class="col-xs-12">                            
            <div class="box">               
                <div class="box-body table-responsive">
                    <div class="row">
                        {{ Form::open(array('url' => route('admin.tujab.peruniti'), 'method' => 'get')) }}
                            <div class="col-md-5 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    {{ Form::label('unit_id', 'Pencarian berdasarkan unit dan jabatan') }}
                                    {{ Form::select('unit_id', array(''=>'')+Unit::lists('nama','nama'), null, array(
                                                'id'=>'unit_id',
                                                'placeholder' => "Pilih Unit",
                                                'class'=>'form-control input-sm')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::select('jabatan_id', array(''=>'')+Jabatan::lists('nama','nama'), null, array(
                                                'id'=>'jabatan_id',
                                                'placeholder' => "Pilih jabatan",
                                                'class'=>'form-control input-sm',
                                                'onChange'=>'this.form.submit()')) }}
                                </div>
                            </div>
                            
                        {{ Form::close() }}
                    </div>
                    <table id="tujab" class="table table-bordered table-hover">
                        <thead>
                        <tr>                            
                            <th>Nama Tugas Jabatan</th>
                            <th>Unit Kerja</th>
                            <th>Jabatan</th>
                            <th>Sub Unit</th>
                            <th width="146">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tujabs as $value)
                            <tr>                                
                                <td>{{{ $value->tujab }}}</td>
                                <td>{{{ $value->unitkerja }}}</td>
                                <td>{{{ $value->jabatan }}}</td>
                                <td>{{{ $value->unit }}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.tujab.edit', ['tujabs'=>$value->id]) }}" class="btn btn-primary">Ubah</a>
                                        {{ Form::open(array('url'=>route('admin.tujab.destroy',['tujabs'=>$value->id]),'method'=>'delete', 'class'=>'col-md-1')) }}
                                        {{ FOrm::submit('Hapus', array('class'=>'btn btn-danger')) }}
                                        {{ Form::close() }}
                                    </div>
                                </td>
                            </tr>
                            @endforeach    
                        </tbody>
                        <tfoot>
                            <tr>                            
                            <th>Tugas Jabatan</th>                            
                            <th>Unit Kerja</th>
                            <th>Jabatan</th>
                            <th>Unit</th>
                            <th width="146">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
@stop