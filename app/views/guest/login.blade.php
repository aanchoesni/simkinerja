@extends('layouts.login')

@section('content')
<div class="login-form">	
	<h1>Masuk</h1>
	<h2><a href="{{ URL::to('/') }}">SIM KINERJA LPPM UNESA</a></h2>			
	{{ Form::open(array('url' => 'authenticate')) }}
	@include('layouts.partial.alert')
		<li>
			<a href="#" class=" icon user"></a>{{ Form::text('email', null, array('class'=>'text', 'placeholder'=>'Email'))}}
		</li>
		<li>
			{{ Form::password('password', array('class'=>'text','placeholder'=>'Password')) }}<a href="#" class=" icon lock"></a>
		</li>
		<div class="forgot">
			<h3><a href="{{ URL::to('forgot') }}">Lupa Password</a></h3>
			{{ Form::submit('Masuk', array('onclick'=>'myFunction()')) }}<a href="#" class=" icon arrow"></a>			
		</div>					
	{{form::close()}}	
</div>
<!--//End-login-form-->
@stop