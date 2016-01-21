@extends('layout.master')

@section('page')
	@include('partials.header') 

	<div class="container">
		<div class="loginbox">
			
			
			
			{!! Form::open(['url' => '/auth/login', 'method' => 'post' ]) !!}
			
			<h1>Login</h1>

			<div class="group">
				{!! Form::label('email', 'Email') !!}
				{!! Form::email('email', null, ['class' => 'form-control']) !!}
			</div>

			<div class="group">
				{!! Form::label('password', 'Password') !!}
				{!! Form::password('password', ['class' => 'form-control']) !!}
			</div>

			<div class="group">
				{!! Form::submit('Login', ['class' => 'btn']) !!}
			</div>
			{!! Form::close() !!}

		</div>
	</div>


@stop