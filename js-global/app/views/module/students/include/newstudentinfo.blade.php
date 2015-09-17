@extends('module.students.layout.index')
@section('heading')
	Add New
@stop

@section('content')
<style>
.error{color:#FF0000}
</style>

	@if(Session::has('global'))
		<div class="alert alert-success"><i style="font-size:16px" class="fa fa-check-square-o"></i> {{ Session::get('global') }} </div>
	@endif	
	
	<form id="form" name="form1" method="post" enctype="multipart/form-data" action="{{ URL::route('post_new_studentinfo') }}">
	<table class="table table-striped">
	<tr><th><button id="b_information" style="width:300px" class="btn btn-success">Basic Information</button></th><th><button style="width:300px" id="c_information" class="btn btn-success">Contact Information</button></th><th><button style="width:300px" id="f_information" class="btn btn-success">Final Information</button></th></tr>
		<tr>
		<td>
		<input class="form-control" type="text" name="name" id="name" placeholder="Enter the Name"/>
		@if($errors -> has('name'))
		<div class="error"><i class="fa fa-exclamation-triangle"></i> {{ $errors -> first('name') }}</div>
		@endif
		<br/>
		<textarea style="min-height:120px; max-height:120px" class="form-control" name="address"  id="address"placeholder="Enter the Address"></textarea>
		@if($errors -> has('address'))
		<div class="error"><i class="fa fa-exclamation-triangle"></i> {{ $errors -> first('address') }}</div>
		@endif
		<br/>
		<textarea style="min-height:120px; max-height:120px" class="form-control" name="student_info" id="student_info" placeholder="Enter All Result Information"></textarea>
		@if($errors -> has('student_info'))
		<div class="error"><i class="fa fa-exclamation-triangle"></i> {{ $errors -> first('student_info') }}</div>
		@endif
		</td>
		<td id="second">
		<input class="form-control" type="file" name="img" id="img"/>
		@if($errors -> has('img'))
		<div class="error"><i class="fa fa-exclamation-triangle"></i> {{ $errors -> first('img') }}</div>
		@endif
		<br/>
		<input class="form-control" type="text" name="mobile" id="mobile" placeholder="Enter the Mobile Number"/>
		@if($errors -> has('mobile'))
		<div class="error"><i class="fa fa-exclamation-triangle"></i> {{ $errors -> first('mobile') }}</div>
		@endif
		<br/>
		<input class="form-control" type="email" name="email" id="email" placeholder="Enter the Emial" />
		@if($errors -> has('email'))
		<div class="error"><i class="fa fa-exclamation-triangle"></i> {{ $errors -> first('email') }}</div>
		@endif
		<br/>
		
		</td>
		
		<td id="third">
		<select class="form-control" name="visa_type" id="visa">
			<option value="0" selected="selected">Select Visa Type</option>
			<option value="1">Tourist</option>
			<option value="2">Student</option>
		</select>
		@if($errors -> has('visa_type'))
		<div class="error"><i class="fa fa-exclamation-triangle"></i> {{ $errors -> first('visa_type') }}</div>
		@endif
		<br/>
		
		<select class="form-control" name="country" id="country">
			<option value="0" selected="selected">Select Country</option>
			@foreach($country as $country)
				<option value="{{ $country -> cid }}">{{ $country -> cname }}</option>
			@endforeach
		</select>
		@if($errors -> has('country'))
		<div class="error"><i class="fa fa-exclamation-triangle"></i> {{ $errors -> first('country') }}</div>
		@endif
		<br/>
		
		<div id="sinstitute">
		<select class="form-control" name="category" id="category">
			<option value="0" selected="selected">Select Category</option>
			@foreach($category as $category)
				<option value="{{ $category -> iid }}">{{ $category -> institute }}</option>
			@endforeach
		</select>
		<br />
		<select class="form-control" name="subinstitute" id="subinstitute">
			<option value="0" selected="selected">Select Institute</option>
			
		</select>
		@if($errors -> has('subinstitute'))
		<div class="error"><i class="fa fa-exclamation-triangle"></i> {{ $errors -> first('subinstitute') }}</div>
		@endif
		
		<br/>
		</div>
		<input id="btn_submit" style="width:300px" class="btn btn-info" type="submit" value="Submit"/>
		</td>
		</tr>
		</table>
		
		{{ Form::token() }}
		
	</form>
		
@stop

@section('footer')
	<script>
	$(document).ready(function(){
		$("#sinstitute").hide();
		
		$("#b_information").click(function(){
			return false;
		});
		
		$("#c_information").click(function(){
			return false;
		});
		
		$("#f_information").click(function(){
			return false;
		});
		
		$("#visa").change(function(){
			if($(this).val() == 2)
			{
				$("#sinstitute").show();
			}
			else
			{
				$("#sinstitute").hide();
			}
		});
		
		$("#category").change(function(){
			var id = $("#category").val();
			$.post("{{ asset('ajax/ajax.php') }}", {id: id}, function(data){
				$("#subinstitute").html(data);
			});
		});
		
	});
	</script>
@stop	