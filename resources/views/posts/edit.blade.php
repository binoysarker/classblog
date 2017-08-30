@extends('layouts.master')
@section('title')
	{{-- expr --}}
	Edit
@endsection
@section('mainContent')
	{{-- expr --}}
	<div class="col-sm-8 blog-main">
		<div class="jumbotron">
			{{-- error message section --}}
			@include('partials.errormessage', ['some' => 'data'])

			<form action="{{ url('/blog/posts') }}{{'/'.$post->id}} " method="post">
				<legend><strong>Edit Post</strong></legend>
				{{csrf_field()}}
				{{method_field('PUT')}}
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Title</label>
					<input type="text" class="form-control" name="title" id="formGroupExampleInput" value="{{$post->title}}" required="">
				</fieldset>
				<fieldset class="form-group">
					<textarea class="form-control" name="body" id="summernote" value="Body" required="">{{$post->body}} </textarea>
				</fieldset>
				<fieldset class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" value="Update Post">
				</fieldset>
			</form>
		</div>
	</div>


	<script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
	</script>
	

@endsection