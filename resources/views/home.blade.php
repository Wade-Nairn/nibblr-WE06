@extends('layout.master')

@section('page')
	@include('partials.header')

	@if(Auth::check())
	<div>
		<div ng-view ></div>
	</div>
	@else
	<div class="container flex flex-j-center flex-a-center">
		<div class="loginbox">
			<h3>Welcome to Nibblr</h3>
			<p>Share your recipes</p>
			<p>Create your books</p>
			<p>Make the world a better place through food</p>
			<a href="/register"><button class="btn btn-primary">Sign Up</button></a>
			<p>or</p>
			<a href="/login"><button class="btn btn-primary">Login</button></a>
		</div>
	</div>
	@endif
	
@stop