<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\MovieController;

use App\Http\Controllers\PaytmController;

use App\Http\Controllers\RazorpayController;

use App\Http\Controllers\PaymentController;

use App\Http\Controllers\DownloadController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
 ///   return view('home');
//});

route::get('/',[HomeController::class,"index"]);

route::get('/search',[HomeController::class,"search"]);

//route::get('/trailer',[HomeController::class,"trailer"]);

route::get('/home',[HomeController::class,"redirects"]);

route::get('/user',[HomeController::class,"user"]);

route::get('/bookinghistory/{id}',[HomeController::class,"bookinghistory"]);

route::get('/cancleticket/{id}',[HomeController::class,"cancleticket"]);

route::get('/aboutus',[HomeController::class,"aboutus"]);

route::get('/contactus',[HomeController::class,"contactus"]);

route::get('/movies',[HomeController::class,"movies"]);

route::get('/upcomingmovies',[HomeController::class,"upcomingmovies"]);

route::get('/movies/{movieslug}',[MovieController::class,"moviesview"]);

route::get('/upcomingmovies/{movieslug}',[MovieController::class,"upmoviesview"]);

route::get('/movies/{movieslug}/{movieid}/select',[MovieController::class,"selecttype"]);

route::get('/movies/{movieslug}/{movieid}/trailer',[HomeController::class,"trailer"]);

route::get('/upcomingmovies/{movieslug}/{movieid}/trailer',[HomeController::class,"uptrailer"]);

route::get('/movies/{movieslug}/{id}/select-seats',[MovieController::class,"selectseats"]);

route::get('/movies/{movieslug}/{movieid}/{showlang}/{showtype}/{date}/book-tickets',[MovieController::class,"booktickets"]);

route::post('/uploadticketdetails/{id}',[MovieController::class,"uploadticketdetails"]);

route::post('/uploadcontact',[HomeController::class,"uploadcontact"]);

route::get('/adminusers',[AdminController::class,"adminuser"]);

Route::get('/download-user-data', [AdminController::class,"downloadUserData"])->name('download.userdata');

Route::get('/download-current-movie-data', [AdminController::class,"downloadCurrentMovieData"])->name('download.currentmoviedata');

Route::get('/download-upcomming-movie-data', [AdminController::class,"downloadUpcommingMovieData"])->name('download.upcommingmoviedata');

Route::get('/download-multiplex-data', [AdminController::class,"downloadMultiplexData"])->name('download.multiplexdata');

Route::get('/download-screen-data', [AdminController::class,"downloadScreenData"])->name('download.screendata');

Route::get('/download-movie-show-data', [AdminController::class,"downloadMovieShowData"])->name('download.movieshowdata');

route::get('/searchuser',[AdminController::class,"searchuser"]);

route::get('/admindashboard',[AdminController::class,"admindashboard"]);

route::get('/adminmovies',[AdminController::class,"adminmovies"]);

route::get('/adminmoviesdata',[AdminController::class,"adminmoviesdata"]);

route::get('/adminusercontactdata',[AdminController::class,"adminusercontactdata"]);

route::get('/adminuserticketsdata',[AdminController::class,"adminuserticketsdata"]);

route::get('/adminupcomingmovies',[AdminController::class,"adminupcomingmovies"]);

route::get('/adminupcomingmoviesdata',[AdminController::class,"adminupcomingmoviesdata"]);

route::post('/payment',[MovieController::class,"payment"]);

route::get('/adminmultiplex',[AdminController::class,"adminmultiplex"]);

route::get('/adminmultiplexdata',[AdminController::class,"adminmultiplexdata"]);

route::get('/adminscreen',[AdminController::class,"adminscreen"]);

route::get('/adminscreendata',[AdminController::class,"adminscreendata"]);

route::get('/paymentdetails',[MovieController::class,"paymentdetails"]);

route::get('/paymentsuccess',[MovieController::class,"paymentsuccess"]);

route::get('/py',[MovieController::class,"py"]);

route::get('/adminmovieshow',[AdminController::class,"adminmovieshow"]);

route::get('/adminmovieshowdata',[AdminController::class,"adminmovieshowdata"]);

route::post('/getmultiplex',[AdminController::class,"getmultiplex"]);

route::post('/changetotalpay',[MovieController::class,"changetotalpay"]);

route::post('/uploadmovies',[AdminController::class,"uploadmovies"]);

route::post('/uploadupcomingmovies',[AdminController::class,"uploadupcomingmovies"]);

route::post('/uploadmultiplex',[AdminController::class,"uploadmultiplex"]);

route::post('/uploadscreen',[AdminController::class,"uploadscreen"]);

route::post('/uploadmovieshow',[AdminController::class,"uploadmovieshow"]);

route::get('/deleteuser/{id}',[AdminController::class,"deleteuser"]);

route::get('/deletemovie/{id}',[AdminController::class,"deletemovie"]);

route::get('/deleteupcomingmovie/{id}',[AdminController::class,"deleteupcomingmovie"]);

route::get('/deletemultiplex/{id}',[AdminController::class,"deletemultiplex"]);

route::get('/deletescreen/{id}',[AdminController::class,"deletescreen"]);

route::get('/deletemovieshow/{id}',[AdminController::class,"deletemovieshow"]);

route::get('/updatemovie/{id}',[AdminController::class,"updatemovie"]);

route::get('/updateupcomingmovie/{id}',[AdminController::class,"updateupcomingmovie"]);

route::get('/updatemultiplex/{id}',[AdminController::class,"updatemultiplex"]);

route::get('/updatescreen/{id}',[AdminController::class,"updatescreen"]);

route::get('/updatemovieshow/{id}',[AdminController::class,"updatemovieshow"]);

route::post('/update/{id}',[AdminController::class,"update"]);

route::post('/updateup/{id}',[AdminController::class,"updateup"]);

route::post('/updatemp/{id}',[AdminController::class,"updatemp"]);

route::post('/updatesc/{id}',[AdminController::class,"updatesc"]);

route::post('/updatems/{id}',[AdminController::class,"updatems"]);

route::get('/adminhome',[HomeController::class,"adminhome"]);

route::get('/paymentpage',[PaytmController::class,"paymentpage"]);

Route::get('/downloadPDF/{id}',[DownloadController::class,'downloadPDF']);

Route::get('/mailPDF/{id}',[DownloadController::class,'mailPDF']);

Route::get('product', [RazorpayController::class, 'index']);

Route::get('paysuccess', [RazorpayController::class, 'razorPaySuccess']);

Route::get('razor-thank-you', [RazorpayController::class, 'RazorThankYou']);

Route::get('razorpay-payment', [PaymentController::class, 'create'])->name('pay.with.razorpay'); // create payment

Route::post('payment', [PaymentController::class, 'payment'])->name('payment');

Route::middleware(['auth:sanctum', 'verified', 'isAdmin'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
