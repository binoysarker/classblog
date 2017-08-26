@extends('layouts.master')
@section('title')
	{{-- expr --}}
	Contact
@endsection
@section('mainContent')
	{{-- expr --}}
	<div class="col-sm-8 blog-main">
		<div class="jumbotron">
			<form>
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Example label</label>
					<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput2">Another label</label>
					<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Example input">
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput2">Another label</label>
					<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Example input">
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput2">Another label</label>
					<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Example input">
				</fieldset>
				<fieldset class="form-group">
					<input type="submit" name="" class="btn btn-primary" value="Submit">
				</fieldset>
			</form>
		</div>
	</div>
	

@endsection