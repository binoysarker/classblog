@extends('layouts.app')
@section('title')
	{{-- expr --}}
	All Comments
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
                            <td><a href=""><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                <a href=""><i class="fa fa-times-rectangle" aria-hidden="true"></i></a>
                            </td>

						</tr>
					@endforeach
				</tbody>
			</table>

		<div class="box-footer clearfix no-border">
			<button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add Comment</button>
		</div>
	</div>
@endsection

@section('customCss')
            <style>
                .main-footer{
                    margin-left: 0;
                }
            </style>
@endsection