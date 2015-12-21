@extends('layouts.login')

@section('content')
<div class="login-form">
	<h2><a href="{{ URL::to('/') }}">SIM KINERJA LPPM UNESA</a></h2>
	{{ Form::open(array('url' => route('guest.sendresetcode'), 'method'=>'post')) }}
	@include('layouts.partial.alert')
		<li>
			<a href="#" class=" icon user"></a>{{ Form::text('email', null, array('class'=>'text', 'placeholder'=>'Masukkan Email'))}}
		</li>
		<div class="forgot">
			{{ Form::submit('RESET', array('onclick'=>'myFunction()')) }}<a href="#" class=" icon arrow"></a>			
		</div>					
	{{form::close()}}	
</div>
<!--//End-login-form-->
@stop