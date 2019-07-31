<div class="sidebar-box">
  <h3 class="heading">Categories</h3>
  <ul class="categories">
  	@foreach($info['listCate'] as $key => $cate)
    <li><a href="#">{{ $cate->name_category }} <span>{{ $cate->posts->count() }}</span></a></li>
  	@endforeach
  </ul>
</div>
<!-- END sidebar-box -->