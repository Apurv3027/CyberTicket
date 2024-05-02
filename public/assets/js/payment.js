const amount = document.getElementById('amount');
const link = document.getElementById('link');

startSold();

/*setTimeout(function() {
    alert("Session Out!!");
    window.location = link.value;
    }, 10*60*1000);*/

function startSold()
{
    //const seatnames = document.getElementById('seatnames');
    const fees = document.getElementById('fees');
    const gst = document.getElementById('gst');
    const bookingcharge = document.getElementById('bookingcharge');
    const total = document.getElementById('total');
    //var seatname = seatnamevalue.value;
    var totalcost = pricevalue.value;
    //var n=seatname.lastIndexOf(",");
    //var a=seatname.substring(0,n) 
    //seatnames.innerText = a;
    bookingcharge.innerText = parseFloat(totalcost * 16 /100).toFixed(2);
    gst.innerText = parseFloat(bookingcharge.innerText * 18 /100).toFixed(2);
    var a1 = parseFloat(bookingcharge.innerText);
    var a2 = parseFloat(gst.innerText);
    total.innerText = parseFloat(parseFloat(totalcost) + parseFloat(a1) + parseFloat(a2)).toFixed(2);
}

/*function onStart()
{
    //var objSelect = document.getElementById("Coupons");
    rs1.innerText = "Rs.";
    rs2.innerText = "- Rs.";
    totaltext.innerText = "Total";
    dis.innerText = "Discount";
    var totalcost = pricevalue.value;
    var a1 = parseFloat(bookingcharge.innerText);
    var a2 = parseFloat(gst.innerText); 
    totalb.innerText = parseFloat(parseFloat(totalcost) + parseFloat(a1) + parseFloat(a2)).toFixed(2);
    //discount.innerText = "0.00";
    total.innerText = totalb.innerText;
    amount.value = parseInt(total.innerText);
}
onStart();

function jsFunction(value)
{
    rs1.innerText = "Rs.";
    rs2.innerText = "- Rs.";
    totaltext.innerText = "Total";
    dis.innerText = "Discount";
    if(value == "")
    {
        var totalcost = pricevalue.value;
        var a1 = parseFloat(bookingcharge.innerText);
        var a2 = parseFloat(gst.innerText); 
        totalb.innerText = parseFloat(parseFloat(totalcost) + parseFloat(a1) + parseFloat(a2)).toFixed(2);
        //discount.innerText = "0.00";
        //total.innerText = totalb.innerText;
        //amount.value = parseInt(total.innerText);
    }
    if(value == "MOVIE100")
    {
        var totalcost = pricevalue.value;
        var a1 = parseFloat(bookingcharge.innerText);
        var a2 = parseFloat(gst.innerText);
        totalb.innerText = parseFloat(parseFloat(totalcost) + parseFloat(a1) + parseFloat(a2)).toFixed(2);
        //discount.innerText = "100.00";
        //total.innerText = (totalb.innerText - discount.innerText).toFixed(2);
        //amount.value = parseInt(total.innerText);
    }
    if(value == "MOVIE25P")
    {   
        var totalcost = pricevalue.value;
        var a1 = parseFloat(bookingcharge.innerText);
        var a2 = parseFloat(gst.innerText);
        totalb.innerText = parseFloat(parseFloat(totalcost) + parseFloat(a1) + parseFloat(a2)).toFixed(2);
        //discount.innerText = (totalb.innerText * 25 /100).toFixed(2);
        //total.innerText = (totalb.innerText - discount.innerText).toFixed(2);
        //amount.value = parseInt(total.innerText);
    }
}*/



