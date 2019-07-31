@extends('test-layout')

@section('content')
<div class="row py-5 bg-info">
	<div class="col-xl-12 col-lg-12">
		<h4>This is About page</h4>
		<p>Myage = {{ $myage }}</p>
		<table class="table my-3">
			<thead>
				<tr>
					<th>#</th>
					<th>ID</th>
					<th>Name</th>
					<th>Manufactur</th>
					<th>CC</th>
					<th>Frame number</th>
					<th>Machine number</th>
					<th>Year of manufactur</th>
				</tr>
			</thead>
			<tbody>
				@foreach($name as $key => $item)
					<tr>
						<td>{{ $key + 1 }}</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection