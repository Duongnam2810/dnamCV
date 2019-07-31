@extends('admin.master')

@section('title', 'list posts')

@section('content')
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
		<h4 class="text-left mb-3">Danh sach bai viet</h4>
		<div class="row">
			<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
				<a href="{{ route('admin.createPost') }}" class="btn btn-primary">Dang bai - Viet bai</a>
			</div>

			<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
				<input type="text" id="txtKeyword" class="w-70 h-100 ml-5 float-right" value="{{ $keyword }}">
				<button type="button" class="btn-primary btn float-right" id="btnSearch">Tim kiem</button>
			</div>	
		</div>

		<div class="clearfix"></div>

		<table class="table mt-3">
			<thead>
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Category</th>
					<th>Publish date</th>
					<th colspan="2" width="5%">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($listPosts as $key => $post)
				<tr>
					<td>{{ $post['id'] }}</td>
					<td>
						<h5>{{ $post['title'] }}</h5>
						<p>{!! $post['spao'] !!}</p>
					</td>
					<td>{{ $post['name_category'] }}</td>
					<td>{{ $post['publish_date'] }}</td>
					<td>
						<a href="{{ route('admin.editPost', ['slug' => $post['slug'], 'id' => $post['id']]) }}" class="btn btn-info">Edit</a>
					</td>
					<td>
						<button onclick="deletePost({{ $post['id'] }})" class="btn btn-danger">Del</button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		<div class="row justify-content-center border-top py-3">
			{{-- hien thi. phan trang --}}
			{{-- appends them nhung param query string vao phan trang --}}
			{{ $paginate->appends(request()->query())->links() }}
		</div>

	</div>
@endsection

{{-- code js --}}
@push('script')
<script type="text/javascript">

	$(function(){
		$('#btnSearch').click(function(){
			let keyword = $('#txtKeyword').val().trim();
			if(keyword.length > 0){
				window.location.href = "{{ route('admin.listPost') }}" + "?keyword= " + keyword;
			}
		});
	});


	function deletePost(idPost){
		// alert(idPost);
		// idPost phai la so'
		if(Number.isInteger(idPost)){
			$.ajax({
				url: "{{ route('admin.deletePost') }}",
				type: "post",
				data: {id: idPost},
				success: function(data){
					data = $.trim(data);
					if(data === 'False' || data === 'Error'){
						alert('Xoa khong thanh cong');
					} else if(data === 'OK'){
						alert('Xoa thanh cong');
						window.location.reload(true);
					}
					return false;
				}
			});
		}
	}
</script>
@endpush