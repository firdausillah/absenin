@if(session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
		<div class="alert-message">
			{{ session('success') }}
		</div>
	</div>
@endif
@if(session('danger'))
    <div class="alert alert-danger">{{ session('danger') }}</div>
@endif
{{-- @foreach($errors->all() as $e)
    <div class="text-danger">* {{$e}}</div>
@endforeach --}}