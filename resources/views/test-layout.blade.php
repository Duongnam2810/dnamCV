<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Layout Master View - Template</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	{{-- (doi. cho` cac' ma~ css dc dinh. nghia o cac file template con se duoc. day ra ngoai nay (chi dung` cho 1 file)) --}}
	@stack('stylesheets')

</head>
<body>
	<div class="container">
		@include('partials.header')

		@include('partials.navbar')
		
		@yield('content')

		@include('partials.footer')

		{{-- (dung` chung cho tat ca file (home|about|..)) --}}
		{{-- <script type="text/javascript" src="{{ asset('js/demo.js') }}"></script> --}}

		{{-- (doi. cho` cac' ma~ js dc dinh. nghia o cac file template con se duoc. day ra ngoai nay (chi dung` cho 1 file home/index)) --}}
		@stack('script')
	</div>
</body>
</html>