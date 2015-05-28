@if (Session::has('flash_message'))
	<div class="alert alert-seccess {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
		@if (Session::has('flash_message_important'))
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		@endif
	</div>

	{{ session('flash_message') }}
@endif