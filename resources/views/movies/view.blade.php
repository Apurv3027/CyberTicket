<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public" >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>{{$movies->moviename}}</title>

    <!-- Bootstrap core CSS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="{{url('/')}}"><h2> <em>CYBER TICKETZ</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>


          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/search')}}">Search</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/contactus')}}">Contact Us</a>
              </li>
              @if(Auth::check())
                @if(Auth::user()->role=='1')
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/adminhome')}}">Admin</a>
                </li>
                @else
                @endif
              @endif
              @if (Route::has('login'))
              <li class="nav-item">
                @auth
                <li><a class="nav-link" href="{{url('/user')}}">Profile</a></li>
                @else
                <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @endif
              </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div class="banner header-text">
</div>


<!-- Content -->

        <div class="container" style="padding-top:60px;">
            <div class="row">
                <div class="col-md-3">
                    <div class="product-item" style="border-radius:10px; border: 3px solid #010101; margin-bottom: 20px;">
                        <img src="{{ asset('moviesimage/'. $movies->image) }}" alt="" style="width: 206px; height: 286px; overflow: hidden; border-radius: 10px;">
                    </div>
                </div>
                <div class="col-md-9">
                    <div>
                        <h2 style="padding-top:13px; font-size: 35px;">{{$movies->moviename}}</h2>
                        <div class="row">
                            <h2 style="margin-top:15px; margin-left:15px; border-radius:5px; padding: 7px; font-size: 20px;">{{$movies->type}}</h2>
                            <h2 style="margin-top:15px; margin-left:15px; font-size: 27px;">•</h2>
                            <h2 style="margin-top:15px; margin-left:15px; border-radius:5px; padding: 7px; font-size: 20px;">{{$movies->lang}}</h2>
                            <h2 style="margin-top:15px; margin-left:15px; font-size: 27px;">•</h2>
                            <h2 style="margin-top:15px; margin-left:15px; border-radius:5px; padding: 7px; font-size: 20px;">{{$movies->length}}</h2>
                        </div>
                        <div class="row">
                            <h2 style="margin-top:15px; margin-left:15px; border-radius:5px; padding: 7px; font-size: 20px;">{{$movies->genre}}</h2>
                            <h2 style="margin-top:15px; margin-left:15px; font-size: 30px;">•</h2>
                            <h2 style="margin-top:15px; margin-left:15px; border-radius:5px; padding: 7px; font-size: 20px;">{{$movies->rating}}</h2>
                            <h2 style="margin-top:15px; margin-left:15px; font-size: 30px;">•</h2>
                            <h2 style="margin-top:15px; margin-left:15px; border-radius:5px; padding: 7px; font-size: 20px;">{{  date("d M, Y", strtotime($movies->releasedate))}}</h2>
                        </div>
                        <div class="row">
                            <h2 style="margin-top:15px; margin-left:15px; border-radius:5px; padding: 7px; font-size: 20px;">IMDB :</h2>
                            <h2 style="margin-top:15px; margin-left:0px; border-radius:5px; padding: 7px; font-size: 20px;">{{$movies->imdb}}</h2>
                            <h2 style="margin-top:15px; margin-left:15px; font-size: 30px;">•</h2>
                            <h2 style="margin-top:15px; margin-left:15px; border-radius:5px; padding: 7px; font-size: 20px;">Rotten Tomatoes :</h2>
                            <h2 style="margin-top:15px; margin-left:0px; border-radius:5px; padding: 7px; font-size: 20px;">{{$movies->rt}}%</h2>
                        </div>

                        <div>
                        <a style="color:white;" href="{{url('movies/'.$movies->slug.'/'.$movies->id.'/select')}}"><button style="margin-top:15px; font-color:#dfscds; border-radius:5px; outline: none; padding: 7px; font-size: 20px; color:#ffffff; border : 0px; font-family:Nunito, ui-sans-serif, system-ui; background-color:#9370DB;"><b>Book Tickets</b></Button></a>
                        <a style="color:white; border-color:#9370DB;" href="{{url('movies/'.$movies->slug.'/'.$movies->id.'/trailer')}}"><button style="margin-top:15px; margin-left:15px; outline: none; font-color:#dfscds; border-radius:5px; padding: 7px; font-size: 20px; color:#ffffff; border : 0px; font-family:Nunito, ui-sans-serif, system-ui; background-color:#9370DB;"><b>Watch Trailer</b></Button></a>
                      </div>
                    </div>
                </div>
            </div>
            <div>
                    <h2 style="margin-top:5px; margin-left:25px; border-radius:5px; padding: 7px; font-size: 25px;">About The Movie</h2>
                    <h2 style="color:#DEDEDE; margin-top:5px; margin-left:25px; border-radius:5px; padding: 7px; font-size: 20px;">{{$movies->description}}</h2>
            </div>
            <div>
                    <h2 style="margin-top:20px; margin-left:25px; border-radius:5px; padding: 7px; font-size: 25px;">Cast</h2>
                    <h2 style="color:#DEDEDE; margin-top:5px; margin-left:25px; border-radius:5px; padding: 7px; font-size: 20px;">{{$movies->cast}}</h2>
            </div>
        </div>


	<footer>
  <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12"></div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a class="navbar-brand" href="{{url('/')}}"><h2><em>CYBER TICKETZ</em></h2></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12"></div>
            </div>
        </div>
    </footer>




    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript">
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }

      $(document).ready(function(){
    $(".toggle-search").click(function(){
        $(".search-input").toggle();
    });
});

    </script>
  </body>

</html>
