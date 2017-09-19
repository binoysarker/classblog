@extends('layouts.app')
@section('title')
    {{-- expr --}}
    Create Category
@endsection
@section('custom.js')
    <script src="{{asset('js/custom.js')}}"></script>
@endsection

@section('content')
    {{-- expr --}}
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Create Category</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @include('partials.errormessage')

            <form action="{{ url('/category') }}" method="post">
                <legend><strong>Create Category</strong></legend>
                {{csrf_field()}}
                <fieldset class="form-group">
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <label for="formGroupExampleInput">Name</label>
                    <input type="text" class="form-control" name="CategoryName" id="formGroupExampleInput" placeholder="Name" required="">
                </fieldset>
                <fieldset class="form-group">
                    <select name="CategoryPublished" id="">
                        <option value="1">Published</option>
                        <option value="0">Unpublished</option>
                    </select>
                </fieldset>
                <fieldset class="form-group">
                    <label for="cat">Category Description</label>
                    <textarea name="CategoryDescription" class="form-control" cols="30" rows="10" placeholder="Description"></textarea>
                </fieldset>

                <fieldset class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Create Category">
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

