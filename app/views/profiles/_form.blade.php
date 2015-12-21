<div class="form-group">
	{{ Form::label('first_name', 'Nama Depan') }}
	{{ Form::text('first_name', null, array('class' => 'form-control','placeholder'=>'masukkan nama depan','disabled')) }}
</div>
<div class="form-group">
	{{ Form::label('last_name', 'Nama Belakang') }}
	{{ Form::text('last_name', null, array('class' => 'form-control','placeholder'=>'masukkan nama belakang','disabled')) }}
</div>
<div class="form-group">
	{{ Form::label('nip', 'NIP') }}
	{{ Form::text('nip', null, array('class' => 'form-control','placeholder'=>'masukkan NIP','disabled')) }}
</div>
<div class="form-group">
	{{ Form::label('unit_kerja', 'Unit Kerja') }}
	{{ Form::select('unit_kerja', array(''=>'')+Unitkerja::lists('nama','id'), null, array(
				'id'=>'unit_kerja',
				'placeholder' => "Pilih Unit Kerja",				
				'class'=>'select2-container form-control input-sm select2 select2-container-active', 'disabled')) }}
</div>
<div class="form-group">
	{{ Form::label('unit', 'Unit') }}
	{{ Form::select('unit', array(''=>'')+Unit::lists('nama','id'), null, array(
				'id'=>'unit',
				'placeholder' => "Pilih Unit",
				'class'=>'form-control input-sm','disabled')) }}
</div><div class="form-group">
	{{ Form::label('jabatan', 'Jabatan') }}
	{{ Form::select('jabatan', array(''=>'')+Jabatan::lists('nama','id'), null, array(
				'id'=>'jabatan',
				'placeholder' => "Pilih jabatan",
				'class'=>'form-control input-sm','disabled')) }}
</div>
{{-- {{ HTML::divider() }}
<div class="box-footer">
	<a href="{{ route('profile.edit') }}" class="btn btn-primary">UBAH</a>
</div> --}}