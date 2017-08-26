@if (session()->has('message'))
	{{-- expr --}}
	<div class="alert alert-success" role="alert">
		<strong>Well done!</strong> {{session()->get('message')}}
	</div>
@endif