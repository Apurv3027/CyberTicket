<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>CYBER TICKETZ</title>

    <!-- Bootstrap core CSS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

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
          <a class="navbar-brand" href="{{url('/')}}"><h2><em>CYBER TICKETZ</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>


          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/search')}}">Search</a>
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
              <li >
                @auth
                <li class="nav-item active">
                <a class="nav-link" href="{{url('/user')}}">Profile
                <span class="sr-only">(current)</span>
                </a>
              </li>
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

  <div class="row">
  <div class="col-md-6">
    <div>
      <h2 style="margin-top:60px; margin-left:130px; color:#9370DB;font-size:30px; font-family:Nunito, ui-sans-serif, system-ui;"><b>User Details</b></h2>
    </div>
    <div class="container" style="margin-top:60px; margin-left:150px;">
        <div class="row" style="margin-bottom:20px;">
          <h5 style="margin-right:10px;">Name :</h5>
          <h5>{{$data->name}}</h5>
        </div>

        <div class="row" style="margin-bottom:20px;">
          <h5 style="margin-right:10px;">Email :</h5>
          <h5>{{$data->email}}</h5>
        </div>

        <div class="row" style="margin-bottom:20px;">
          <h5 style="margin-right:10px;">Phone No. :</h5>
          <h5>{{$data->phone}}</h5>
        </div>

        <div class="row">
          <h5 style="margin-right:10px;">City :</h5>
          <h5>{{$data->city}}</h5>
        </div>
    </div>
  </div>
  <div class="col-md-1"></div>
    <div class="col-md-3" style="margin-top:60px; margin-right:0px;">
      <div class="container" style="margin-top:20px; margin-left:150px;">
        <a style="color:white;" href="http://127.0.0.1:8000/user/profile"><button style="outline: none; margin-top:80px; margin-left:90px; font-color:#dfscds; border-radius:5px; padding-left:30px; padding-right:30px;padding-top: 7px; padding-bottom: 7px; font-size: 20px; color:#ffffff; border : 0px; font-family:Nunito, ui-sans-serif, system-ui; background-color:#9370DB;"><b>Settings</b></Button></a><br><br><br>
        <form method="POST" action="{{ route('logout') }}"><button style=" outline: none; margin-top:15px; font-color:#dfscds; margin-left:90px; border-radius:5px; padding: 7px; font-size: 20px; color:#ffffff; border : 0px; font-family:Nunito, ui-sans-serif, system-ui; background-color:#9370DB;">
          @csrf
            <x-jet-dropdown-link href="{{ route('logout') }}" style="color:white; font-weight: bold;"
              onclick="event.preventDefault();
              this.closest('form').submit();">
              {{ __('Log Out') }}
            </x-jet-dropdown-link>
          </button>
        </form>
      </div>
    </div>
    <div class="col-md-3"></div>
</div>

  <div class="row">
    <h2 style="margin-top:60px; margin-left:140px; color:#9370DB; font-size:30px; font-family:Nunito, ui-sans-serif, system-ui;"><b>History</b></h2>
  </div>


    @foreach($tickets as $ticket)
      @foreach($datams as $data)
        @if($ticket->movieshowid === $data->id)
        <div class="row" style="margin-top:60px; margin-left:130px;">
          <div class="col-sm-6">
              <h6 class="block text-sm text-gray-700" style="font-size:22px; margin-top:5px; font-weight:bolder;">{{$data->getMovie->moviename}}</h6>
              <h6 class="block text-sm text-gray-700" style="font-size:22px; margin-top:5px; font-weight:bolder;">{{  date("d M, Y", strtotime($ticket->bookingdate))}}</h6>

          </div>
          <div class="col-sm-6">
              <a href="{{url('/bookinghistory',$ticket->id)}}" ><h6 class="block text-sm text-gray-700" style="font-size:22px; margin-right:150px; margin-top:5px; color:#9370DB; text-decoration:none; float:right; font-weight:bolder;">See Tickets <i class="fa fa-angle-right"></i></h6></a>
              @if(date("d M, Y", strtotime($ticket->getMovieshow->showdate)) == date('d M, Y'))
                @if(date("H:i:s",strtotime($ticket->getMovieshow->showtime)) >= date('H:i:s'))
                  <a href="{{url('/cancleticket',$ticket->id)}}" ><h6 id="cancleticket" class="block text-sm text-gray-700" style="font-size:22px; margin-right:150px; margin-top:5px; color:#ff3f3f; text-decoration:none; float:right; font-weight:bolder;">Cancel Tickets</h6></a>
                @endif
              @endif
          </div>
        </div>
        @endif
      @endforeach
    @endforeach


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
