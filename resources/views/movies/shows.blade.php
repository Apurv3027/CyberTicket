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
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>
  <body>

  <div class="container" style="margin-top:40px; margin-bottom:40px;">
   
    
      <div style="margin-left:50px; margin-right:50px;">
      <div class="w-full md:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg" style=" border-radius:30px; min-height:550px; width:100%; background-color:#0C0E10;">


    <center><h2 style="padding-top:0px; font-size: 35px; padding-bottom:15px;">{{$movies->moviename}}</h2></center>
    <center><h6 style="padding-top:0px; font-size: 20px;">{{  date("d M, Y", strtotime($date))}}</h6></center>
    <input id="inp" name="inp" type="hidden"></input>

    <div class="row justify-content-center" style="padding-top:25px; align-content: center; padding-left:0px;">
        <a href="{{url('movies/'.$movieslug.'/'.$movieid.'/'.$showlang.'/'.$showtype.'/'.$ldate.'/book-tickets')}}"><label class="btn btn-secondary" for="option1" style="background-color:#9370DB; border-color:#1a1a1a; width:60px; height:60px; border-radius:5px;">{{  date("d", strtotime($ldate))}}<br>{{date("D", strtotime($ldate))}}</label></a>
        <a href="{{url('movies/'.$movieslug.'/'.$movieid.'/'.$showlang.'/'.$showtype.'/'.$tomorrowdate.'/book-tickets')}}"><label class="btn btn-secondary" for="option2" style="background-color:#9370DB; border-color:#1a1a1a; width:60px; height:60px; border-radius:5px;">{{  date("d", strtotime($tomorrowdate))}}<br>{{date("D", strtotime($tomorrowdate))}}</label></a>
        <a href="{{url('movies/'.$movieslug.'/'.$movieid.'/'.$showlang.'/'.$showtype.'/'.$dtomorrowdate.'/book-tickets')}}"><label class="btn btn-secondary" for="option3" style="background-color:#9370DB; border-color:#1a1a1a; width:60px; height:60px; border-radius:5px;">{{  date("d", strtotime($dtomorrowdate))}}<br>{{date("D", strtotime($dtomorrowdate))}}</label></a>
    </div>

      @foreach($multiplex as $multiplex)
        <div class="row" style="padding-left:10px;">
          @foreach($datams->where('multiplexid',$multiplex->multiplexid) as $datam)
            @if($datam->showlang==$language->showlang && $datam->showtype==$type->showtype && $currentTime <= $datam->showdate.' '.$datam->showtime)
            <h2 style="margin-top:15px; margin-left:30px; border-radius:5px; padding: 7px; font-size: 25px;">{{$multiplex->getMultiplex->name}}</h2>
            @break
            @endif
          @endforeach
        </div>
        <div class="row" style="padding-left:30px;">
          @foreach($datams->where('multiplexid',$multiplex->multiplexid) as $datam)
            @if($datam->showlang==$language->showlang && $datam->showtype==$type->showtype && $currentTime <= $datam->showdate.' '.$datam->showtime)
              <a href="{{url('movies/'.$movies->slug.'/'.$datam->id.'/select-seats')}}"><h2 style="margin-top:15px; margin-bottom:20px; margin-left:20px; background-color:#fff; border-radius:5px; padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 10px; font-size: 15px; color:#008002;">{{  date("g:i A", strtotime($datam->showtime)) }}</h2></a>
            @endif
          @endforeach
        </div>
      @endforeach
      </div>
</div>
</div>
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