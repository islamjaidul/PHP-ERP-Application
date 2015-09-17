@extends('module.students.layout.index')
@section('heading')
	Setting
@stop

@section('content')
	<div class="row">
		<div class="col-md-6">
			<button style="display:block; width:200px" id="changepass" class="btn btn-default">Change Password</button>
			<br/>
			<button style="display:block; width:200px" href="" id="registration" class="btn btn-default">Registration</button>
		</div>
		<div class="col-md-6">
			<span id="error">  </span>

			<div id="password">
			<div class="panel panel-default">
			<div class="panel-heading">
				Change Password
			</div>
			<div class="panel-body">
			<form>
			<input class="form-control" type="password" name="oldpass" id="oldpass" placeholder="Enter Old Password">
	
			<br />
			<input class="form-control" type="password" name="newpass" id="newpass" placeholder="Enter New Password">
			<br/>
			<input class="form-control" type="password" name="confirmpass" id="confirmpass" placeholder="Confirm New Password">
			<br/>
			<input class="btn btn-primary" type="button" value="Submit">
			</form>
			</div>
			</div>
			</div>
			</div>
			
			<div id="register">
				<h2>There will be Registration System</h2>
			</div>
		</div>
	</div>
@stop

@section('footer')
	<script>
		$(document).ready(function(){
			$("#password").hide();
			$("#register").hide();
	
			$("#changepass").click(function(){
				$("#password").show(1000);
				$("#register").hide();
			});
			
			$("#registration").click(function(){
				$("#register").show(1000);
				$("#password").hide(1000);
			});
			
			$(".btn-primary").click(function(){
				var oldpass = $("#oldpass").val();
				var newpass = $("#newpass").val();
				var confirmpass = $("#confirmpass").val();
				$.post("{{ URL::route('post_change_password') }}", {oldpass: oldpass, newpass: newpass, confirmpass: confirmpass}, function(data){
					$("#error").html(data);
	
				});
			});
			
		});
	</script>
@stop	