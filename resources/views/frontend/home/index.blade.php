@extends('frontend.layout')

@section('title', 'Home - blog')
@section('lastest-post', 'Lastest post')
@section('content')

    <div class="row">
      @foreach($lastestPosts as $key => $item)
      <div class="col-md-6">
        <a href="{{ route('fr.detail',['slug'=>$item['slug'], 'id' => $item['id']]) }}" class="blog-entry element-animate" data-animate-effect="fadeIn">
          <img style="max-height: 250px;" src="{{ URL::to('/') }}/upload/images/{{ $item['avatar'] }}" alt="{!! $item['title'] !!}">
          <div class="blog-content-body">
            <div class="post-meta">
              <span class="author mr-2">{{ $item['username'] }}</span>&bullet;
              <span class="mr-2">{{ $item['publish_date'] }}</span> &bullet;
            </div>
            <h2>{!! $item['title'] !!}</h2>
          </div>
        </a>
      </div>
      @endforeach
    </div>

    <div class="row mt-5">
      <div class="col-md-12 text-center">
        {{ $paginate->links() }}
      </div>
    </div>

@endsection    