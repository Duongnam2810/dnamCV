@extends('test-layout')

@section('content')
	<form action="{{ route('handleSignup') }}" method="POST">
		@csrf
		<h3>Sign Up</h3>
		<input type="text" name="nuser" id="nuser" placeholder="  New User">
		<br><br>
		<input type="password" name="npass" id="npass" placeholder="  New Pass">
		<br><br>
		<input type="email" name="email" id="email" placeholder="  Email">
		<br><br>
		<button name="btnSignup" id="btnSignup">Sign Up</button>
	</form>
@endsection	