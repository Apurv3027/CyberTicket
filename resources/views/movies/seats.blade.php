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

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="css/seats.css">

  </head>
  <body>

  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

<div class="container" style="padding-top:20px; border-bottom:1px solid#9370DB; padding-bottom:10px;">
  <div class="row">
    <h2 style="padding-top:0px; font-size: 20px;">{{$movies->moviename}}</h2>
  </div>
  <div class="row">
    <h2 style="padding-top:0px; font-size: 20px;"></</h2>
    <h2 style="padding-top:0px; font-size: 20px;">{{$datams->getMultiplex->name}}{{  date(", d M,", strtotime($datams->showdate))}}{{  date(" g:i A", strtotime($datams->showtime))}}</h2>
  </div>
</div>

<div>
  <ul class="showcase">
      <li>
        <div class="seattext"></div>
        <h5 style="padding-left:10px; font-size:15px;">Available</h5>
      </li>

      <li>
        <div class="seattext selectedtext"></div>
        <h5 style="padding-left:10px; font-size:15px;">Selected</h5>
      </li>

      <li>
        <div class="seattext soldtext"></div>
        <h5 style="padding-left:10px; font-size:15px;">Sold</h5>
      </li>
  </ul>

    <div class="container">
      <div class="exit">Exit</div>
      <div class="screen"></div>
      <div class="entry">Entry</div>
    </div>

    <div class="container">
      <div>
        <input id="price" name="price" type="hidden" value="{{$datams->normalprice}}">
        <input id="seatname" name="seatname" type="hidden" value="{{$seatname}}">
      </div>
    <div class="row" style="border-bottom:2px solid #fff; margin-bottom:10px; justify-content: center; align-items: center;">
      <h6>Normal - ₹ {{$datams->normalprice}}.00</h6>
    </div>
    
    <div class="row"> 
      <div class="letter">A</div>
      @for($i=1;$i<=20;$i++)
        <div class="seat" name="A-{{$i}}" value="{{$datams->normalprice}}" >{{$i}}</div>
      @endfor
      <div class="letterRight">A</div>
    </div>

    <div class="row"> 
      <div class="letter">B</div>
      @for($i=1;$i<=20;$i++)
            <div class="seat" name="B-{{$i}}" value="{{$datams->normalprice}}" style="margin-bottom:20px;">{{$i}}</div>
      @endfor
      <div class="letterRight">B</div>
    </div>

    <div class="row" style="border-bottom:2px solid #fff; margin-bottom:10px; justify-content: center; align-items: center;">
      <h6>Executive - ₹ {{$datams->executiveprice}}.00</h6>
    </div>

    <div class="row"> 
      <div class="letter">C</div>
      @for($i=1;$i<=20;$i++)
            <div class="seat" name="C-{{$i}}" value="{{$datams->executiveprice}}" >{{$i}}</div>
      @endfor
      <div class="letterRight">C</div>
    </div>

    <div class="row"> 
      <div class="letter">D</div>
      @for($i=1;$i<=20;$i++)
            <div class="seat" name="D-{{$i}}" value="{{$datams->executiveprice}}" >{{$i}}</div>
      @endfor
      <div class="letterRight">D</div>
    </div>

    <div class="row">  
      <div class="letter">E</div>    
      @for($i=1;$i<=20;$i++)
            <div class="seat" name="E-{{$i}}" value="{{$datams->executiveprice}}" >{{$i}}</div>
      @endfor
      <div class="letterRight">E</div>
    </div>

    <div class="row">     
      <div class="letter">F</div>  
      @for($i=1;$i<=20;$i++)
          <div class="seat" name="F-{{$i}}" value="{{$datams->executiveprice}}" >{{$i}}</div>
      @endfor
      <div class="letterRight">F</div>
    </div>

    <div class="row"> 
      <div class="letter">G</div>     
      @for($i=1;$i<=20;$i++)
            <div class="seat" name="G-{{$i}}" value="{{$datams->executiveprice}}" >{{$i}}</div>
      @endfor
      <div class="letterRight">G</div>
    </div>
    <div class="row">   
      <div class="letter">H</div>   
      @for($i=1;$i<=20;$i++)
            <div class="seat" name="H-{{$i}}" value="{{$datams->executiveprice}}" style="margin-bottom:20px;">{{$i}}</div>
      @endfor
      <div class="letterRight">H</div>
    </div>

    <div class="row" style="border-bottom:2px solid #fff; margin-bottom:10px; justify-content: center; align-items: center;">
      <h6>Premium - ₹ {{$datams->premiumprice}}.00</h6>
    </div>
    <div class="row">
      <div class="letter">I</div>
      @for($i=1;$i<=20;$i++)
            <div class="seat" name="I-{{$i}}" value="{{$datams->premiumprice}}" >{{$i}}</div>
      @endfor
      <div class="letterRight">I</div>
    </div>

    <div class="row">    
      <div class="letter">J</div>  
      @for($i=1;$i<=22;$i++)
            <div class="seat" name="J-{{$i}}" value="{{$datams->premiumprice}}" style="margin-left: 3px; margin-right: 3px;">{{$i}}</div>
      @endfor
      <div class="letterRight">J</div>
    </div>

    <!-- <form method="POST" action="{{url('/uploadticketdetails',$datams->id)}}"> -->
    <form method="POST" action="{{url('/uploadticketdetails',$datams->id)}}">
      @csrf
      <div>
      <span id="count" name="count" style="display:none;"></span>
        <input id="counti" name="counti" type="hidden"></input>
        <span id="seatnames" name="seatnames" style="display:none;"></span>
        <input id="seatnamei" name="seatnamei" type="hidden"></input>
        <input id="totalpay" name="totalpay" type="hidden"></input>
      </div>
      <div style="justify-content: center; align-items: center;">
        <a style="color:white; width:20%; margin:40% 40%;">
          <button type="submit" name="btn" id="btn" style="margin-top:15px; font-color:#dfscds; outline: none; border-radius:5px; padding: 7px; font-size: 20px; color:#ffffff; border : 0px; font-family:Nunito, ui-sans-serif, system-ui; background-color:#9370DB;">
            <b>Pay ₹ <span id="total">0</span></b>
          </Button>
        </a>
        <input type="hidden" id="totali" name="totali">
      </div>
    </form>
  </div>


    
    


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/seats.js" type="text/Javascript"></script>

    <script>
      window.onload = function() {
        var successMessage = "{{ session('success') }}";
        if (successMessage) {
          setTimeout(function() {
            var alertBox = document.querySelector('.alert');
            if (alertBox) {
              alertBox.style.display = 'none';
            }
          }, 3000); // Hide the alert after 3 seconds (3000 milliseconds)
        }
      };
    </script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; 
      function clearField(t){                   
      if(! cleared[t.id]){                      
          cleared[t.id] = 1;  /
          t.value='';         
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
    /*
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }*/
  </script>
  </body>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>

//$('.btn').on('click', function (event) {
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      swal({
      //title: "Login!",
      text: "You Have To Login First!",
      type: "warning",
      //icon: "warning";
      icon: 'warning',
      buttons: ["Cancel", "Ok"],
      dangerMode: true,
      //confirmButtonText: "Warning"
      }).then(function(value) {
        if (value) {
            window.location.href = "{{ route('login') }}";
        }
      });
    }
//});
</script>
</html>