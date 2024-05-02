<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ">
            <div class="section-heading">
            <div class="row row-no-padding">
              <h2 class="col-sm-9">Search Movies</h2>

              <div class="col-sm-3" class="input-group">
                <form class="input-group" action="{{url('/search')}}" method="get" >
                    <div class="input-group-btn">
                        <input type="text" name="search" class=" margin-bottom: 15px; border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="search" type="text" name="search"  autocomplete="off" placeholder="Search" />
                        <span><button type="submit" class="btn" style="background-color:#9370DB; height:40px; width:40px;"><i class="fa fa-search"></i></button></span>
                    </div>
                </form>
              </div>
            </div> 
          </div>
        </div>

          @if( $count > 0 )
            @forelse($dataa as $data)

            <div class="col-md-3">
              <div class="product-item">
                <a href="{{url('movies/'.$data->slug)}}">
                  <img src="{{ asset('moviesimage/'. $data->image) }}" alt="">
                    <div class="down-content">
                      <h4>{{$data->moviename}}</h4>
                    </div>
                </a>
              </div>
            </div>
            @empty
              
            @endforelse

            @forelse($datab as $data)

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
            @empty
            @endforelse

          @else
          <p class="text-center" style="padding-left:20px">
              <b style="font-size:25px">No Results Found for Search: {{request()->query('search')}}</b>
            </p>
          @endif
          

        </div>
      </div>  
    </div>
  </div>
</div>