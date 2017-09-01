@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @include('partials.successmessage')
                </div>
                <div class="panel-body">
                    You are logged in As Admin!
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('custom.js')
    <script src="{{asset('js/custom.js')}}"></script>
@endsection

@section('allPosts')
{{-- expr --}}

<div class="box box-primary">
<div class="box-header">
<h3 class="box-title">All Posts</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
<table id="example1" class="table table-bordered table-hover ">
<thead>
<tr>
    <th>Title</th>
    <th>Body</th>
    <th>Date</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@if(isset($posts))
    @foreach($posts as $post)
        <tr>
            <td>{{$post->title}} </td>
            <td>{!! substr($post->body,0,100) !!} </td>
            <td>{{$post->created_at->diffForHumans()}} </td>
            <td><a href="{{url('/blog/posts')}}{{'/'.$post->id.'/edit'}} "><i class="fa fa-pencil-square"></i></a>
                <form action="{{url('/blog/posts')}}{{'/'.$post->id}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input type="hidden" name="title" value="{{$post->title}}">
                    <input type="hidden" name="body" value="{{$post->body}}">

                    <input type="submit" value="Delete" class="btn btn-sm btn-primary">
                </form>
            </td>

        </tr>
    @endforeach
@else
</tbody>
</table>

<div class="box-footer clearfix no-border">
<a href="{{url('/admin/create')}}" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add Post</a>
</div>
</div>

@endif

@endsection




@section('allComments')
{{-- expr --}}
<div class="box box-primary">
<div class="box-header">
    <h3 class="box-title">All Comments</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <table id="example1" class="table table-bordered table-hover ">
        <thead>
        <tr>
            <th>Post Title</th>
            <th>Post Comment</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{$comment->post->title}} </td>
                <td>{{substr($comment->body,0,100)}} </td>
                <td>{{$comment->created_at->diffForHumans()}} </td>
                <td><a href=""><i class="fa fa-pencil-square" ></i></a>
                    <a href=""><i class="fa fa-times-rectangle" ></i></a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="box-footer clearfix no-border">
        <a href="{{url('/admin/create')}}" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add Comment</a>
    </div>
</div>
@endsection


