<?php

namespace App\Http\Controllers;

  
use PDF;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Movie;
use App\Models\Upcoming;
use App\Models\Multiplex;
use App\Models\Screen;
use App\Models\MovieShow;
use App\Models\Ticket;
use App\Models\Coupon;
use DateTime;

class MovieController extends Controller
{
    public function moviesview($movieslug)
    {
        if(Movie::where('slug',$movieslug)->exists())
        {
            $movies = movie::where('slug',$movieslug)->first();
            return view('movies.view',compact('movies'));
        }
        else
        {
            return redirect('/')->with('status',"The Link Was Broken");
        }
    }

    public function upmoviesview($movieslug)
    {
        if(Upcoming::where('slug',$movieslug)->exists())
        {
            $movies = upcoming::where('slug',$movieslug)->first();
            return view('movies.upview',compact('movies'));
        }
        else
        {
            return redirect('/')->with('status',"The Link Was Broken");
        }
    }

    public function booktickets($movieslug,$movieid,$showlang,$showtype,$date)
    {
        if(Movie::where('slug',$movieslug)->exists())
        {
            $ldate = date('Y-m-d');
            $tdate = Carbon::now()->addDay(1);
            $tomorrowdate = Carbon::createFromFormat('Y-m-d H:i:s', $tdate)->format('Y-m-d');
            $ddate = Carbon::now()->addDay(2); 
            $dtomorrowdate = Carbon::createFromFormat('Y-m-d H:i:s', $ddate)->format('Y-m-d');
            $currentTime = Carbon::now();
            $movies = movie::where('slug','=',$movieslug)->first();
            $multiplex = movieshow::with('getMovie','getMultiplex','getScreen')->where('movieid',$movieid)->distinct('multiplexid')->get('multiplexid');
            $language = movieshow::with('getMovie','getMultiplex','getScreen')->where('showlang',$showlang)->distinct('showlang')->first('showlang');
            $type = movieshow::with('getMovie','getMultiplex','getScreen')->where('showtype',$showtype)->distinct('showtype')->first('showtype');
            $datams = movieshow::with('getMovie','getMultiplex','getScreen')->where('movieid',$movieid)->where('showdate',$date)->get();
            return view('movies.shows',compact('movies','multiplex','language','type','datams','ldate','tomorrowdate','dtomorrowdate','movieslug','movieid','showlang','showtype','currentTime','date'));
        }
        else
        {
            return redirect('/booktickets')->with('status',"The Link Was Broken");
        }
    }


    public function selecttype($movieslug,$movieid)
    {
        if(Movie::where('slug',$movieslug)->exists())
        {
            $ldate = date('Y-m-d');
            $currentTime = Carbon::now();
            $movies = movie::where('slug','=',$movieslug)->first();
            $language = movieshow::with('getMovie','getMultiplex','getScreen')->where('movieid',$movieid)->distinct()->get('showlang');
            $type = movieshow::with('getMovie','getMultiplex','getScreen')->where('movieid',$movieid)->distinct()->get('showtype');
            $datams = movieshow::with('getMovie','getMultiplex','getScreen')->where('movieid',$movieid)->get();
            //print_r($type);
            $date = new DateTime;
            $successful = "Pending";
            $date->modify('-10 minutes');
            $formatted = $date->format('Y-m-d H:i:s');
            ticket::where('created_at', '<=', $formatted)->where('Completed',$successful)->delete();
            return view('movies.select',compact('movies','language','type','datams','ldate','currentTime'));
        }
        else
        {
            return redirect('/booktickets')->with('status',"The Link Was Broken");
        }
    }

    public function selectseats($movieslug,$id)
    {
        if(Movie::where('slug',$movieslug)->exists())
        {

            $date = new DateTime;
            $successful = "Pending";
            $date->modify('-10 minutes');
            $formatted = $date->format('Y-m-d H:i:s');
            ticket::where('created_at', '<=', $formatted)->where('Completed',$successful)->delete();


            $movies = movie::where('slug','=',$movieslug)->first();
            $datams = movieshow::with('getMovie','getMultiplex','getScreen')->where('id',$id)->first();
            $tickets = ticket::with('getMovieshow')->where('movieshowid',$id)->get();
            $seatname = '';
            foreach($tickets as $tickets)
            {
                $seatname = $seatname . ' ' . $tickets->seatnames;
            }
            //print_r($seatname);
            return view('movies.seats',compact('movies','datams','tickets','seatname'));
        }
        else
        {
            return redirect('/booktickets')->with('status',"The Link Was Broken");
            //return redirect()->back()->with('alert');
        }
    }

    public function uploadticketdetails(Request $request,$id)
    {
        if(Auth::check())
        {
            $data = new ticket;
            $userid = Auth::user()->id;
            $username = Auth::user()->name;
            $seatnames = $request->seatnamei;
            
            $datams = movieshow::with('getMovie','getMultiplex','getScreen')->where('id',$id)->first();
            $data->userid = $userid;
            $data->user_name = $username;
            $data->movie_name = $datams->getMovie->moviename;
            $data->movieshowid = $id;
            $data->normalprice = $datams->normalprice;
            $data->executiveprice = $datams->executiveprice;
            $data->premiumprice = $datams->premiumprice;
            $data->seatnames = $request->seatnamei;
            $data->totalseats = $request->counti;
            $data->bookingdate = date('Y-m-d H:i:s');
            $data->totalcost = $request->totali;
            $data->coupon = "";
            $data->totalpay = $request->totalpay;
            $data->Completed = "Pending";
            $data->save();

            $pid= $data->id;
            $pending = $data->Completed;
            //return redirect()->back();
            $request->session()->save();
            session()->put('piid',$pid);
            session()->put('success',$pending); 
            return redirect('paymentdetails')->with(['pid'=>$pid]);

            // return redirect()->back()->with('success', 'Your ticket book succefully');

            $date = new DateTime;
            $successful = "Pending";
            $date->modify('-10 minutes');
            $formatted = $date->format('Y-m-d H:i:s');
            ticket::where('created_at', '<=', $formatted)->where('Completed',$successful)->delete();

        }
        else
        {
            return redirect()->back()->with('alert','You Have To Login First!');
        }
    }

    public function paymentdetails()
    {
        $id = session()->get('piid');
        $tickets = ticket::with('getMovieshow')->where('id',$id)->first();
        $coupons = coupon::all();
        $msid = $tickets->movieshowid;
        $datams = movieshow::with('getMovie','getMultiplex','getScreen')->where('id',$msid)->first();;
        return view('movies.paymentdetails',compact('tickets','datams','coupons')); 

            $date = new DateTime;
            $successful = "Pending";
            $date->modify('-10 minutes');
            $formatted = $date->format('Y-m-d H:i:s');
            ticket::where('created_at', '<=', $formatted)->where('Completed',$successful)->delete();
    }

    public function changetotalpay(Request $request)
    {
        $id = session()->get('piid');
        $totalpay=$request->post('totalpay');
        //$couponst=$request->post('couponst');
        //$couponname=$request->post('couponname');
        Ticket::where('id', $id)->update(['totalpay' => $totalpay]);
        Ticket::where('id', $id)->update(['coupon' => $couponname]);
        $tickets = ticket::with('getMovieshow')->where('id',$id)->first();
        $coupons = coupon::all();
        $msid = $tickets->movieshowid;
        $datams = movieshow::with('getMovie','getMultiplex','getScreen')->where('id',$msid)->first();
        //return view('movies.paymentsuccess',compact('tickets','datams','coupons'));
        //return redirect('paymentdetails');
        echo ($totalpay);
    }

    public function paymentsuccess()
    {
        $id = session()->get('piid');
        $success = session()->get('success');
        $tickets = ticket::with('getMovieshow')->where('id',$id)->first();
        Ticket::where('id', $id)->update(['Completed' => $success]);
        //DB::table('tickets')->where('id', $id)->limit(1)->update(array('Completed' => $success));
        $coupons = coupon::all();
        $msid = $tickets->movieshowid;
        
        $datams = movieshow::with('getMovie','getMultiplex','getScreen')->where('id',$msid)->first();
        return view('movies.paymentsuccess',compact('tickets','datams','coupons'));

        $date = new DateTime;
            $successful = "Pending";
            $date->modify('-10 minutes');
            $formatted = $date->format('Y-m-d H:i:s');
            ticket::where('created_at', '<=', $formatted)->where('Completed',$successful)->delete();
    }

}