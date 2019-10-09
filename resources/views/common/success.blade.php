@if(session('status'))
	<div class="alert alert-success col-md-4 offset-md-8 alert-dismissible fade show" role="alert">
		{{ session('status') }}
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
@endif