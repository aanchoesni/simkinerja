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
            $("#kerja").dataTable();
            $("#kerjasemua").dataTable();
            $("#kerjaper").dataTable();
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
@stop

@section('title')
	{{ $title }}
@stop

@section('title-button')
    {{ HTML::buttonAdd() }}
@stop

@section('breadcrumb')
    <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">@yield('title')</li>
@stop

@section('content')
	<div class="row">
        <div class="col-xs-12">                            
            <div class="box">
                <!-- Custom Tabs -->
                <div class="box-body table-responsive">
                    <table id="kerja" class="table table-bordered table-hover">
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
                            @foreach($kinerjas as $value)
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
            {{-- <button class="btn btn-primary">Download</button> --}}
            {{-- <a class="btn btn-primary" href="{{ route('laporanhariini') }}">Download</a> --}}
        </div>
    </div>
@stop