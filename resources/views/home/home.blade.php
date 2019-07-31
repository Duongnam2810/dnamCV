@extends('test-layout')

@section('content')
<div class="row py-5 bg-info">
	<div class="col-xl-12 col-lg-12">
		<h4>This is Home page</h4>
		<p>Name : {{ $name }}</p>
		<p>Phone : {{ $phone }}</p>
		<p>Age : {{ $age }}</p>
	</div>
</div>
@endsection