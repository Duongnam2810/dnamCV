<section class="site-section pt-5 pb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <div class="owl-carousel owl-theme home-slider">
            @foreach($topPosts as $key => $p)
              <div>
                <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url('{{ URL::to('/') }}/upload/images/{{ $p['avatar'] }}'); ">

                  <div class="text half-to-full">
                    <span class="category mb-5">{{ $p['name_category'] }}</span>

                    <div class="post-meta">
                      <span class="author mr-2">{{ $p['username'] }}</span>&bullet;
                      <span class="mr-2">{{ $p['publish_date'] }}</span> &bullet;
                    </div>

                    <h3>{{ $p['title'] }}</h3>
                    <p>{!! $p['spao'] !!}</p>
                  </div>
                </a>
              </div>
            @endforeach
            </div>
            
          </div>
        </div>
        
      </div>


    </section>
    <!-- END section -->