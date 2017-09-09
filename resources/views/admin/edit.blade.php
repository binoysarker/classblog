@extends('layouts.app')
@section('title')
	{{-- expr --}}
	All Posts
@endsection
@section('custom.js')
	<script src="{{asset('js/custom.js')}}"></script>
@endsection

@section('content')
	{{-- expr --}}
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">All Posts</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
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
					<textarea class="form-control" name="body" value="Body" >{{$post->body}} </textarea>
				</fieldset>
				<fieldset class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" value="Update Post">
				</fieldset>
			</form>
		</div>
		@endsection

@section('customCss')
    <style>
        .main-footer{
            margin-left: 0;
        }
    </style>

@endsection

