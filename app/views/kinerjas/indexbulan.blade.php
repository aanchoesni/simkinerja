@extends('layouts.master')

@section('asset')
<!-- Table -->
{{HTML::style("assets/css/datatables/dataTables.bootstrap.css")}}
<link rel="stylesheet" type="text/css" href="assets/css/datepicker/datepicker3.css">
@stop

@section('script')
	<!-- DATA TABES SCRIPT -->
    {{HTML::script('assets/js/plugins/datatables/jquery.dataTables.js')}}
    {{HTML::script('assets/js/plugins/datatables/dataTables.bootstrap.js')}}
    <script src="assets/js/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- page script -->
    <script type="text/javascript">
        $(function() {
            $('#tglawal').datepicker({format: 'yyyy-mm-dd',autoClose:true});
            $('#tglakhir').datepicker({format: 'yyyy-mm-dd',autoClose:true});
            $('#ltglawal').datepicker({format: 'yyyy-mm-dd',autoClose:true});
            $('#ltglakhir').datepicker({format: 'yyyy-mm-dd',autoClose:true});

            $("#kerjapers").dataTable();            
        });
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
            <div class="box">
                <div class="box-body table-responsive">
                <div class="row">
                    {{ Form::open(array('url' => route('kerjabulan'), 'method' => 'get')) }}
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                            {{ Form::select('bulan', array(''=>'',
                                                        '01'=>'Januari',
                                                        '02'=>'Februari',
                                                        '03'=>'Maret',
                                                        '04'=>'April',
                                                        '05'=>'Mei',
                                                        '06'=>'Juni',
                                                        '07'=>'Juli',
                                                        '08'=>'Agustus',
                                                        '09'=>'September',
                                                        '10'=>'Oktober',
                                                        '11'=>'November',
                                                        '12'=>'Desember'), 
                                                            null, array(
                                                                'id'=>'bulan',
                                                                'placeholder' => "Pilih Prodi",                
                                                                'class'=>'select2-container form-control input-sm select2 select2-container-active')) }}
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-12">
                        <div class="form-group">
                            {{ Form::selectrange('tahun',2015,2020,2015,array('id'=>'tahun','class'=>'select2-container form-control input-sm select2 select2-container-active'))}}
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-6 col-xs-12">
                        <div class="form-group">
                            {{Form::submit('Cari', array('class'=>'btn btn-primary'))}}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                <div class="row">
                    {{ Form::open(array('url' => route('laporanbulan'), 'method' => 'get')) }}
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                            {{ Form::select('bulan', array(''=>'',
                                                        '01'=>'Januari',
                                                        '02'=>'Februari',
                                                        '03'=>'Maret',
                                                        '04'=>'April',
                                                        '05'=>'Mei',
                                                        '06'=>'Juni',
                                                        '07'=>'Juli',
                                                        '08'=>'Agustus',
                                                        '09'=>'September',
                                                        '10'=>'Oktober',
                                                        '11'=>'November',
                                                        '12'=>'Desember'), 
                                                            null, array(
                                                                'id'=>'bulan',
                                                                'placeholder' => "Pilih Prodi",                
                                                                'class'=>'select2-container form-control input-sm select2 select2-container-active')) }}
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-12">
                        <div class="form-group">
                            {{ Form::selectrange('tahun',2015,2020,2015,array('id'=>'tahun','class'=>'select2-container form-control input-sm select2 select2-container-active'))}}
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-6 col-xs-12">
                        <div class="form-group">
                            {{Form::submit('Download', array('class'=>'btn btn-primary'))}}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                <br>
                    <table id="kerjapers" class="table table-bordered table-hover">
                        <thead>
                        <tr>                            
                            <th>Unit</th>
                            <th>Pilihan Tugas</th>
                            <th>Hasil Kerja</th>
                            <th>Volume</th>
                            <th>Satuan</th>
                            <th>Validasi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($kinerjabulans as $value)
                            <tr>                                
                                <td>{{{ $value->unit }}}</td>
                                <td>{{{ $value->tujab }}}</td>
                                <td>{{{ $value->keterangan }}}</td>
                                <td>{{{ $value->qty }}}</td>
                                <td>{{{ $value->satuan }}}</td>
                                <td style='text-align:center;'>@if($value->validation==1)
                                        <i class='fa fa-check'></i>
                                        @elseif($value->validation==0)
                                            <i class='fa fa-times'></i>
                                    @endif
                                </td>
                            </tr>
                            @endforeach    
                        </tbody>
                        <tfoot>
                        <tr>                            
                            <th>Unit</th>
                            <th>Pilihan Tugas</th>
                            <th>Hasil Kerja</th>
                            <th>Volume</th>
                            <th>Satuan</th>
                            <th>Validasi</th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
@stop