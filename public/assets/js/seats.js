const seat = document.querySelector(".seat");
const count = document.getElementById('count');
const total = document.getElementById('total');
const totali = document.getElementById('totali');
const totalpay = document.getElementById('totalpay');
const counti = document.getElementById('counti');
const seatnamei = document.getElementById('seatnamei');
const container = document.querySelector('.container');
const seats = document.querySelectorAll('.row .seat:not(.sold');
const price = document.getElementById('price');
const seatnames = document.getElementById('seatnames');
const seatselected = document.querySelector(".seat .selected");
const ticketname = document.getElementById('seatname');
//var totalprice = 0;


$( ".seat" ).click(function() {
    if(this.classList.contains('seat') && !this.classList.contains('sold'))
    {
      $(this).toggleClass('seat');
      $(this).toggleClass('seat selected');
      updateSelectedCount();
    }
});

function updateSelectedCount()
{
  var totalprice = 0;
  var charges = 0;
  var seatname = '';
  const button = document.querySelector('btn');
  const id = document.getElementsByClassName("seat selected");
  var counting = id.length;
  for(var i=0;i<counting;i++)
  {
    var price = $(id[i]).attr('value');
    totalprice = totalprice + parseInt(price);
    seatname = seatname + $(id[i]).attr('name') + ',';
  }

  total.innerText = totalprice;
  count.innerText = counting;
  var n=seatname.lastIndexOf(",");
  var a=seatname.substring(0,n) 
  seatnames.innerText = a;
  counti.value = count.innerText;
  totali.value = total.innerText;
  seatnamei.value = seatnames.innerText;
  charges = parseFloat(total.innerText * 18.88 /100).toFixed(2);
  totalpay.value =  parseInt(parseFloat(total.innerText) + parseFloat(charges)).toFixed(0);
  //seatnames.innerText += selectedSeats.tagName;
  if(id.length > 0)
  {
    $("#btn").attr("disabled", false);
  }
}

function startSold() 
{
  var ticketn = ticketname.value;
  var chars = ticketn.split(/\s*[\s,]\s*/);
  const id = document.getElementsByClassName("seat");
  
  var counting = id.length;
  //alert(chars);
  for(var i=0;i<counting;i++)
  {
    var seatn = $(id[i]).attr('name');
    
    for(var j=0;j<chars.length;j++)
    {
      var charsm = chars[j];
      
      if(seatn === charsm)
      { 
        $(id[i]).toggleClass('sold');
      }
    }
  }
  $("#btn").attr("disabled", true);  
}

startSold();
