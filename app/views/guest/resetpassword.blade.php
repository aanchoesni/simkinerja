@extends('layouts.login')

@section('content')
<div class="login-form">	
	<h1>Password</h1>
	<h2><a href="{{ URL::to('/') }}">SIM KINERJA LPPM UNESA</a></h2>			
	{{ Form::open(array('url' => route('guest.storenewpassword'), 'method'=>'post')) }}
	@include('layouts.partial.alert')
		<li>
			<a href="#" class=" icon lock"></a>{{ Form::password('password', array('class'=>'text','placeholder'=>'Password')) }}
		</li>
		<li>
			{{ Form::password('password_confirmation', array('class'=>'text','placeholder'=>'Ulangi Password')) }}<a href="#" class=" icon lock"></a>
		</li>
		<li>
			{{ Form::hidden('email', $email) }}
			{{ Form::hidden('resetCode', $resetCode) }}
		</li>
		<div class="forgot">
			{{ Form::submit('Reset', array('onclick'=>'myFunction()')) }}<a href="#" class=" icon arrow"></a>			
		</div>					
	{{form::close()}}	
</div>
<!--//End-login-form-->
@stop