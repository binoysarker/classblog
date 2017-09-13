@extends('layouts.app')
@section('title')
	{{-- expr --}}
	Show Post
@endsection
@section('custom.js')
	<script src="{{asset('js/custom.js')}}"></script>
@endsection

@section('content')
	{{-- expr --}}
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Show Post</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			@foreach($post as $data)
			<h2 class="blog-post-title">{{$data->PostTitle}}</h2>
			<p class="blog-post-meta">{{$data->created_at}} by <a href="#">{{auth()->user()->name}} </a></p>

			<div class="m-3"><p class="m-3">{!! $data->PostBody !!} </p></div>
			<p class="m-3"><a href="{{ url('/admin/'.$data->id.'/edit') }}" class="btn btn-info" title="">Edit Post</a></p>
			@endforeach
			{{-- comments section --}}
            @if(isset($comments))
                @foreach ($comments as $comment)

                        <ul class="list-group">
                            <li class="list-group-item"><span class="mr-3"><strong>{{$comment->created_at->diffForHumans()}}</strong></span> {!! $comment->CommentBody !!}</li>
                        </ul>

                @endforeach
                {{-- add comment section
                 display errors message for the add comment section--}}
                @include('partials.errormessage')



                    <form class="form" action="{{ url('/admin') }} " method="post">
                        {{csrf_field()}}
                        <fieldset class="form-group">
                            @if(isset($post[0]['id']))
                                <input type="hidden" name="post_id" value="{{$post[0]['id']}} ">
                            @endif
                                <textarea name="CommentBody" class="form-control" rows="2"  required="" placeholder="Add Comment"></textarea>
                        </fieldset>
                        <fieldset class="form-group">
                            <input type="submit" class="btn btn-primary m-3" name="submit" value="Post Comment">
                        </fieldset>
                    </form>

            @endif

        </div>
    </div>


@endsection



