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
    <link rel="stylesheet" href="css/app.css">


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

<!--<div class="input-group margin-bottom-40">
<form class="input-group" method="get">
    <div class="input-group-btn">
        <input type="text" name="term" class="form-control" placeholder="Search">
        <span><button type="submit" class="btn" style="background-color:#9370DB"><i class="fa fa-search"></i></button></span>
    </div>
</form>
</div>-->
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item ">
                <a class="nav-link" href="{{url('/')}}">Home
                </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="{{url('/search')}}">Search
                <span class="sr-only">(current)</span>
                </a>
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

  @include("searching")

	<footer id="footer">
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

<script>
    $(document).ready(function() {
        setInterval(function() {
            var docHeight = $(window).height();
            var footerHeight = $('#footer').height();
            var footerTop = $('#footer').position().top + footerHeight;
            var marginTop = (docHeight - footerTop + 10);

            if (footerTop < docHeight)
                $('#footer').css('margin-top', marginTop + 'px'); // padding of 30 on footer
            else
                $('#footer').css('margin-top', '0px');
            // console.log("docheight: " + docHeight + "\n" + "footerheight: " + footerHeight + "\n" + "footertop: " + footerTop + "\n" + "new docheight: " + $(window).height() + "\n" + "margintop: " + marginTop);
        }, 250);
    });
</script>


  </body>

</html>
