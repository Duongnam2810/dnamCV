<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>demo View Laravel</title>
	<link rel="stylesheet" href="">
</head>
<body>
	{{-- comment laravel --}}
	<form action="{{ route('handleLogin') }}" method="post">
		{{-- *** --}}
		@csrf
		{{-- bat buoc phai them vi method khong phai la get --}}
		{{-- *** --}}
		<label for="user">User</label>
		<input type="text" name="user" id="user">
		<br><br>
		<label for="pass">Pass</label>
		<input type="password" name="pass" id="pass">
		<br><br>
		<button type="submit">Login</button>
	</form>
</body>
</html>