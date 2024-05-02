<script language = "text/Javascript"> 
  const seatnames = document.getElementById('seatnames');
    var seatname = seatnamevalue.value;
    var n=seatname.lastIndexOf(",");
    var a=seatname.substring(0,n) 
    seatnames.innerText = a;
</script>

<body style="bg-color:#1a1a1a;">
<div>
    <table style="margin-left: auto; margin-right: auto; margin-bottom:20px;">
        <tr> 
            <th style="float:center; font-size: 40px">{{$datams->getMovie->moviename}}</th>
        </tr>
    </table>
    <table style="margin-left: auto; margin-right: auto; margin-bottom:20px;">
      <tr>
        <td><img src="{{ public_path('moviesimage/'. $datams->getMovie->image) }}"  style="width: 200px; height: 250px; overflow: hidden; border-radius: 10px; float:center;">
      </tr>
    </table>
    <table style="margin-top:280px;">
      <tr>
                <td style="padding: 0px;padding-right: 7px;font-size: 25px ;margin: 30px;">{{$datams->getMovie->rating}}</td>
                <td style="padding: 7px;font-size: 25px;margin: 30px;">{{$datams->showlang}}</td>
                <td style="padding: 7px;font-size: 25px;margin: 30px;">{{$datams->getMovie->length}}in</td>
                <td style="padding: 7px;font-size: 25px;margin: 30px;">{{$datams->showtype}}</td>
      </tr>
    </table>
    <br>
    <table style="margin-bottom:-200px">
        <tr>
           <td ><img src="{{ ('assets/images/direction.jpg') }}" style="width: 30px; height: 30px; overflow: hidden"></td>
    </table>
    
    <table>
      <tr>
         <td style="font-size: 25px; padding-left: 50px; ">{{$datams->getMultiplex->name}}</td>
      </tr>
        <tr>
        </tr>
        <br>
        <tr>
            <td style="padding: 3px; font-size: 25px;">{{  date("l, d M", strtotime($datams->showdate))}}</td>
        </tr>
        <tr>
            <td style="padding: 10px;padding-left: 10px; padding-top:-5px; font-size: 40px;font-weight: bold">{{  date("g:i A", strtotime($datams->showtime))}}</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="padding: 5px; padding-left: 0px; font-size: 25px;">Screen</td>
        </tr>
            <td style="padding: 0px;padding-left: 10px; font-size: 20px;font-weight: bold;">{{$datams->getScreen->screenname}}</td>
        </tr>
        <tr>
            <td style="padding: 5px; padding-left: 0px; font-size: 25px;">Seats</td>
        </tr>
            <td style="padding: 0px;padding-left: 10px; padding-bottom: 25px; padding-right:10px; font-size: 20px;font-weight: bold;">{{$tickets->seatnames}}</td>
        </tr>
        </table>
    <table  style="margin-left: auto; margin-right: auto;">
        <tr>
            <th style="font-size: 25px; float:center;">- - - - - - SCAN QR CODE AT CINEMA - - - - - -</th>
        </tr>
        <br>
        <tr>
            <th style="margin-left:auto; margin-right:auto;"><img src="{{ ('assets/images/qr.jpg') }}" alt="" style="width: 150px; height: 150px; overflow: hidden; border-radius: 10px;"></th>
        </tr>
    </table>
</div>
</body>