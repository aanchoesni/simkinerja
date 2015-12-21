<div class="form-group">
	{{ Form::label('unitkerja_id', 'Unit Kerja') }}
	{{ Form::select('unitkerja_id', array(''=>'')+Unitkerja::lists('nama','id'), null, array(
				'id'=>'unitkerja_id',
				'placeholder' => "Pilih Unit Kerja",				
				'class'=>'select2-container form-control input-sm select2 select2-container-active')) }}
</div>
<div class="form-group">
	{{ Form::label('unit_id', 'Unit') }}
	{{ Form::select('unit_id', array(''=>'')+Unit::lists('nama','id'), null, array(
				'id'=>'unit_id',
				'placeholder' => "Pilih Unit",
				'class'=>'form-control input-sm')) }}
</div>
<div class="form-group">
	{{ Form::label('jabatan_id', 'Jabatan') }}
	{{ Form::select('jabatan_id', array(''=>'')+Jabatan::lists('nama','id'), null, array(
				'id'=>'jabatan_id',
				'placeholder' => "Pilih jabatan",
				'class'=>'form-control input-sm')) }}
</div>
<div class="form-group">
	{{ Form::label('tujab', 'Tugas Jabatan') }}
	{{ Form::textarea('tujab',null,array('class'=>'form-control', 'style'=>'height:100px; resize:none'))}}	
</div>
{{ HTML::divider() }}
<div class="box-footer">
	{{Form::submit('SIMPAN', array('class'=>'btn btn-primary'))}}                        
</div>