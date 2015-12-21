@if ($errors->count() > 0)
	<div class="uk-alert uk-alert-danger" data-uk-alert>
		<a href="" class="uk-alert-close uk-close"></a>
		@foreach ($errors->all('<p>:message</p>') as $error)
			{{ $error }}
		@endforeach
	</div>
@endif