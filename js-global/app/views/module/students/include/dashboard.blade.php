@extends('module.students.layout.index')
@section('heading')
	Dashboard
@stop

@section('content')
	<div style="display:none" id="notice">
	<h2 style="color:#FFCC66">Welcome to Students Dashboard</h2>
	<h3 style="color:#FF0000">Sorry, This is Dashboard Page is Under Construction</h3>
	</div>
@stop

@section('footer')
	<script>
	$('#notice').fadeIn(2000);
	</script>
@stop