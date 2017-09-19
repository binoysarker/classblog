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
					<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <label for="formGroupExampleInput">Title</label>
					<input type="text" class="form-control" name="PostTitle" id="formGroupExampleInput" placeholder="Title" required="">
				</fieldset>
                <fieldset class="form-group">
                    <label for="cat">Category Title</label>
                    <select class="form-control" name="category_id" >
						@foreach($categories as $category)
                        	<option value="{{$category->id}}">{{$category->CategoryName}}</option>
						@endforeach
                    </select>
                </fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput2">Body</label>
					<textarea class="form-control my-editor" name="PostBody" id="formGroupExampleInput2" placeholder="Body" ></textarea>
				</fieldset>
				<fieldset class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" value="Post">
				</fieldset>
			</form>
		</div>
	</div>
	

@endsection