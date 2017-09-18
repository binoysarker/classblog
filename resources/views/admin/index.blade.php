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
        <table id="example1" class="table table-bordered table-hover">
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
                        <td>{{$post->PostTitle}} </td>
                        <td>{{substr($post->PostBody,0,100)}} </td>
                        <td>{{$post->created_at->diffForHumans()}} </td>
                        <td>
                            <a href="{{url('/admin/'.$post->id)}}" class="btn btn-primary btn-sm">Show</a>
                            <a href="{{url('/admin/'.$post->id.'/edit')}}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{url('admin/'.$post->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input type="submit" value="Delete" class="btn btn-sm btn-primary">
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="box-footer no-border">
            <a href="{{url('/admin/create')}}" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add Post</a>
        </div>
        @endif
    </div>

</div>

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
            @if(isset($comments))
                @foreach($comments as $comment)
                    <tr>
                        <td>{{$comment->post->PostTitle}} </td>
                        <td>{{substr($comment->CommentBody,0,100)}} </td>
                        <td>{{$comment->created_at->diffForHumans()}} </td>
                        <td>
                            <a href="{{url('/admin/'.$comment->id.'/edit')}}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{url('/admin/'.$comment->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input type="submit" value="Delete" class="btn btn-sm btn-primary">
                            </form>
                        </td>

                    </tr>
                @endforeach
            @endif
                </tbody>
            </table>

            <div class="box-footer no-border">
                <a href="{{url('/admin/create')}}" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add Comment</a>
            </div>

    </div>
</div>

@endsection


