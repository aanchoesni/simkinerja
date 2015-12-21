<div class="form-group">
	{{ Form::label('first_name', 'Nama Depan') }}
	{{ Form::text('first_name', null, array('class' => 'form-control','placeholder'=>'masukkan nama depan')) }}
</div>
<div class="form-group">
	{{ Form::label('last_name', 'Nama Belakang') }}
	{{ Form::text('last_name', null, array('class' => 'form-control','placeholder'=>'masukkan nama belakang')) }}
</div>
<div class="form-group">
	{{ Form::label('nip', 'NIP') }}
	{{ Form::text('nip', null, array('class' => 'form-control','placeholder'=>'masukkan NIP')) }}
</div>
<div class="form-group">
	{{ Form::label('unit_kerja', 'Unit Kerja') }}
	{{ Form::select('unit_kerja', array(''=>'')+Unitkerja::lists('nama','id'), null, array(
				'id'=>'unit_kerja',
				'placeholder' => "Pilih Unit Kerja",				
				'class'=>'select2-container form-control input-sm select2 select2-container-active')) }}
</div>
<div class="form-group">
	{{ Form::label('unit', 'Unit') }}
	{{ Form::select('unit', array(''=>'')+Unit::lists('nama','id'), null, array(
				'id'=>'unit',
				'placeholder' => "Pilih Unit",
				'class'=>'form-control input-sm select2')) }}
</div>
<div class="form-group">
	{{ Form::label('jabatan', 'Jabatan') }}
	{{ Form::select('jabatan', array(''=>'')+Jabatan::lists('nama','id'), null, array(
				'id'=>'jabatan',
				'placeholder' => "Pilih jabatan",
				'class'=>'form-control input-sm select2')) }}
</div>
<div class="form-group">
	{{ Form::label('email', 'Email') }}
	{{ Form::text('email', null, array('class' => 'form-control','placeholder'=>'masukkan email')) }}
</div>
<div class="form-group">
	{{ Form::label('password', 'Password') }}
	<p class="help-block">Lebih baik tidak sama dengan password email</p>
	{{ Form::password('password', array('class' => 'form-control','placeholder'=>'**********')) }}
</div>
<div class="form-group">
	{{ Form::label('password_confirmation', 'Konfirmasi Password') }}
	{{ Form::password('password_confirmation', array('class' => 'form-control','placeholder'=>'**********')) }}
</div>
<div class="form-group">
	{{ Form::label('group', 'Group') }}
	{{ Form::select('group', array(''=>'')+Group::lists('name','id'), null, array(
				'id'=>'group',
				'placeholder' => "Pilih group",
				'class'=>'form-control input-sm select2')) }}
</div>
{{ HTML::divider() }}
<div class="box-footer">
	{{Form::submit('SIMPAN', array('class'=>'btn btn-primary'))}}                        
</div>