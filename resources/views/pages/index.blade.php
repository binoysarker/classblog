@extends('layouts.master')
@section('title')
	{{-- expr --}}
	Home
@endsection
@section('mainContent')
	{{-- expr --}}
	<div class="col-sm-8 blog-main">

	  <div class="blog-post">
	    <p class="m-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	    <a href="{{ url('/blog/posts') }}" class="btn btn-outline-info m-3" ><span><img src="{{ asset('images/more.png') }}" alt=""></span>All Blog Posts</a>
	    
	  </div><!-- /.blog-post -->



	  <nav class="blog-pagination">
	    <a class="btn btn-outline-primary" href="#">Older</a>
	    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
	  </nav>
	</div><!-- /.blog-main -->
@endsection