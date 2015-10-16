<!DOCTYPE html>
<html>
<head>
	<title> Registration Form || Masiur || InfancyIT </title>
</head>
<body>
	{{ Form::open(array('url' => 'register_action')) }}

	<p>
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name') }}
	</p>
	<p>
		{{ Form::label('email', 'Email Address') }}
		{{ Form::text('email') }}
	</p>passord
	<p>
		{{ Form::label('password', 'Password')}}
		{{ Form::password('password') }}
	</p>
	<p>
		{{ Form::label('cpassword', 'Confirm Password') }}
		{{ Form::password('cpassword') }}
	</p>

		{{ Form::submmit('Submit') }}
	{{ Form::close() }}
	



</body>
</html>