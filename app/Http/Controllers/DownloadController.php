<?php

namespace App\Http\Controllers;

use App\Models\DownloadPDF;
use Illuminate\Support\Facades\Auth;
use Mail;
use PDF;

use App\Models\User;
use App\Models\Movie;
use App\Models\MovieShow;
use App\Models\ContactUs;
use App\Models\Ticket;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $shows = PDF::all();
        return view('list', compact('shows'));
    }

    public function downloadPDF($id) 
    {
        $tickets = ticket::with('getMovieshow')->where('id',$id)->first();
        $msid = $tickets->movieshowid;
        $datams = movieshow::with('getMovie','getMultiplex','getScreen')->where('id',$msid)->first();
        //$show = DownloadPDF::find($id);
        $pdf = PDF::loadView('pdf',compact('tickets','datams'));
        return $pdf->download('Ticket.pdf');
    }

    public function mailPDF($id) 
    {
        $data["email"] = Auth::user()->email;
        $data["title"] = "Ticket Details";
        $data["body"] = "Tickets Details";
        $tickets = ticket::with('getMovieshow')->where('id',$id)->first();
        $msid = $tickets->movieshowid;
        $datams = movieshow::with('getMovie','getMultiplex','getScreen')->where('id',$msid)->first();
        $pdf = PDF::loadView('pdf',compact('tickets','datams'));
        
        Mail::send('pdf', compact('tickets', 'data', 'datams'), function($message)use($data, $pdf) {
             $message->to($data["email"])
                     ->subject($data["title"])
                     ->attachData($pdf->output(), "Ticket.pdf");
        }); 
        return redirect()->back()->with('alert','Mail Sent Successfully!');
    }
}
