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
			<table class="table table-bordered table-hover ">
				<thead>
					<tr>
						<th>Title</th>
						<th>Body</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $post)
						<tr>
							<td>{{$post->PostTitle}} </td>
							<td>{{substr($post->PostBody,0,100)}} </td>
                            <td>{{$post->created_at->diffForHumans()}} </td>
                            <td class="form-inline">
                                <a href="{{url('/admin/'.$post->id)}}" class="btn btn-primary btn-sm">Show</a>
								<a href="{{url('admin/'.$post->id.'/edit')}}" class="btn btn-info btn-sm">Edit</a>
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
			<button type="button" class="btn btn-default pull-right"><a href="{{url('/admin/create')}}"><i class="fa fa-plus"></i>Add Post</a></button>
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

