@if(Session::has('info'))
	<div class="alert alert-info alert-dismissible" role='alert'>
		{{ Session::get('info') }}
	</div>
@endif 