@extends('admin.master')

@section('title', 'Create posts')
@push('styles')
<link rel="stylesheet" href="{{ asset('admin/css/multiple-select.css') }}">
@endpush
@push('script')
<script  src="{{ asset('admin/js/post.js') }}"></script>
<script src="{{ asset('admin/js/multiple-select.js') }}"></script>
@endpush
@section('content')

<style type="text/css">
	#tags{
		width:  250px;
	}
</style>

	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
		<h5>Tao bai viet</h5>

		@if ($errors->any())
    		<div class="alert alert-danger">
        		<ul>
            		@foreach ($errors->all() as $error)
                		<li>{{ $error }}</li>
            		@endforeach
        		</ul>
    		</div>
		@endif

		<form action="{{ route('admin.handlePost') }}" method="post" class="mt-3 w-100" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
					<div class="form-group">
						<label for="titlePost">Title</label>
						<input type="text" class="form-control" name="titlePost" id="titlePost">
					</div>

					<div class="form-group">
						<label for="sapoPost">Sapo</label>
						<textarea class="form-control" name="sapoPost" id="sapoPost"></textarea>
					</div>

					<div class="form-group">
						<label for="avatarPost">Avatar</label>
						<input type="file" class="form-control" name="avatarPost" id="avatarPost">
					</div>

					<div class="form-group">
						<label for="contentPost">Content</label>
						<textarea class="form-control" name="contentPost" id="contentPost" rows="5"></textarea>
					</div>

				</div>
				<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
					<div class="form-group">
						<label for="language">Language</label>
						<select class="form-control" name="language" id="language">
							<option value="1">Tieng Viet</option>
							<option value="0">Tieng Anh</option>
						</select>
					</div>

					<div class="form-group">
						<label for="categories">Categories</label>
						<select name="categories" id="categories">
							<option value=""> -- Choose Category --</option>
							@foreach($cate as $key => $items)
								<option value="{{ $items['id'] }}">{{ $items['name_category'] }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="tags">Tags</label>
						<select name="tags[]" id="tags" multiple="multiple">
							@foreach($tag as $key => $value)
								<option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="publish"><b>Publish</b></label>
						<input type="checkbox" class="ml-3" checked="checked" name="publishPost">
					</div>

					<button type="submit" class="btn btn-primary">Save</button>

				</div>
			</div>	
		</form>
	</div>
@endsection