@extends('layouts.master')
@section('title')
	{{-- expr --}}
	Home
@endsection
@section('mainContent')
	{{-- expr --}}
	<div class="col-sm-8 blog-main">

		{{-- success message section --}}
		@include('partials.successmessage')

	  @foreach ($posts as $post)
	  	{{-- expr --}}
	  	<div class="blog-post">
	  	  <h2 class="blog-post-title">{{$post->PostTitle}}</h2>
	  	  <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} by <a href="#">{{auth()->user()->name}}</a></p>


          <div class="m-3"><p>{!!str_limit($post->PostBody,500,'....')!!} </p></div>
	  	  <a href="{{ url('/blog/posts/') }}{{'/'.$post->id}} " class="btn btn-outline-info m-3" ><span><img src="{{ asset('images/more.png') }}" alt=""></span>READ MORE</a>
	  	  <form class="d-inline-flex" action="{{ url('/blog/posts/') }}{{'/'.$post->id}}" method="post" >
	  	  {{csrf_field()}}
	  	  {{method_field('DELETE')}}

	  	  <input type="submit" name="submit" class="btn btn-outline-danger" value="Delete Post">
				  	  
	  	  </form>

	  	  
	  	</div><!-- /.blog-post -->
	  @endforeach

	  

	  <nav class="blog-pagination">
	    <a class="btn btn-outline-primary" href="#">Older</a>
	    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
	  </nav>
	</div><!-- /.blog-main -->
@endsection