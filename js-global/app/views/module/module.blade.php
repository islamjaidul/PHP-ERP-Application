<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<div class="container">
	<div style="text-align:center;margin-top:200px;height:50px;" class="row">
		<h3><u>Welcome to JS-Global ERP</u></h3>
		<a href="{{ URL::route('get_student') }}" class="btn btn-primary">Students</a>
		<a href="" class="btn btn-info">Accounts</a>
		<a href="" class="btn btn-success">HRM</a>
		<a href="{{ URL::route('get_logout') }}" class="btn btn-danger">Logout</a>
	</div>
</div>	