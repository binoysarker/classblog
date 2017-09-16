@extends('layouts.master')
@section('title')
	{{-- expr --}}
	Show post
@endsection
@section('mainContent')
	{{-- expr --}}
	<div class="col-sm-8 blog-main">

	<div class="blog-post">
	  <h2 class="blog-post-title">{{$post->PostTitle}}</h2>
	  <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} by <a href="#">{{auth()->user()->name}}</a></p>

	  <div class="m-3"><p class="m-3">{!! $post->PostBody !!} </p></div>
	  <p class="m-3"><a href="{{ url('/blog/posts/'.$post->id.'/edit') }}" class="btn btn-info" title="">Edit Post</a></p>
	  
	  {{-- comments section --}}
	  @foreach ($post->comments as $comment)
	  	{{-- expr --}}
	  	<div class="card-blockquote form-control">
			<ul class="list-group">
				<li class="list-group-item"><span class="mr-3"><strong>{{$comment->created_at->diffForHumans()}}</strong></span> {!! $comment->CommentBody !!}</li>
			</ul>
	  	</div>

	  @endforeach
	  {{-- add comment section --}}
	  {{-- display errors message for the add comment section --}}
	  @include('partials.errormessage')


	  <form class="form" action="{{ url('/blog/comments') }} " method="post">
	  	{{csrf_field()}}
	  	<fieldset class="form-group">
	  		<input type="hidden" name="post_id" value="{{$post->id}} ">
	  		<input type="hidden" name="user_id" value="{{auth()->user()->id}} ">
	  		<textarea name="CommentBody" class="form-control" rows="2"  required="" placeholder="Add Comment"></textarea>
	  	</fieldset>
	  	<fieldset class="form-group">
	  		<input type="submit" class="btn btn-outline-primary m-3" name="submit" value="Post">
	  	</fieldset>
	  </form>
	  
	</div><!-- /.blog-post -->

	  

	  

	  <nav class="blog-pagination">
	    <a class="btn btn-outline-primary" href="#">Older</a>
	    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
	  </nav>
	</div><!-- /.blog-main -->
@endsection