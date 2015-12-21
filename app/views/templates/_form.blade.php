<div class="form-group">
	{{ Form::label('nama', 'Nama Template') }}
	{{ Form::text('nama', null, array('class' => 'form-control','placeholder'=>'masukkan nama template')) }}
</div>
<div class="form-group">
    <label for="file">Upload File</label>
    {{ Form::file('files') }}
    <p class="help-block">Upload file template.</p>
</div>
{{ HTML::divider() }}
<div class="box-footer">
	{{Form::submit('SIMPAN', array('class'=>'btn btn-primary'))}}                        
</div>