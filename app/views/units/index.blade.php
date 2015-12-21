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
            $("#unit").dataTable();
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
				<div class="box-body table-responsive">
					<table id="unit" class="table table-bordered table-hover">
						<thead>
                        <tr>                            
                            <th>Nama Sub Unit</th>
                            <th width="146">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($units as $value)
                            <tr>                                
                                <td>{{{ $value->nama }}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.unit.edit', ['units'=>$value->id]) }}" class="btn btn-primary">Ubah</a>
                                        {{ Form::open(array('url'=>route('admin.unit.destroy',['units'=>$value->id]),'method'=>'delete', 'class'=>'col-md-1')) }}
                                        {{ FOrm::submit('Hapus', array('class'=>'btn btn-danger')) }}
                                        {{ Form::close() }}
                                    </div>
                                </td>
                            </tr>
                            @endforeach   
                        </tbody>
                        <tfoot>
                            <tr>                            
                            <th>Nama Unit</th>
                            <th width="146">Aksi</th>
                            </tr>
                        </tfoot>
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>
@stop