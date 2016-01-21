@extends('layout.master')

@section('page')
	@include('partials.header') 
	

	<div class="container">
		<div class="loginbox">

			{!! Form::open(['url' => '/user', 'method' => 'post' ]) !!}
			
			<div class="error">
			{{ session('error') }}
			</div>
			<h1>Register</h1>

			<div class="group">
				{!! Form::label('name', 'Name') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}
			</div>

			<div class="group">
				{!! Form::label('email', 'Email') !!}
				{!! Form::email('email', null, ['class' => 'form-control']) !!}
			</div>

			<div class="group">
				{!! Form::label('password', 'Password') !!}
				{!! Form::password('password', ['class' => 'form-control']) !!}
			</div>

			<div class="group">
				{!! Form::submit('Register', ['class' => 'btn']) !!}
			</div>
			{!! Form::close() !!}

		</div>
	</div>


@stop