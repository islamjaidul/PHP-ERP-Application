@extends('module.students.layout.index')
@section('heading')
	Add New
@stop

@section('content')
	@if($errors -> has('name'))
		<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $errors -> first('name') }}</div>
	@endif
	
	@if(Session::has('global'))
		<div class="alert alert-success"><i style="font-size:16px" class="fa fa-check-square-o"></i> {{ Session::get('global') }}</div>
	@endif	
	<form name="form1" method="post" action="{{ URL::route('post_new_institute') }}">
		<input type="text" name="name" class="form-control" placeholder="Enter the Institute Name"><br />
		<input class="btn btn-primary" type="submit" value="Submit">
		{{ Form::token() }}
	</form>
@stop