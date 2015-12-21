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
                    {{ Form::open(array('url' => route('kerjaper'), 'method' => 'get')) }}
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <input type="text" id="tglawal" name="tglawal" placeholder="Tanggal Awal" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1">
                        <div class="form-group">
                            <center><label>sampai</label></center>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <input type="text" id="tglakhir" name="tglakhir" placeholder="Tanggal Akhir" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-info" id="cari">Cari</button>
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
                            @foreach($kinerjapers as $value)
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
            {{ Form::open(array('url' => route('laporanperfilter'), 'method' => 'get')) }}
                <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <input type="text" id="ltglawal" name="ltglawal" placeholder="Tanggal Awal" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1">
                        <div class="form-group">
                            <center><label>sampai</label></center>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <input type="text" id="ltglakhir" name="ltglakhir" placeholder="Tanggal Akhir" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-info" id="cari">Download</button>
                        </div>
                    </div>
            {{ Form::close() }}
        </div>
    </div>
@stop