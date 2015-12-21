<div class="form-group">
	{{ Form::label('nama', 'Nama jabatan') }}
	{{ Form::text('nama', null, array('class' => 'form-control','placeholder'=>'masukkan nama jabatan')) }}
</div>
{{ HTML::divider() }}
<div class="box-footer">
	{{Form::submit('SIMPAN', array('class'=>'btn btn-primary'))}}                        
</div>