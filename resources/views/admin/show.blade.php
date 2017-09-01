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
			@if(isset($post))
			<img src="{{ asset('images/post1.jpg') }}" class="card-img" alt="">
			<h2 class="blog-post-title">{{$post->title}}</h2>
			@if(! isset($post->created_at))
				<p class="blog-post-meta">{{$post->created_at}} by <a href="#">Mark</a></p>
			@else
				<p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} by <a href="#">Mark</a></p>
			@endif

			<div class="m-3"><p class="m-3">{!! $post->body !!} </p></div>
			<p class="m-3"><a href="{{ url('/blog/posts') }}{{'/'.$post->id.'/edit'}} " class="btn btn-info" title="">Edit Post</a></p>

			{{-- comments section --}}
			@foreach ($post->comments as $comment)
				{{-- expr --}}
				<div class="card-blockquote form-control">
					<ul class="list-group">
						<li class="list-group-item"><span class="mr-3"><strong>{{$comment->created_at->diffForHumans()}}</strong></span> {{$comment->body}}</li>
					</ul>
				</div>

			@endforeach
			{{-- add comment section --}}
			{{-- display errors message for the add comment section --}}
			@include('partials.errormessage')

			@else


			<form class="form" action="{{ url('/blog/comments') }} " method="post">
				{{csrf_field()}}
				<fieldset class="form-group">
					<input type="hidden" name="post_id" value="{{$post->id}} ">
					<textarea name="body" class="form-control" rows="2"  required="" placeholder="Add Comment"></textarea>
				</fieldset>
				<fieldset class="form-group">
					<input type="submit" class="btn btn-outline-primary m-3" name="submit" value="Post">
				</fieldset>
			</form>
		</div>

		@endif
		@endsection

@section('customCss')
    <style>
        .main-footer{
            margin-left: 0;
        }
    </style>

@endsection

