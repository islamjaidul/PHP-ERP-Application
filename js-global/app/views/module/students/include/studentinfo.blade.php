@extends('module.students.layout.index')
@section('heading')
	Student Information
@stop

@section('content')
@include('module.students.include.common.delete')
@include('module.students.include.view_studentinfo')
@include('module.students.include.edit_studentinfo')
	<form method="get" action="{{ URL::route('get_delete_selected_studentinfo') }}">
	<div style="float:right" class="btn-group" role="group" aria-label="...">
	  <a href="{{ URL::route('get_new_studentinfo') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
	  
	  <div class="btn-group">
  		<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"  			   		aria-expanded="false">
		<i class="fa fa-file-o"></i> Export <span class="caret"></span>
  		</button>
	  	<ul class="dropdown-menu" role="menu">
			<li><a href="{{ URL::route('get_export_csv_studentinfo') }}"><i class="fa fa-file-excel-o"></i> CSV File</a></li>
			<li><a href="{{ URL::route('get_export_pdf_studentinfo') }}"><i class="fa fa-file-pdf-o"></i> PDF File</a></li>
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
	
	@if($errors->has('address'))
		<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $errors->first('address') }} </div>
	@endif
	
	@if($errors->has('email'))
		<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $errors->first('email') }} </div>
	@endif
	
	@if($errors->has('student_info'))
		<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $errors->first('student_info') }} </div>
	@endif
	
	@if($errors->has('mobile'))
		<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $errors->first('mobile') }} </div>
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
		<tr><th><input type="checkbox" id="selectall"></th><th>Name</th><th>Address</th><th>Mobile</th><th>E-mail</th><th style="padding-left:46px;">Action</th><th></th></tr>
		@foreach($rows as $row)
		<tr>
			<td>
			<input type="checkbox"  name="id[]" id="id"   value="{{ $row->id }}">
			<input type="hidden" class="subinstitute" id="{{ $row->sub_institutionid }}" value="{{ $row->id }}">
			<input style="display:none" type="checkbox" name="delete_img[]" id="deleteimg" value="{{ $row -> student_img }}">
			</td>
			<td>{{{ $row->name }}}</td>
			<td>{{{ $row->address }}}</td>
			<td>{{{ $row->mobile }}}</td>
			<td>{{{ $row->email }}}</td>
			<td>
				<a data-target="#confirm-view" name="{{ $row -> id }}" data-toggle="modal" id="{{ $row -> sub_institutionid }}"  data-href="#" class="btn btn-info btn-xs">View</a>
				<a data-target="#confirm-edit" name="{{ $row -> countryid }}" lang="{{ $row -> visa_type }}" title="{{ $row -> sub_institutionid }}"  data-toggle="modal" id="{{ $row -> id }}" class="btn btn-success btn-xs" data-href="#">Edit</a>
				
				<a data-href="{{ URL::route('get_delete_studentinfo', array(Crypt::encrypt($row->id), $row->student_img)) }}" data-toggle="modal" href="#" data-target="#confirm-delete" class="btn btn-danger btn-xs">Delete</a>
			<td>
		</tr>
		@endforeach
	</table>
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
			$(this).parents("tr").find("#deleteimg").prop("checked", true);
		}
		else
		{
			$(this).parents("tr").find("#deleteimg").prop("checked", false);
		}
	});
	
	$('.btn-info').click(function() {
		var id = $(this).attr("name");
		var subinstitute = $(this).attr("id");
		$.post("{{ asset('ajax/view_studentinfo.php')}}", {id: id, subinstitute: subinstitute}, function(data){
			$("#body").html(data);
		});
	});
	
	$(".btn-success").click(function(){
		var id = $(this).prop("id");
		var countryid = $(this).prop("name");
		var instituteid = $(this).prop("title");
		var visa = $(this).prop("lang");
		$.post("{{ asset('ajax/edit_studentinfo.php') }}", {id: id}, function(data){
			$("#studentinfo").html(data);
		});
		$.post("{{ asset('ajax/edit_studentinfo2.php') }}", {countryid: countryid}, function(data){
			$("#country").html(data);
		});
		$.post("{{ asset('ajax/edit_studentinfo3.php') }}", {instituteid: instituteid, visa: visa}, function(data){
			$("#institute").html(data);
		});
	});
});
</script>
@stop	