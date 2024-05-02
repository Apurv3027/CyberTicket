<!-- Upcoming -->
<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
            <div class="row">
              <h2 class="col-sm-7">Upcoming Movies</h2>
              <h2 class="col-sm-2"></h2>
              <h6 class="col-sm-3"><a style="margin-top:15px; font-size:16px; font-family: Nunito, ui-sans-serif, system-ui; text-transform: none; font-weight: 600;"href="{{url('/upcomingmovies')}}">View All Movies <i class="fa fa-angle-right"></a></i></h6>
            </div>
          </div>
        </div>

          @foreach($datam as $data)

          <div class="col-md-3">
            <div class="product-item">
              <a href="{{url('upcomingmovies/'.$data->slug)}}">
                <img src="{{ asset('moviesimage/'. $data->image) }}" alt="">
                <div class="down-content">
                  <h4>{{$data->moviename}}</h4>
                </div>
              </a>
            </div>
          </div>

          @endforeach

        </div>
      </div>  
    </div>
  </div>
</div>