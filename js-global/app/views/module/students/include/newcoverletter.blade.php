@extends('module.students.layout.index')
@section('heading')
	Add New
@stop

@section('content')
	<div class="alert alert-success"><b>Note: </b>Attach One or More Documents with the Student Name</div>
	@if(Session::has('global'))
		<div class="alert alert-success"><i style="font-size:16px" class="fa fa-check-square-o"></i> {{ Session::get('global') }} </div>
	@endif	
	<div class="panel panel-default">
	<div class="panel-heading">Cover Letter</div>
	<div class="panel-body">
	{{ Form::open(array('route' => 'post_new_coverletter', 'files' => true)) }}
		<select class="form-control" name="name" id="name">
			<option value="0" selected="selected">Select Student Name</option>
			@foreach($rows as $row)
				<option value="{{ $row -> id }}">{{ $row -> name }}</option>
			@endforeach
		</select>
		@if($errors -> has('name'))
		<div style="color:red"><i class="fa fa-exclamation-triangle"></i> {{ $errors -> first('name') }}</div>
		@endif
		<br>
		{{ Form::file('attachment1', array('class' => 'form-control')) }}
		@if($errors -> has('attachment1'))
		<div style="color:red"><i class="fa fa-exclamation-triangle"></i> {{ $errors -> first('attachment1') }}</div>
		@endif
		<br/>
		<input class="form-control" type="file" name="attachment2">
		@if($errors -> has('attachment2'))
		<div style="color:red"><i class="fa fa-exclamation-triangle"></i> {{ $errors -> first('attachment2') }}</div>
		@endif
		<br/>
		<input class="form-control" type="file" name="attachment3">
		@if($errors -> has('attachment3'))
		<div style="color:red"><i class="fa fa-exclamation-triangle"></i> {{ $errors -> first('attachment3') }}</div>
		@endif
		<br/>
		<input class="form-control" type="file" name="attachment4">
		@if($errors -> has('attachment4'))
		<div style="color:red"><i class="fa fa-exclamation-triangle"></i> {{ $errors -> first('attachment4') }}</div>
		@endif
		<br/>
		<input class="btn btn-primary" type="submit" value="Submit">
	{{ Form::close() }}
	</div>
	</div>
@stop	