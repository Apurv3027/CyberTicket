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

  
  <div class="container" style="margin-top:40px; margin-left:0px; margin-bottom:40px;">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-6">
            <div class="w-full md:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg" style=" border-radius:30px; min-height:550px;  background-color:#0C0E10;">
            <div>
              <center><h2 style="padding-top:0px; font-size: 35px;">{{$movies->moviename}}</h2></center>
            </div>
      
      @foreach($language as $language)
        
        <div class="row">
          <h2 style="margin-top:30px; margin-left:40px; border-radius:5px; padding: 7px; font-size: 30px;">{{$language->showlang}}</h2>  
        </div>
        
        <div class="row" style="margin-left:20px;">
        @foreach($type as $typea)
          @foreach($datams->where('showlang',$language->showlang)->where('showtype',$typea->showtype) as $datam)
          <a href="{{url('movies/'.$movies->slug.'/'.$movies->id.'/'.$datam->showlang.'/'.$datam->showtype.'/'.$ldate.'/book-tickets')}}"><h2 style="margin-top:15px; margin-bottom:20px; margin-left:20px; background-color:#fff; border-radius:5px; padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 10px; font-size: 15px; color:#008002;">{{$datam->showtype}}</h2></a> 
          @break
            
          @endforeach
        @endforeach
        </div>
        
      @endforeach
      </div>
      <div class="col-sm-2">
            </div>

            <div>
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