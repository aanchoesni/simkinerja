<div class="form-group">
	{{ Form::label('satuan', 'Nama satuan') }}
	{{ Form::text('satuan', null, array('class' => 'form-control','placeholder'=>'masukkan nama satuan')) }}
</div>
{{ HTML::divider() }}
<div class="box-footer">
	{{Form::submit('SIMPAN', array('class'=>'btn btn-primary'))}}                        
</div>