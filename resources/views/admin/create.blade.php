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
					<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
					<label for="formGroupExampleInput">Title</label>
					<input type="text" class="form-control" name="PostTitle" id="formGroupExampleInput" placeholder="Title" required="">
				</fieldset>
				<fieldset class="form-group">
					<select name="category_id" id="cat">
						@foreach($categories as $category)
							<option value="{{$category->id}}">{{$category->CategoryName}}</option>
						@endforeach
					</select>
				</fieldset>
				<fieldset class="form-group">
					<select name="CategoryPublished" id="">
                        @foreach($categories as $category)
						    <option value="{{$category->CategoryPublished}}">{{$category->CategoryPublished == 1 ? 'Published':'Unpublished'}}</option>
                        @endforeach
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

