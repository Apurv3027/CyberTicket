const amount = document.getElementById("amount");
const link = document.getElementById("link");

startSold();

/*setTimeout(function() {
    alert("Session Out!!");
    window.location = link.value;
    }, 10*60*1000);*/

function startSold() {
    //const seatnames = document.getElementById('seatnames');
    const fees = document.getElementById("fees");
    const gst = document.getElementById("gst");
    const bookingcharge = document.getElementById("bookingcharge");
    const total = document.getElementById("total");
    //var seatname = seatnamevalue.value;
    var totalcost = pricevalue.value;
    //var n=seatname.lastIndexOf(",");
    //var a=seatname.substring(0,n)
    //seatnames.innerText = a;
    bookingcharge.innerText = parseFloat((totalcost * 15) / 100).toFixed(2);
    gst.innerText = parseFloat((bookingcharge.innerText * 18) / 100).toFixed(2);
    var a1 = parseFloat(bookingcharge.innerText);
    var a2 = parseFloat(gst.innerText);
    total.innerText = parseFloat(
        parseFloat(totalcost) + parseFloat(a1) + parseFloat(a2)
    ).toFixed(2);
}
