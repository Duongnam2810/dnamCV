@extends('test-layout')
@section('content')
	<h3>Sign in</h3>
	<form action="{{ route('handleSignin') }}" method="POST">
		@csrf
		<input type="text" name="user" id="user" placeholder="  Your user">
		<br><br>
		<input type="password" name="pass" id="pass" placeholder="  Your password">
		<br><br>
		<input type="checkbox" name="remember" id="remember">
		<label for="remember">Remember</label>
		<br><br>
		<button name="btnSignin" id="btnSignin">Sign In</button>
	</form>
@endsection	
