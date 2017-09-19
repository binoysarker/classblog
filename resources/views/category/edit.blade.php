@extends('layouts.app')
@section('title')
    {{-- expr --}}
    Edit Category
@endsection
@section('custom.js')
    <script src="{{asset('js/custom.js')}}"></script>
@endsection

@section('content')
    {{-- expr --}}
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Edit Category</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @include('partials.errormessage')

            <form action="{{ url('/category/'.$category->id) }}" method="post">
                <legend><strong>Edit Category</strong></legend>
                {{csrf_field()}}
                {{method_field('PUT')}}
                    <fieldset class="form-group">
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        <label for="formGroupExampleInput">Name</label>
                            <input type="text" class="form-control" name="CategoryName" id="formGroupExampleInput" value="{{$category->CategoryName}}" required="">
                    </fieldset>
                <fieldset class="form-group">
                    <select name="CategoryPublished">
                        <option value="1">Published</option>
                        <option value="0">Unpublished</option>
                    </select>
                </fieldset>
                <fieldset class="form-group">
                    <label for="cat">Category Description</label>
                    <textarea name="CategoryDescription" class="form-control" cols="30" rows="10" placeholder="Description">{{$category->CategoryDescription}}</textarea>
                </fieldset>

                <fieldset class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Update Category">
                    </fieldset>
            </form>
        </div>
        @endsection

        @section('customCss')
            <style>
                .main-footer{
                    margin-left: 0;
                }
            </style>

@endsection

