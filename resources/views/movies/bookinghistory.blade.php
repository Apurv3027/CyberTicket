<!DOCTYPE html>
<html lang="en">

  <head>

    <base href="/public" >
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


    <div class="container" style="margin-top:40px; margin-left:120px; margin-bottom:40px;">
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <div class="w-full md:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg" style="background-color:#0C0E10; border-radius:30px; margin-top:25px;">
                    <div>
                        <center><h2 style="font-size:25px;"><b>Booking Confirmed</b></h2></center>
                    </div>
                    <div class="row" style="margin-right:20px; margin-left:20px;">
                        <div class="col-sm-8">
                            <div class="mt-4" style="margin-top:50px; margin-left:0px;">
                                <input type="hidden" id="seatnamevalue" name="seatnamevalue" value="{{$tickets->seatnames}}"/>
                                <h1 class="block text-sm text-gray-700" style="font-size:22px; font-weight:bolder; margin-bottom:5px;">{{$datams->getMovie->moviename}}</h1>
                            </div>
                            <div class="row" style="margin-top:10px; margin-left:0px;">
                                <h2 class="block text-sm text-gray-700" style="font-size:16px; font-weight:; margin-right:10px;" id="screenname">{{$datams->getMovie->rating}}</h2>
                                <h2 class="block text-sm text-gray-700" style="font-size:16px; font-weight:; margin-right:10px;" id="screenname">{{$datams->showlang}}</h2>
                                <h2 class="block text-sm text-gray-700" style="font-size:16px; font-weight:; margin-right:10px;" id="screenname">{{$datams->getMovie->length}}</h2>
                                <h2 class="block text-sm text-gray-700" style="font-size:16px; font-weight:; " id="screenname">{{$datams->showtype}}</h2>
                            </div>

                            <div class="row" style="margin-top:20px; margin-left:0px;">
                                <h2 class="block text-sm text-gray-700" style="font-size:18px; font-weight:; margin-right:10px;" id="screenname">{{$datams->getMultiplex->name}}</h2>
                            </div>

                            <div class="row" style="margin-top:20px; margin-left:0px;">
                                <h2 class="block text-sm text-gray-700" style="font-size:16px; font-weight:; margin-right:10px;" id="screenname">{{  date("l, d M", strtotime($datams->showdate))}}</h2>
                            </div>
                            <div class="row" style="margin-top:10px; margin-left:0px;">
                                <h2 class="block text-sm text-gray-700" style="font-size:18px; font-weight:bolder; margin-right:10px;" id="screenname">{{  date("g:i A", strtotime($datams->showtime))}}</h2>
                            </div>
                        </div>
                        <div class="col-sm-4" style="margin-right:0px;">
                            <div class="product-item" style="border-radius:10px; margin-top:40px; border: 3px solid #0C0E10; float:right; margin-bottom: 20px; width: 100px; height: 140px;">
                            <img src="{{ asset('moviesimage/'. $datams->getMovie->image) }}" alt="" style="width: 100px; height: 140px; overflow: hidden; border-radius: 10px;">
                        </div>
                        </div>
                    </div>
                    <div>
                    <center><h2 class="block text-sm text-gray-700" style="font-size:16px; font-weight:;" id="screenname">- - - - - - - SCAN QR CODE AT CINEMA - - - - - - -</h2></center>
                    </div>

                    <div class="row" style="margin-right:20px; margin-left:20px;">
                        <div class="col-sm-8">
                            <div class="mt-4" style="margin-top:20px; margin-left:0px;">
                                <h1 class="block text-sm text-gray-700" style="font-size:16px; margin-right:300px; margin-bottom:5px; font-weight:bolder;">SCREEN</h2>
                                <h2 class="block text-sm text-gray-700" style="font-size:18px; font-weight:bolder; " id="screenname">{{$datams->getScreen->screenname}}</h2>
                            </div>
                            <div class="mt-4" style="margin-top:50px; margin-left:0px;">
                                <h1 class="block text-sm text-gray-700" style="font-size:16px; font-weight:bolder; margin-bottom:5px;">Seats</h1>
                                <h2 class="block text-sm text-gray-700" style="font-size:18px; font-weight:bolder;">{{$tickets->seatnames}}</h2>
                                <h2 class="block text-sm text-gray-700" style="font-size:18px; margin-top:5px; font-weight:bolder;">({{$tickets->totalseats}} Tickets)</h2>
                            </div>
                        </div>

                        <div class="col-sm-4" style="margin-right:0px;">
                                <div class="product-item" style="border-radius:10px; margin-top:25px; border: 3px solid #0C0E10; float:right; margin-bottom: 20px; width: 120px; height: 120px;">
                                <img src="{{ ('assets/images/QrCode.png') }}" alt="" style="width: 120px; height: 120px; overflow: hidden; border-radius: 10px;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
        <div style="margin-left:210px;">
          <a href="{{url('downloadPDF/'.$tickets->id)}}"><i class="fa fa-download" style="margin-right:0px; margin-top:40px; display:block; font-size:36px; color:white;"></i></a>
        </div>
    </div>

</div>
















  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



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
    <script src="assets/js/paymentdone.js"></script>


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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>

//$('.btn').on('click', function (event) {
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      swal({
      //title: "Login!",
      text: "Mail Sent Successfully!",
      type: "success",
      //icon: "warning";
      icon: 'success',
      //confirmButtonText: "Warning"
      });
    }
//});
</script>


  </body>

</html>
