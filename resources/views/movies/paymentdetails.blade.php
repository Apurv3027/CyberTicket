<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>Payment</title>

    <!-- Bootstrap core CSS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="Stylesheet" href="css/app.css">
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

    <div class="container" style="margin-top:15px; margin-left:120px; margin-bottom:40px; ">
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <div class="w-full md:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg"
                    style="border-radius:30px; min-height:550px; background-color:#0C0E10;">
                    <div>
                        <center>
                            <h2 style="font-size:25px;"><b>Payment Summary</b></h2>
                        </center>
                    </div>
                    <div class="mt-4" style="margin-top:50px; margin-left:20px;">
                        <input type="hidden" id="seatnamevalue" name="seatnamevalue"
                            value="{{ $tickets->seatnames }}" />
                        <input type="hidden" id="pricevalue" name="pricevalue" value="{{ $tickets->totalcost }}" />
                        <input type="hidden" id="link" name="link"
                            value="http://127.0.0.1:8000/movies/{{ $datams->getMovie->slug }}/{{ $datams->id }}/select-seats" />
                        <h1 class="block text-sm text-gray-700"
                            style="font-size:22px; font-weight:bolder; margin-bottom:5px;">Seat No.</h1>
                        <h2 class="block text-sm text-gray-700" style="font-size:18px; font-weight:bolder;">
                            {{ $tickets->seatnames }}</h2>
                        <h2 class="block text-sm text-gray-700"
                            style="font-size:18px; margin-top:5px; font-weight:bolder;">({{ $tickets->totalseats }}
                            Tickets)</h2>
                    </div>
                    <div class="mt-4" style="margin-top:20px; margin-left:20px;">
                        <h1 class="block text-sm text-gray-700"
                            style="font-size:22px; margin-right:300px; margin-bottom:5px; font-weight:bolder;">Screen
                            </h2>
                            <h2 class="block text-sm text-gray-700" style="font-size:18px; font-weight:bolder; "
                                id="screenname">{{ $datams->getScreen->screenname }}</h2>
                    </div>
                    <div class="row" style="margin-top:20px; margin-left:5px; margin-right:0px;">
                        <div class="col-sm-2">
                            <h1 class="block text-sm text-gray-700"
                                style="font-size:18px; margin-right:; margin-bottom:5px; font-weight:bolder; text-align: left;">
                                Fees</h2>
                        </div>
                        <div class="col-sm-6"></div>
                        <div class="col-sm-4">
                            <h2 class="block text-sm text-gray-700"
                                style="font-size:18px; margin-right:10px; font-weight:bolder; float:right; text-align:right;">
                                Rs. {{ $tickets->totalcost }}.00</h2>
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px; margin-left:5px; margin-right:0px;">
                        <div class="col-sm-5">
                            <h1 class="block text-sm text-gray-700"
                                style="font-size:18px; margin-right:; margin-bottom:5px; font-weight:bolder; text-align: left;">
                                Booking Charge</h2>
                        </div>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-4">
                            <h2 class="block text-sm text-gray-700"
                                style="font-size:18px; margin-right:10px; font-weight:bolder; float:right; text-align:right;">
                                Rs.<span id="bookingcharge"></span></h2>
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px; margin-left:5px; margin-right:0px;">
                        <div class="col-sm-5">
                            <h1 class="block text-sm text-gray-700"
                                style="font-size:18px; margin-right:; margin-bottom:5px; font-weight:bolder; text-align: left;">
                                GST @18%</h2>
                        </div>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-4">
                            <h2 class="block text-sm text-gray-700"
                                style="font-size:18px; margin-right:10px; font-weight:bolder;  text-align:right;">
                                Rs.<span id="gst"></span></h2>
                        </div>
                    </div>

                    <!--<div class="row" style="margin-top:30px; margin-left:5px; margin-right:0px;">
                    <div class="col-sm-5">
                        <h1 class="block text-sm text-gray-700" style="font-size:20px; margin-right:; margin-bottom:15px; font-weight:bolder; text-align: left;">Coupons</h2>
                    </div>
                </div>
                <div mt-4>
                            <select name="coupons" id="coupons" for="coupons" onchange="jsFunction(this.value);" style="background-color:#1a1a1a; font-size:15px; margin-left:20px; width:50%; height:100%;" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" class="form-control" autocomplete="off" >
                                <option value="" selected></option>
                                @foreach ($coupons as $data)
<option value="{{ $data->name }}">{{ $data->name }}</option>
@endforeach
                            </select>
                </div>

                <div class="row" id="totalrow" style="margin-top:30px; margin-left:5px; margin-right:0px;">
                    <div class="col-sm-6">
                        <h1 class="block text-sm text-gray-700" style="font-size:20px; margin-right:; margin-bottom:5px; font-weight:bolder; text-align: left;"><span id="totaltext"></span></h2>
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <h2 class="block text-sm text-gray-700" style="font-size:20px; margin-right:10px; font-weight:bolder; float:right; text-align:right;"><span id="rs1"></span><span id="totalb"></span></h2>
                    </div>
                </div>

                <div class="row" id="disrow" style="margin-top:30px; margin-left:5px; margin-right:0px;">
                    <div class="col-sm-6">
                        <h1 class="block text-sm text-gray-700" style="font-size:20px; margin-right:; margin-bottom:5px; font-weight:bolder; text-align: left;"><spna id="dis"></span></h2>
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <h2 class="block text-sm text-gray-700" style="font-size:20px; margin-right:10px; font-weight:bolder; float:right; text-align:right;"><span id="rs2"></span><span id="discount"></span></h2>
                    </div>
                </div>-->


                    <div class="row" style="margin-top:30px; margin-left:5px; margin-right:0px;">
                        <div class="col-sm-6">
                            <h1 class="block text-sm text-gray-700"
                                style="font-size:20px; margin-right:; margin-bottom:5px; font-weight:bolder; text-align: left;">
                                Total Payable Amount</h2>
                        </div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4">
                            <h2 class="block text-sm text-gray-700"
                                style="font-size:20px; margin-right:10px; font-weight:bolder; float:right; text-align:right;">
                                Rs.<span id="total"></span></h2>
                        </div>
                    </div>
                    <form action="{{ route('payment') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <center><button type="submit" id="btn" name="btn"
                                        style="margin-top:40px; margin-bottom:0px; margin-left:15px; font-color:#dfscds; font-weight:bolder; border-radius:5px; padding: 7px; font-size: 20px; color:#ffffff; border : 0px; font-family:Nunito, ui-sans-serif, system-ui; outline: none; background-color:#9370DB;">Make
                                        Payment</Button></center>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                        <script src="assets/js/razorpay.js" data-key="{{ env('RAZOR_KEY') }}" data-amount="{{ $tickets->totalpay }}00"
                            data-buttontext="" data-name="Online Movie Ticket Booking" data-description="{{ $datams->getMovie->name }}"
                            data-image="{{ 'assets/images/logo.png' }}" data-prefill.name="{{ Auth::user()->name }}"
                            data-prefill.email="{{ Auth::user()->email }}" data-prefill.contact="{{ Auth::user()->phone }}"
                            data-theme.color="#1a1a1a" id="paymentWidget"></script>
                    </form>
                </div>
                <div class="col-sm-3">
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

        {{-- Set Booking Charge, GST and Total Payable Amount using JS. --}}
        <script src="assets/js/payment.js"></script>


        <script language="text/Javascript">
            cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
            function clearField(t) { //declaring the array outside of the
                if (!cleared[t.id]) { // function makes it static and global
                    cleared[t.id] = 1; // you could use true and false, but that's more typing
                    t.value = ''; // with more chance of typos
                    t.style.color = '#fff';
                }
            }

            $(document).ready(function() {
                $(".toggle-search").click(function() {
                    $(".search-input").toggle();
                });
            });
        </script>
        <script>
            /*jQuery(document).ready(function(){
                jQuery('#coupons').change(function(){
                    const id = document.getElementsByClassName("amount");
                    let amount=$(id[0]).attr('value');
                    let couponst=jQuery(this).val();
                    jQuery.ajax({
                    url:'/changetotalpay',
                        type:'post',
                        data:'totalpay='+amount+'&_token={{ csrf_token() }}'+
                        'couponst='+couponst+'&_token={{ csrf_token() }}',
                        success:function(result){
                            location.reload();
                        }
                    });
              });
              });*/
        </script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            //let link = document.getElementById('link');
            setTimeout(function() {
                //alert('Session Out');
                swal({
                        title: 'Session Ended',
                        text: 'Your Session Has Ended.',
                        icon: 'warning',
                        buttons: "Ok",
                        timer: 10000,
                    })
                    .then(() => {
                        abc();
                    });
            }, 10 * 60 * 1000);

            function abc() {
                //alert('Hii');
                let link = document.getElementById('link');
                window.location = link.value;
            }
        </script>
</body>

</html>
