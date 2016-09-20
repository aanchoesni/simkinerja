@extends('layouts.master')

@section('asset')
<!-- Table -->
{{HTML::style("assets/css/datatables/dataTables.bootstrap.css")}}
{{HTML::style("assets/css/select2-bootstrap.css")}}
<link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
@stop

@section('script')
	<!-- DATA TABES SCRIPT -->
    {{HTML::script('assets/js/plugins/datatables/jquery.dataTables.js')}}
    {{HTML::script('assets/js/plugins/datatables/dataTables.bootstrap.js')}}
    <!-- page script -->
    <script type="text/javascript">
        $(function() {
            $("#kerja").dataTable();
            $('#example2').dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false
           	});
        });
    </script>
    <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
    <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() { $("#person").select2(); });
    </script>
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
        <div class="col-xs-12">
            <div class="box" style:"overflow: scroll;">
                <div class="box-body table-responsive">
                <div class="row">
                    {{ Form::open(array('url' => route('person'), 'method' => 'get')) }}
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                            {{ Form::select('person', array(''=>'')+DB::table('users')->lists('first_name','first_name'), null, array(
                                    'id'=>'person',
                                    'placeholder' => "Pilih Orang",
                                    'class'=>'form-control input-sm')) }}
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-info" id="cari">Cari</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                <div class="row">
                    {{ Form::open(array('url' => route('cekstatus'), 'method' => 'get')) }}
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                            {{ Form::select('status', array('1'=>'Tervalidasi', '0'=>'Belum Tervalidasi'), null, array(
                                'id'=>'tujab_id',
                                'placeholder' => "Pilih Tujab",
                                'class'=>'form-control input-sm')) }}
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-info" id="cari">Cari</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                    <table id="kerja" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Nama Depan</th>
                            <th>Unit</th>
                            <th>Pilihan Tugas</th>
                            <th>Hasil Kerja</th>
                            <th>Volume Kerja</th>
                            <th>Satuan</th>
                            <th>File</th>
                            <th>Validasi</th>
                            <th width="146">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($kerjas as $value)
                            <tr>
                                <td>{{{ $value->first_name }}}</td>
                                <td>{{{ $value->unit }}}</td>
                                <td>{{{ $value->tujab }}}</td>
                                <td>{{{ $value->keterangan }}}</td>
                                <td>{{{ $value->qty }}}</td>
                                <td>{{{ $value->satuan }}}</td>
                                <td style='text-align:center;'>
                                    @if ($value->file)
                                    <div class="btn-group">
                                        {{ Form::open(array('url'=>route('download',[$value->file]),'method'=>'get', 'class'=>'col-md-1')) }}
                                        {{ Form::submit('Download', array('class'=>'btn btn-success')) }}
                                        {{ Form::close() }}
                                    </div>
                                    @endif
                                </td>
                                {{-- <td><a href="{{ route('download', ['$data'=>$value->file]}}">{{{ $value->file }}}</a></td> --}}

                                <td style='text-align:center;'>@if($value->validation==1)
                                        <i class='fa fa-check'></i>
                                        @elseif($value->validation==0)
                                            <i class='fa fa-times'></i>
                                    @endif
                                </td>
                                <td style='text-align:center;'>
                                    @if ($value->validation==0)
                                    <div class="btn-group">
                                        {{ Form::open(array('url'=>route('admin.kerja.validasi',['tujab_user'=>$value->id]),'method'=>'put', 'class'=>'col-md-1')) }}
                                        {{ FOrm::submit('Validasi', array('class'=>'btn btn-success')) }}
                                        {{ Form::close() }}
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        {{ Form::open(array('url'=>route('admin.kerja.notvalidasi',['tujab_user'=>$value->id]),'method'=>'put', 'class'=>'col-md-1')) }}
                                        {{ FOrm::submit('Not Validasi', array('class'=>'btn btn-danger')) }}
                                        {{ Form::close() }}
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Nama Depan</th>
                            <th>Unit</th>
                            <th>Pilihan Tugas</th>
                            <th>Hasil Kerja</th>
                            <th>Volume Kerja</th>
                            <th>Satuan</th>
                            <th>File</th>
                            <th>Validasi</th>
                            <th width="146">Aksi</th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
@stop
