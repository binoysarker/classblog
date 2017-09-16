@extends('layouts.app')
@section('title')
	{{-- expr --}}
	Create Post
@endsection
@section('custom.js')
	<script src="{{asset('js/custom.js')}}"></script>
@endsection

@section('content')
	{{-- expr --}}
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Create Post</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			@include('partials.errormessage')

			<form action="{{ url('/admin') }}" method="post">
				<legend><strong>Create Post</strong></legend>
				{{csrf_field()}}
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Title</label>
					<input type="text" class="form-control" name="PostTitle" id="formGroupExampleInput" placeholder="Title" required="">
				</fieldset>
				<fieldset class="form-group">
					<label for="cat">Category Title</label>
					<select class="form-control" name="CategoryName" id="cat">
						<option value="Category 1">Category 1</option>
						<option value="Category 2">Category 2</option>
						<option value="Category 3">Category 3</option>
						<option value="Category 4">Category 4</option>
					</select>
				</fieldset>
				<fieldset class="form-group">
					<select name="CategoryPublished" id="">
						<option value="1">Published</option>
						<option value="0">Unpublished</option>
					</select>
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput2">Body</label>
					<textarea class="form-control my-editor" name="PostBody" id="formGroupExampleInput2 " placeholder="Body" ></textarea>
				</fieldset>
				<fieldset class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" value="Post">
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

