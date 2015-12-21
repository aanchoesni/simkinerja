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
            $("#template").dataTable();
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
					<table id="template" class="table table-bordered table-hover">
						<thead>
                        <tr>                            
                            <th width="30">No</th>
                            <th>Nama Template</th>
                            <th width="100" style="text-align:center;">Download</th>
                            <th width="30" style="text-align:center;">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($templates as $value)
                            <tr>                                
                                <td style="text-align:center;"><?php echo $no ?></td>
                                <td>{{{ $value->nama }}}</td>
                                <td>
                                    <div class="btn-group">
                                        {{ Form::open(array('url'=>route('downloadtemplate',[$value->file]),'method'=>'get', 'class'=>'col-md-1')) }}
                                        {{ Form::submit('Download', array('class'=>'btn btn-success')) }}
                                        {{ Form::close() }}
                                    </div>
                                </td>
                                <td style="text-align:center;">
                                    <div class="btn-group">
                                        {{ Form::open(array('url'=>route('admin.template.destroy',['templates'=>$value->id]),'method'=>'delete', 'class'=>'col-md-1')) }}
                                        {{ Form::submit('Hapus', array('class'=>'btn btn-danger')) }}
                                        {{ Form::close() }}
                                    </div>
                                </td>
                                <?php $no++; ?>
                            </tr>
                            @endforeach   
                        </tbody>
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>
@stop