<!DOCTYPE html>

<head>

	<!-- Basics -->
	
	<meta charset="utf-8">
	
	
	<title>Login</title>

	<!-- CSS -->
	
	<link rel="stylesheet" href="css/reset.css">
	
	<link rel="stylesheet" href="css/styles.css">
	 
	
</head>

	<!-- Main HTML -->
	
<body>
	
	<!-- Begin Page Content -->
	
           				@if($errors->has('username'))
							<div class="error">{{ $errors->first('username') }}</div>
						@endif	
						@if($errors->has('password'))
							<div class="error">{{ $errors->first('password') }}</div>
						@endif
						@if(Session::has('global'))
							<div class="error">{{ Session::get('global') }}</div>	
						@endif	
	<div id="container">
		<p style="color:#333399; margin:10px 0 -12px 15px; font-size:18px;">Login to JS-Global</p>
		<form name="form1" method="post" action="{{ URL::route('post_login') }}">
		
		<label for="name">Username:</label>
		
		<input type="name" name="username" id="username">
		
		<label for="username">Password:</label>
		
		<!--<p><a href="#">Forgot your password?</a>-->
		
		<input type="password" name="password" id="password">
		
		<div id="lower">
		
		<input type="checkbox" name="remember" id="remember"><label class="check" for="checkbox">Remember me</label>
		
		<input type="submit" value="Login" name="submit">
		
		</div>
		
		{{ Form::token() }}
		
		</form>
		
	</div>
	
	
	<!-- End Page Content -->
	
</body>

</html>
	
	
	
	
	
		
	