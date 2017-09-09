@extends('layouts.master')
@section('title')
	{{-- expr --}}
	Create
@endsection
@section('mainContent')
	{{-- expr --}}
	<div class="col-sm-8 blog-main">
		<div class="jumbotron">
			{{-- error message section --}}
			@include('partials.errormessage')

			<form action="{{ url('/blog/posts') }}" method="post">
				<legend><strong>Create Post</strong></legend>
				{{csrf_field()}}
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Title</label>
					<input type="text" class="form-control" name="title" id="formGroupExampleInput" placeholder="Title" required="">
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput2">Body</label>
					<textarea class="form-control " name="body" id="formGroupExampleInput2" placeholder="Body" ></textarea>
				</fieldset>
				<fieldset class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" value="Post">
				</fieldset>
			</form>
		</div>
	</div>
	

@endsection