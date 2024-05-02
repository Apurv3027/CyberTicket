const inp = document.getElementById('inp');
const btng = document.getElementById('btng');

n =  new Date();

const days = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
d = n.getDate();
var daydate = n.getFullYear()+'-'+(("0" + (n.getMonth() + 1)).slice(-2))+'-'+(("0" + n.getDate()).slice(-2));
inp.value = daydate;
sessionStorage.datea = daydate;
g = n.getDay();
let day = days[n.getDay()];
document.getElementById("date").innerHTML = d +"<br>"+ day;

tomorrow = new Date();
tomorrow.setDate(tomorrow.getDate() + 1);
h = tomorrow.getDate();
var tomdate = tomorrow.getFullYear()+'-'+(("0" + (tomorrow.getMonth() + 1)).slice(-2))+'-'+(("0" + tomorrow.getDate()).slice(-2));
let tday = days[tomorrow.getDay()];
document.getElementById("tomm").innerHTML = h +"<br>"+ tday;

dtomorrow = new Date();
dtomorrow.setDate(dtomorrow.getDate() + 2);
ah = dtomorrow.getDate();
var dtomdate = dtomorrow.getFullYear()+'-'+(("0" + (dtomorrow.getMonth() + 1)).slice(-2))+'-'+(("0" + dtomorrow.getDate()).slice(-2));
let dtday = days[dtomorrow.getDay()];
document.getElementById("atom").innerHTML = ah +"<br>"+ dtday;

function updatea()
{
    int = document.querySelector('input[name="options"]:checked');
    var selector = 'label[for=' + int.id + ']';
    var label = document.querySelector(selector);
    var text = label.innerHTML;
    //alert(text);
    let result = text.substring(16, 18);
    if(result == d)
    {
        inp.value = daydate;
        sessionStorage.datea = daydate;
    }
    else if(result == h)
    {
        inp.value = tomdate;
        sessionStorage.datea = tomdate;
    }
    else if(result == ah)
    {
        inp.value = dtomdate;
        sessionStorage.datea = dtomdate;
    }
}

$( ".btn-check" ).click(function() {
    updatea();
});



@if($datam->showlang==$language->showlang && $datam->showtype==$type->showtype  && $date != $ldate)
              <a href="{{url('movies/'.$movies->slug.'/'.$datam->id.'/select-seats')}}"><h2 style="margin-top:15px; margin-left:15px; background-color:#fff; border-radius:5px; padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 10px; font-size: 15px; color:#008002;">{{  date("g:i A", strtotime($datam->showtime)) }}</h2></a>
            


              @if($datam->showlang==$language->showlang && $datam->showtype==$type->showtype && $date != $ldate)
            <h2 style="margin-top:50px; margin-left:0px; border-radius:5px; padding: 7px; font-size: 30px;">{{$multiplex->getMultiplex->name}}</h2> 
            @break



            "name":"Cyber Tickets",
                                                "description":"{{$datams->getMovie->name}}",
                                                "image":"{{ ('assets/images/logo.png') }}",
                                                "prefill"."name":"{{Auth::user()->name}}",
                                                "prefill"."email":"{{Auth::user()->email}}",
                                                "prefill"."contact":"{{Auth::user()->phone}}",
                                                "theme"."color"="#1a1a1a",