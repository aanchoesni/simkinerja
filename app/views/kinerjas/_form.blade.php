<div class="form-group">
	{{ Form::label('nama', 'Nama') }}
	{{ Form::text('nama',$nama=Sentry::getUser()->first_name. ' ' . Sentry::getUser()->last_name, array('class' => 'form-control','disabled')) }}
</div>
<div class="form-group">
	{{ Form::label('tujab_id', 'Pilihan Kerja') }}
	{{ Form::select('tujab_id', array(''=>'')+Tujab::where('unit_id','=',Sentry::getUser()->unit)->where('jabatan_id','=',Sentry::getUser()->jabatan)->lists('tujab','id'), null, array(
				'id'=>'tujab_id',
				'placeholder' => "Pilih Tujab",
				'class'=>'form-control input-sm')) }}
</div>
<div class="form-group">
	{{ Form::label('keterangan', 'Hasil Kerja') }}
	{{ Form::textarea('keterangan',null,array('class'=>'form-control', 'style'=>'height:100px; resize:none'))}}	
</div>
<div class="form-group">
	{{ Form::label('satuan', 'Satuan Pekerjaan') }}
	{{ Form::select('satuan', array(''=>'')+Satuan::lists('satuan','satuan'), null, array(
				'id'=>'satuan',
				'placeholder' => "Pilih Satuan",
				'class'=>'form-control input-sm')) }}
</div>
<div class="form-group">
	{{ Form::label('qty', 'Volume Kerja') }}
	{{ Form::text('qty', null, array('class' => 'form-control', 'placeholder'=>'Keterangan jumlah')) }}
</div>
<div class="form-group">
    <label for="file">Upload File</label>
    {{ Form::file('files') }}
    <p class="help-block">Upload file hasil kerja.</p>
</div>
<div class="box-footer">
	{{Form::submit('SIMPAN', array('class'=>'btn btn-primary'))}}                        
</div>