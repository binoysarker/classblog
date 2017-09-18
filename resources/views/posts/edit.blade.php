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

			<form action="{{ url('/blog/posts/'.$post->id) }}" method="post">
				<legend><strong>Edit Post</strong></legend>
				{{csrf_field()}}
				{{method_field('PUT')}}
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Title</label>
					<input type="text" class="form-control" name="PostTitle" id="formGroupExampleInput" value="{{$post->PostTitle}}" required="">
				</fieldset>
				<fieldset class="form-group">
					<textarea class="form-control my-editor" name="PostBody" >{{$post->PostBody}}</textarea>
				</fieldset>
				<fieldset class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" value="Update Post">
				</fieldset>
			</form>
		</div>
	</div>
@endsection