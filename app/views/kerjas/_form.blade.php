<div class="form-group">
	{{ Form::label('nama', 'Nama Unit') }}
	{{ Form::text('nama',$nama=Sentry::getUser()->first_name. ' ' . Sentry::getUser()->last_name, array('class' => 'form-control','disabled')) }}
</div>
<div class="form-group">
	{{ Form::label('tujab_id', 'Tujab') }}
	{{ Form::select('tujab_id', array(''=>'')+Tujab::where('unit_id','=',Sentry::getUser()->unit)->where('jabatan_id','=',Sentry::getUser()->jabatan)->lists('tujab','id'), null, array(
				'id'=>'tujab_id',
				'placeholder' => "Pilih Tujab",
				'class'=>'form-control input-sm')) }}
</div>
<div class="form-group">
	{{ Form::label('keterangan', 'Keterangan') }}
	{{ Form::textarea('keterangan',null,array('class'=>'form-control', 'style'=>'height:100px; resize:none'))}}	
</div>
<div class="form-group">
	{{ Form::label('qty', 'Keterangan Jumlah') }}
	{{ Form::text('qty', null, array('class' => 'form-control', 'placeholder'=>'Keterangan jumlah')) }}
</div>
<div class="box-footer">
	{{Form::submit('SIMPAN', array('class'=>'btn btn-primary'))}}                        
</div>