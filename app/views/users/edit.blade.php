@extends('layouts.default')
@section('body')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h2>Edit Your Profile</h2>
		{{ HTML::ul($errors->all()) }}
		{{ Form::model($users, array('route' => array('users.update',$users->id), 'method' => 'PUT' )) }}
		<div class="form-group">
			{{ Form::label('first_name','First Name') }}
			{{ Form::text('first_name', null, array('class' => 'form-control' )) }}
		</div>
		<div class="form-group">
			{{ Form::label('last_name', 'Last Name') }}
			{{ Form::text('last_name', null, array('class' => 'form-control' )) }}
		</div>
		<div class="form-group">
			{{ Form::label('email', 'Email Address') }}
			{{ Form::text('email', null , array('class' => 'form-control' )) }}
		</div>
		<div class="form-group">
			{{ Form::label('password', 'New Password') }}
			{{ Form::password('password', array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('password_confirm', 'Confirm New Password') }}
			{{ Form::password('password_confirm', array('class' => 'form-control')) }}
		</div>
		{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
		{{ Form::close()}}
	</div>
</div>
@stop