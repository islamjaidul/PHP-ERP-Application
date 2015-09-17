@extends('module.students.layout.index')
@section('heading')
	Institution Category
@stop

@section('content')
	
@include('module.students.include.common.delete')
@include('module.students.include.edit_institute')

	<form method="get" action="{{ URL::route('get_delete_selected_institute') }}">
	<div style="float:right" class="btn-group" role="group" aria-label="...">
	  <a href="{{ URL::route('get_new_institute') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
	  
	  <div class="btn-group">
  		<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"  			   		aria-expanded="false">
		<i class="fa fa-file-o"></i> Export <span class="caret"></span>
  		</button>
	  	<ul class="dropdown-menu" role="menu">
			<li><a href="{{ URL::route('get_export_csv_institute') }}"><i class="fa fa-file-excel-o"></i> CSV File</a></li>
			<li><a href="{{ URL::route('get_export_pdf_institute') }}"><i class="fa fa-file-pdf-o"></i> PDF File</a></li>
	  	</ul>
	</div>
	
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

@if(Session::has('success'))
	<div class="alert alert-success">
		<i class="fa fa-check-square-o"></i> {{Session::get('success')}}
	</div>
@endif

	<table class="table table-striped">
		<tr><th><input type="checkbox" id="selectall"></th><th>Institute</th><th>Action</th><th></th></tr>
		@foreach($rows as $row)
		<tr>
			<td><input type="checkbox" name="id[]" id="id"  value="{{ $row->id }}"></td>
			<td>{{{ $row->name }}}</td>
			<td>
				<a data-target="#confirm-edit" data-toggle="modal" id="{{ $row -> id }}" class="btn btn-success btn-xs" data-href="#">Edit</a>
				
				<a data-href="{{ URL::route('get_delete_institute', array(Crypt::encrypt($row->id)))  }}" data-toggle="modal" data-target="#confirm-delete" href="#" class="btn btn-danger btn-xs">Delete</a>
			<td>
		</tr>
		@endforeach
	</table>
</form>

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
});
</script>

@stop	