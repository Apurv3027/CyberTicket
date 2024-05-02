<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Movie;
use App\Models\MovieShow;
use App\Models\ContactUs;
use App\Models\Ticket;
use App\Models\Upcoming;


class HomeController extends Controller
{
    public function index()
    {
        $data=movie::orderBy('id', 'DESC')->take(4)->get();
        $datam=upcoming::orderBy('id', 'DESC')->take(4)->get();
        $datau=user::all();
        return view("home",compact("data","datam","datau"));
    }

    public function trailer($movieslug,$id)
    {
        $movies = movie::where('slug','=',$movieslug)->first();
        return view("trailer",compact("movies"));
    }

    public function uptrailer($movieslug,$id)
    {
        $movies = upcoming::where('slug','=',$movieslug)->first();
        //print_r($movies);
        return view("trailer",compact("movies"));
    }

    public function movies()
    {
        $data=movie::orderBy('id', 'DESC')->get();
        $datau=user::all();
        return view("movies",compact("data","datau"));
    }

    public function upcomingmovies()    
    {
        $datam=upcoming::orderBy('id', 'DESC')->get();
        $datau=user::all();
        return view("upcomingmovies",compact("datam","datau"));
    }

    public function aboutus()
    {
        $data=movie::all();
        return view("aboutus",compact("data"));
    }

    public function contactus()
    {
        $data=movie::all();
        return view("contactus",compact("data"));
    }

    public function uploadcontact(Request $request)
    {
        $id=Auth::user()->id;
        $data = new contactus;

        $data->userid = $id;           
        $data->fullname = $request->fullname;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->message = $request->message;

        $data->save();
        return redirect()->back();
    }

    public function user()
    {
        $id=Auth::user()->id;
        $data=user::where('id',$id)->first();
        $tickets = ticket::with('getMovieshow')->where('userid',$id)->where('Completed','Successful')->orderBy('id', 'DESC')->get();
        $datams=movieshow::with('getMovie','getMultiplex','getScreen')->get();
        return view("user",compact("data","tickets","datams"));
    }

    public function bookinghistory($id)
    {
        $tickets = ticket::with('getMovieshow')->where('id',$id)->first();
        $msid = $tickets->movieshowid;
        $datams = movieshow::with('getMovie','getMultiplex','getScreen')->where('id',$msid)->first();
        //print_r($msid);
        return view('movies.bookinghistory',compact('tickets','datams'));
    }

    public function cancleticket($id)
    {
        try{
            $delete_id = ticket::find($id);
            if($delete_id){
                $delete_id->delete();
                return redirect()->back();
            }else{
                return redirect()->back();
            }
        }catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function search()
    {
        $search = request()->query('search');
        if($search)
        {
            $dataa = Movie::where('moviename','LIKE',"%{$search}%")->orderBy('id', 'DESC')->simplePaginate(100);
            $datab = Upcoming::where('moviename','LIKE',"%{$search}%")->orderBy('id', 'DESC')->simplePaginate(100);
            $data = $dataa->concat($datab);
            $count = count($data);
        }
        else
        {
            $dataa = Movie::orderBy('id', 'DESC')->get();
            $datab = Upcoming::orderBy('id', 'DESC')->get();
            $data = $dataa->concat($datab);
            $count = count($data);
        }
        return view("search",compact("dataa","datab","count"));
    }

    public function adminhome()
    {
        $data=movie::all();
        $role=Auth::user()->role;
            if($role=='1')
            {
                return view('admin.adminhome');
            }
    }

    public function redirects()
    {
        $data=movie::orderBy('id', 'DESC')->take(4)->get();
        $datam=upcoming::orderBy('id', 'DESC')->take(4)->get();
        $role=Auth::user()->role;
            if($role=='1')
            {
                // return view('admin.admindashboard');
                return redirect('/admindashboard');
            }
            else 
            {
                return view("home",compact("data","datam"));
            }
    }
}