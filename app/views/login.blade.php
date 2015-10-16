<!DOCTYPE html>
<html>
<head>
	<title>Login page || Masiur || InfancyIT</title>
</head>
<body>
	{{ 	Form::open(array('url' => 'login' )) }}
	<h1>Login Here</h1>

	<!-- if any login errors show them here -->
	<p>
		{{ $errors->first('email') }} 
		{{ $errors->first('password') }}
	</p>
	<p>
		{{ Form::label('email', 'Email Address') }}
		{{ Form::text('email', Input::old('email'), array('placehoder' => 'demo@example.com')) }}
	</p>
	<p>
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password') }}
	</p>

	<p>{{ Form::submit('Submit') }}</p>
	{{ Form::close() }}
	

		


</body>
</html>