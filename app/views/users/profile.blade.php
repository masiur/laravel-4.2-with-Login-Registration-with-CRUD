
@extends('layouts.default')
<div class="container">
	<div>
		@if(Auth::check())
		
			<p class="text-center">{{ Auth::user()->first_name }} </p>
			<button class="btn btn-default" ><a href="{{ URL::to('users/' . Auth::user()->id . '/edit') }}">Edit Your Profile</a></button>
			<div class="row" style="text-align: center;">
				<div class="col-md-3">
					<h3><strong>Your Full Name</strong></h3><br>
					<h3><strong>Email</strong></h3>
				</div>
				<div class="col-md-6 col-md-offset-3">
					<h3><strong>{{ Auth::user()->first_name }}  {{ Auth::user()->last_name  }}</strong></h3><br>
					<h3><strong>{{ Auth::user()->email }}</strong></h3>
				</div>
			</div>
			{{ Form::open(array('url' => 'users/' . Auth::user()->id, 'class' => 'pull-right'))}}
				{{ Form::hidden('_method', 'DELETE') }}
				{{ Form::submit('Delete Your Profile', array('class' => 'btn btn-warning')) }}
			{{ Form::close() }}
		
		@endif
	</div>
</div>