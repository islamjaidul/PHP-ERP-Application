@extends('module.students.layout.index')
@section('heading')
	Add New
@stop

@section('content')
	@if($errors -> has('name'))
		<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $errors -> first('name') }}</div>
	@endif
	
	@if($errors -> has('institute'))
		<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $errors -> first('institute') }}</div>
	@endif
	
	@if(Session::has('global'))
		<div class="alert alert-success"><i style="font-size:16px" class="fa fa-check-square-o"></i> {{ Session::get('global') }}</div>
	@endif
	
	<form name="form1" method="post" action="{{ URL::route('post_new_subinstitute') }}">
		<input class="form-control" type="text" name="name" placeholder="Enter the Sub Institute Name"><br />
		<select class="form-control" name="institute">
			<option selected="selected">Select</option>
			@foreach($rows as $row)
				<option value="{{ $row -> id }}">{{ $row -> name }}</option>
			@endforeach
		</select>
		<br />
		<input type="submit" class="btn btn-primary" value="Submit">
		{{ Form::token() }}
	</form>
@stop	