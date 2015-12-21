@if (Session::has('successMessage'))
	<div class="uk-alert uk-alert-success" data-uk-alert>
		<a href="" class="uk-alert-close uk-close"></a>
		<p>{{ Session::get('successMessage') }}</p>
	</div>
@elseif(Session::has('errorMessage'))	
	<div class="uk-alert uk-alert-danger" data-uk-alert>
		<a href="" class="uk-alert-close uk-close"></a>
		<p>{{ Session::get('errorMessage') }}</p>
	</div>
@endif