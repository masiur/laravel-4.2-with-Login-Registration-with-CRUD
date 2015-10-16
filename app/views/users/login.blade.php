<!-- D:\XAMPP\htdocs\laravel\app/views/users/login.blade.php -->
@extends('layouts.default')
@section('body')
<div class="col-md-4 col-md-offset-4">
<p>
	    {{ $errors->first('email') }}
	    {{ $errors->first('password') }}
	</p>
	<div class="">
	{{ Form::open(array('url' => 'login', 'method' => 'post')) }}
	
	

	{{Form::label('email','Email Address')}}
	{{Form::text('email', null,array('class' => 'form-control'))}}
	{{Form::label('password','Password')}}
	{{Form::password('password',array('class' => 'form-control'))}}
	<br>
	{{Form::submit('Login', array('class' => 'btn btn-primary'))}}
	{{ Form::close() }}
	</div>
</div>
@stop