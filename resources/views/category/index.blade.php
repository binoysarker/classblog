@extends('layouts.app')
@section('title')
    {{-- expr --}}
    All Categories
@endsection
@section('custom.js')
    <script src="{{asset('js/custom.js')}}"></script>
@endsection

@section('content')
    {{-- expr --}}
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">All Categories</h3>
        </div>

        {{--displaying success message--}}

        <div class="panel-body">
            @include('partials.successmessage')
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered table-hover ">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->CategoryName}} </td>
                        @if($category->CategoryPublished == 1)
                            <td style="color: green;">{{"Published"}} </td>
                        @else
                            <td style="color: red;">{{"Unpublished"}} </td>
                        @endif
                        <td>{{$category->created_at->diffForHumans()}} </td>
                        <td class="form-inline">
                            @if($category->CategoryPublished == 0)
                                <a href="{{url('/admin/category/'.$category->id)}}" class="btn btn-primary btn-sm "><i class="fa fa-check-circle-o"
                                                                                                                                          aria-hidden="true"></i></a>

                            @else
                                <a href="{{url('/admin/category/'.$category->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-times-circle-o"
                                                                                                                                         aria-hidden="true"></i></a>
                            @endif
                            <form action="{{url('admin/category/'.$category->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <a type="submit" class="btn btn-danger btn-sm " name="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </form>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="box-footer no-border">
                <button type="button" class="btn btn-default pull-right"><a href="{{url('/admin/category')}}"><i class="fa fa-plus"></i>Add Category</a></button>
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

