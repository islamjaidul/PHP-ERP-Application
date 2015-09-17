@extends('module.students.layout.index')
@section('heading')
	Cover Letter
@stop

@section('content')
@include('module.students.include.common.delete')
	<form method="get" action="{{ URL::route('get_delete_all_coverletter') }}">
	<div style="float:right" class="btn-group" role="group" aria-label="...">
	  <a href="{{ URL::route('get_new_coverletter') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
	  <button id="deleteall" class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
	</div>
	
	<br>
	<br>
	<br>
	
	@if($errors->has('name'))
		<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $errors->first('name') }} </div>
	@endif

@if(Session::has('global'))
	<div class="alert alert-danger">
		<i class="fa fa-check-square-o"></i> {{Session::get('global')}}
	</div>
@endif

	<div class="row">
		<div class="col-md-6">
	<table class="table table-striped">
		<tr><th><input type="checkbox" id="selectall"></th><th>Student Name</th><th style="padding-left:28px;">Action</th><th></th></tr>
		@foreach($rows as $row)
		<tr>
			<td>
			<input type="checkbox"  name="id[]" id="id"   value="{{ $row->id }}">
			<input style="display:none" type="checkbox" name="delete_attachment1[]" id="deleteattachment" value="{{ $row -> attachment1 }}">
			<input style="display:none" type="checkbox" name="delete_attachment2[]" id="deleteattachment1" value="{{ $row -> attachment2 }}">
			<input style="display:none" type="checkbox" name="delete_attachment3[]" id="deleteattachment2" value="{{ $row -> attachment3 }}">
			<input style="display:none" type="checkbox" name="delete_attachment4[]" id="deleteattachment3" value="{{ $row -> attachment4 }}">
			</td>
			<td>{{{ $row->name }}}</td>
			<td>
				<a name="{{ $row -> id }}" class="btn btn-info btn-xs">View</a>
				
				<a data-href="{{ URL::action('get_delete_coverletter', [$row->id, $row->attachment1,$row->attachment2, $row->attachment3, $row->attachment4]) }}" data-toggle="modal" href="#" data-target="#confirm-delete" class="btn btn-danger btn-xs">Delete</a>
			<td>
		</tr>
		@endforeach
	</table>
		</div>
	
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					View of Cover Letter
				</div>
				<div class="panel panel-body">
					<h3 style="text-align:center">Click the View Button to See the Details</h3>
				</div>
			</div>
		</div>
	</div>
</form>
@stop

@section('footer')
<script>
$(document).ready(function() {
	$("#deleteall").prop("disabled", true);
	$("td").click(function(){
		if($("td").parents("tr").find("#id").is(":checked"))
		{
			$("#deleteall").prop("disabled", false);
		}
		else
		{
			$("#deleteall").prop("disabled", true);
		}
	});
	
 	$('#selectall').click(function() {
    	if($(this).is(":checked"))
		{
			$(":checkbox").prop("checked", this.checked);
			$("#deleteall").prop("disabled", false);
		}
		else
		{
			$(":checkbox").prop("checked", false);
			$("#deleteall").prop("disabled", true);
		}
	}); 
	
	$("td").click(function(){
		if($(this).parents("tr").find("#id").is(":checked"))
		{
			$(this).parents("tr").find("#deleteattachment").prop("checked", true);
			$(this).parents("tr").find("#deleteattachment1").prop("checked", true);
			$(this).parents("tr").find("#deleteattachment2").prop("checked", true);
			$(this).parents("tr").find("#deleteattachment3").prop("checked", true);
		}
		else
		{
			$(this).parents("tr").find("#deleteattachment").prop("checked", false);
			$(this).parents("tr").find("#deleteattachment1").prop("checked", false);
			$(this).parents("tr").find("#deleteattachment2").prop("checked", false);
			$(this).parents("tr").find("#deleteattachment3").prop("checked", false);
		}
	});
	
	$(".btn-info").click(function(){
		var id = $(this).prop('name');
		$.post("{{ URL::route("post_view_coverletter") }}", {id: id}, function(data){
			$(".panel-body").html(data);
		})
	})
});
</script>
@stop	