<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Movie;

use App\Models\Ticket;

use App\Models\ContactUs;

use App\Models\Upcoming;

use App\Models\Multiplex;

use App\Models\Screen;

use App\Models\MovieShow;

use Dompdf\Dompdf;

class AdminController extends Controller
{
    public function admindashboard()
    {
        $data = new \stdClass();
        $data->total_user = User::userCount();
        $data->total_current_movie = Movie::currentMovieCount();
        $data->total_upcomming_movie = Upcoming::upcommingMovieCount();
        $data->total_multiplex = Multiplex::multiplexCount();
        $data->total_screen = Screen::screenCount();
        $data->total_movie_show = MovieShow::movieShowCount();

        // Movie Analytics
        $ticketPurchases = Ticket::select('movie_name', DB::raw('COUNT(*) as total_tickets'))->groupBy('movie_name')->get();

        // Count (Latest Movies and Upcomming Movies)
        $latestMovieCount = Movie::count();
        $upcomingMovieCount = Upcoming::count();

        // Fetch multiplex names and their counts
        // $multiplex = Multiplex::select('name', 'totalscreen')->get();

        // Fetch multiplex names and their counts
        $multiplexData = Multiplex::select('name', 'totalscreen')->get();

        // Extract the names and counts into separate arrays
        $multiplexNames = $multiplexData->pluck('name')->toArray();
        $multiplexScreenCounts = $multiplexData->pluck('totalscreen')->toArray();

        return view('admin.admindashboard', [
            'data' => $data,
            'ticketPurchases' => $ticketPurchases,
            'latestMovieCount' => $latestMovieCount,
            'upcomingMovieCount' => $upcomingMovieCount,
            // 'multiplex' => $multiplex,
            'multiplexNames' => $multiplexNames,
            'multiplexScreenCounts' => $multiplexScreenCounts,
        ]);
    }

    public function adminuser()
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = user::all()->where('role', '0');
            return view('admin.adminusers', compact('data'));
        }
    }

    public function downloadUserData()
    {
        $data = User::where('role', '!=', '1')->get();

        $pdf = new Dompdf();

        $num = 0;

        // Prepare HTML content with table and borders
        $html = '<h1>User Data</h1><table style="border-collapse: collapse; width: 100%;">';
        $html .= '<thead><tr><th style="border: 1px solid #000;">#</th><th style="border: 1px solid #000;">Name</th><th style="border: 1px solid #000;">Email</th>';
        $html .= '<th style="border: 1px solid #000;">Phone</th><th style="border: 1px solid #000;">City</th></tr></thead><tbody>';

        // Generate table rows for each user
        foreach ($data as $user) {
            $num++;

            $html .= '<tr><td style="border: 1px solid #000;">' . $num . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $user->name . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $user->email . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $user->phone . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $user->city . '</td></tr>';
        }

        $html .= '</tbody></table>';

        // Load HTML content into Dompdf
        $pdf->loadHtml($html);

        // Set paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Render PDF
        $pdf->render();

        // Output PDF to browser
        $pdf->stream('UserData.pdf');
    }

    public function downloadCurrentMovieData()
    {
        $data = Movie::all();

        $pdf = new Dompdf();

        $num = 0;

        // Prepare HTML content with table and borders
        $html = '<h1>Current Movie Data</h1><table style="border-collapse: collapse; width: 100%;">';
        $html .= '<thead><tr><th style="border: 1px solid #000;">#</th><th style="border: 1px solid #000;">Movie Name</th><th style="border: 1px solid #000;">Description</th><th style="border: 1px solid #000;">Release Date</th>';
        $html .= '<th style="border: 1px solid #000;">Genre</th><th style="border: 1px solid #000;">Type</th><th style="border: 1px solid #000;">Length</th><th style="border: 1px solid #000;">Cast</th></tr></thead><tbody>';

        // Generate table rows for each user
        foreach ($data as $movie) {
            $num++;

            $html .= '<tr><td style="border: 1px solid #000;">' . $num . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movie->moviename . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movie->description . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movie->releasedate . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movie->genre . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movie->type . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movie->length . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movie->cast . '</td></tr>';
        }

        $html .= '</tbody></table>';

        // Load HTML content into Dompdf
        $pdf->loadHtml($html);

        // Set paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Render PDF
        $pdf->render();

        // Output PDF to browser
        $pdf->stream('CurrentMovieData.pdf');
    }

    public function downloadUpcommingMovieData()
    {
        $data = Upcoming::all();

        $pdf = new Dompdf();

        $num = 0;

        // Prepare HTML content with table and borders
        $html = '<h1>Upcomming Movie Data</h1><table style="border-collapse: collapse; width: 100%;">';
        $html .= '<thead><tr><th style="border: 1px solid #000;">#</th><th style="border: 1px solid #000;">Movie Name</th><th style="border: 1px solid #000;">Description</th><th style="border: 1px solid #000;">Release Date</th>';
        $html .= '<th style="border: 1px solid #000;">Genre</th><th style="border: 1px solid #000;">Type</th><th style="border: 1px solid #000;">Cast</th></tr></thead><tbody>';

        // Generate table rows for each user
        foreach ($data as $movie) {
            $num++;

            $html .= '<tr><td style="border: 1px solid #000;">' . $num . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movie->moviename . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movie->description . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movie->releasedate . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movie->genre . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movie->type . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movie->cast . '</td></tr>';
        }

        $html .= '</tbody></table>';

        // Load HTML content into Dompdf
        $pdf->loadHtml($html);

        // Set paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Render PDF
        $pdf->render();

        // Output PDF to browser
        $pdf->stream('UpcommingMovieData.pdf');
    }

    public function downloadMultiplexData()
    {
        $data = Multiplex::all();

        $pdf = new Dompdf();

        $num = 0;

        // Prepare HTML content with table and borders
        $html = '<h1>Upcomming Movie Data</h1><table style="border-collapse: collapse; width: 100%;">';
        $html .= '<thead><tr><th style="border: 1px solid #000;">#</th><th style="border: 1px solid #000;">Multiplex Name</th><th style="border: 1px solid #000;">Address</th><th style="border: 1px solid #000;">Contact</th>';
        $html .= '<th style="border: 1px solid #000;">Email</th><th style="border: 1px solid #000;">Total Screen</th></tr></thead><tbody>';

        // Generate table rows for each user
        foreach ($data as $movie) {
            $num++;

            $html .= '<tr><td style="border: 1px solid #000;">' . $num . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movie->name . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movie->address . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movie->contact . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movie->email . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movie->totalscreen . '</td></tr>';
        }

        $html .= '</tbody></table>';

        // Load HTML content into Dompdf
        $pdf->loadHtml($html);

        // Set paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Render PDF
        $pdf->render();

        // Output PDF to browser
        $pdf->stream('MultiplexData.pdf');
    }

    public function downloadScreenData()
    {
        $data = Screen::all();

        $pdf = new Dompdf();

        $num = 0;

        // Prepare HTML content with table and borders
        $html = '<h1>Screen Data</h1><table style="border-collapse: collapse; width: 100%;">';
        $html .= '<thead><tr><th style="border: 1px solid #000;">#</th><th style="border: 1px solid #000;">Multiplex Name</th><th style="border: 1px solid #000;">Screen No.</th><th style="border: 1px solid #000;">Screen Name</th></tr></thead><tbody>';

        // Generate table rows for each user
        foreach ($data as $screen) {
            $num++;

            // Fetch the multiplex name using the multiplex ID
            $multiplexName = Multiplex::where('id', $screen->multiplexid)->value('name');

            $html .= '<tr><td style="border: 1px solid #000;">' . $num . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $multiplexName . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $screen->screenno . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $screen->screenname . '</td></tr>';
        }

        $html .= '</tbody></table>';

        // Load HTML content into Dompdf
        $pdf->loadHtml($html);

        // Set paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Render PDF
        $pdf->render();

        // Output PDF to browser
        $pdf->stream('ScreenData.pdf');
    }

    public function downloadMovieShowData()
    {
        $data = MovieShow::all();

        $pdf = new Dompdf();

        $num = 0;

        // Prepare HTML content with table and borders
        $html = '<h1>Movie Show Data</h1><table style="border-collapse: collapse; width: 100%;">';
        $html .= '<thead><tr><th style="border: 1px solid #000;">#</th><th style="border: 1px solid #000;">Movie Name</th><th style="border: 1px solid #000;">Multiplex Name</th><th style="border: 1px solid #000;">Screen Name</th>';
        $html .= '<th style="border: 1px solid #000;">Show Date</th><th style="border: 1px solid #000;">Show Time</th><th style="border: 1px solid #000;">Show Type</th><th style="border: 1px solid #000;">Show Language</th>';
        $html .= '<th style="border: 1px solid #000;">Normal Price</th><th style="border: 1px solid #000;">Executive Price</th><th style="border: 1px solid #000;">Premium Price</th><th style="border: 1px solid #000;">Total Seats</th></tr></thead><tbody>';

        // Generate table rows for each user
        foreach ($data as $show) {
            $num++;

            // Fetch the multiplex name using the multiplex ID
            $movieName = Movie::where('id', $show->movieid)->value('moviename');
            $multiplexName = Multiplex::where('id', $show->multiplexid)->value('name');
            $screenName = Screen::where('id', $show->screenid)->value('screenname');

            $html .= '<tr><td style="border: 1px solid #000;">' . $num . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $movieName . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $multiplexName . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $screenName . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $show->showdate . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $show->showtime . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $show->showtype . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $show->showlang . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $show->normalprice . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $show->executiveprice . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $show->premiumprice . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $show->totalseats . '</td></tr>';
        }

        $html .= '</tbody></table>';

        // Load HTML content into Dompdf
        $pdf->loadHtml($html);

        // Set paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Render PDF
        $pdf->render();

        // Output PDF to browser
        $pdf->stream('MovieShowData.pdf');
    }

    public function downloadTicketsData()
    {
        $data = Ticket::all();

        $pdf = new Dompdf();

        $num = 0;

        // Prepare HTML content with table and borders
        $html = '<h1>Tickets Data</h1><table style="border-collapse: collapse; width: 100%;">';
        $html .= '<thead><tr><th style="border: 1px solid #000;">#</th><th style="border: 1px solid #000;">User Name</th><th style="border: 1px solid #000;">Show Name</th>';
        $html .= '<th style="border: 1px solid #000;">Seats</th><th style="border: 1px solid #000;">Booking Date</th><th style="border: 1px solid #000;">Amount</th><th style="border: 1px solid #000;">Transaction</th></tr></thead><tbody>';

        // Generate table rows for each user
        foreach ($data as $ticket) {
            $num++;

            $html .= '<tr><td style="border: 1px solid #000;">' . $num . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $ticket->user_name . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $ticket->movie_name . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $ticket->totalseats . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $ticket->bookingdate . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $ticket->totalpay . '</td>';
            $html .= '<td style="border: 1px solid #000;">' . $ticket->Completed . '</td></tr>';
        }

        $html .= '</tbody></table>';

        // Load HTML content into Dompdf
        $pdf->loadHtml($html);

        // Set paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Render PDF
        $pdf->render();

        // Output PDF to browser
        $pdf->stream('TicketsData.pdf');
    }

    public function adminmovies()
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = movie::all();
            return view('admin.adminmovies', compact('data'));
        }
    }

    public function adminmoviesdata()
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = movie::all();
            return view('admin.adminmoviesdata', compact('data'));
        }
    }

    public function adminupcomingmovies()
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = upcoming::all();
            return view('admin.adminupcomingmovies', compact('data'));
        }
    }

    public function adminupcomingmoviesdata()
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = upcoming::all();
            return view('admin.adminupcomingmoviesdata', compact('data'));
        }
    }

    public function adminmultiplex()
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = multiplex::all();
            return view('admin.adminmultiplex', compact('data'));
        }
    }

    public function adminmultiplexdata()
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = multiplex::all();
            return view('admin.adminmultiplexdata', compact('data'));
        }
    }

    public function adminscreen()
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $datam = multiplex::all();
            $datas = screen::with('getMultiplex')->get();
            return view('admin.adminscreen', compact('datam', 'datas'));
        }
    }

    public function adminscreendata()
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $datam = multiplex::all();
            $datas = screen::with('getMultiplex')->get();
            return view('admin.adminscreendata', compact('datam', 'datas'));
        }
    }

    public function adminmovieshow()
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $datams = movieshow::all();
            $datamo = movie::all();
            $datam = multiplex::all();
            $datams = movieshow::with('getMovie', 'getMultiplex', 'getScreen')->get();
            return view('admin.adminmovieshow', compact('datams', 'datamo', 'datam'));
        }
    }

    public function adminmovieshowdata()
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $datams = movieshow::all();
            $datamo = movie::all();
            $datam = multiplex::all();
            $datams = movieshow::with('getMovie', 'getMultiplex', 'getScreen')->orderBy('id', 'DESC')->get();
            return view('admin.adminmovieshowdata', compact('datams', 'datamo', 'datam'));
        }
    }

    public function adminusercontactdata()
    {
        // $role=Auth::user()->role;
        // if($role=='1')
        // {
        //     $datams=movieshow::all();
        //     $datamo=movie::all();
        //     $datam=multiplex::all();
        //     $datams=movieshow::with('getMovie','getMultiplex','getScreen')->orderBy('id', 'DESC')->get();
        //     return view("admin.adminusercontactdata",compact("datams","datamo","datam"));
        // }

        $userContact = ContactUs::orderBy('id', 'desc')->get()->toArray();
        // dd($userContact);
        if (!empty($userContact)) {
            // dd($userContact);
            return response(view('admin.adminusercontactdata', compact('userContact')));
        } else {
            return response(view('admin.adminusercontactdata'));
        }
    }

    public function adminusertickets()
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $datams = movieshow::all();
            $datamo = movie::all();
            $datam = multiplex::all();
            $datams = movieshow::with('getTicket', 'getMultiplex', 'getScreen')->get();
            return view('admin.adminusertickets', compact('datams', 'datamo', 'datam'));
        }
    }

    public function adminuserticketsdata()
    {
        // $role=Auth::user()->role;
        // if($role=='1')
        // {
        //     $datams=movieshow::all();
        //     $datamo=movie::all();
        //     $datam=multiplex::all();
        //     $datams=movieshow::with('getTicket','getMultiplex','getScreen')->orderBy('id', 'DESC')->get();
        //     return view("admin.adminuserticketsdata",compact("datams","datamo","datam"));
        // }

        $userTickets = Ticket::where('Completed', 'Successful')->get()->toArray();
        // dd($userTickets);
        if (empty($employeeList)) {
            // dd($userTickets);
            return response(view('admin.adminuserticketsdata', compact('userTickets')));
        } else {
            return response(view('admin.adminuserticketsdata'));
        }
    }

    public function getmultiplex(Request $request)
    {
        $multiplexid = $request->post('multiplexid');
        $screen = DB::table('screens')->where('multiplexid', $multiplexid)->OrderBy('id', 'asc')->get();
        $html = '<option value=""></option>';
        foreach ($screen as $datas) {
            $html .= '<option value="' . $datas->id . '">' . $datas->screenname . '</option>';
        }
        echo $html;
    }

    public function searchuser(Request $request)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $searchuser = $request->searchuser;
            $data = user::where('name', 'LIKE', '%' . $searchuser . '%')
                ->where('role', '0')
                ->get();
            return view('admin.adminusers', compact('data'));
        }
    }

    public function updatemovie($id)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = movie::find($id);
            return view('admin.updatemovie', compact('data'));
        }
    }

    public function updateupcomingmovie($id)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = upcoming::find($id);
            return view('admin.updateupcomingmovie', compact('data'));
        }
    }

    public function updatemultiplex($id)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = multiplex::find($id);
            return view('admin.updatemultiplex', compact('data'));
        }
    }

    public function updatescreen($id)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = screen::find($id);
            $datam = multiplex::all();
            return view('admin.updatescreen', compact('datam', 'data'));
        }
    }

    public function updatemovieshow($id)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $datams = movieshow::find($id);
            $datamo = movie::all();
            $datam = multiplex::all();
            return view('admin.updatemovieshow', compact('datams', 'datamo', 'datam'));
        }
    }

    public function update(Request $request, $id)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = movie::find($id);

            $image = $request->image;

            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('moviesimage', $imagename);

            $data->image = $imagename;
            $data->moviename = $request->name;
            $data->description = $request->description;
            $data->releasedate = $request->releasedate;
            $data->genre = $request->genre;
            $data->type = $request->type;
            $data->length = $request->length;
            $data->trailerlink = $request->trailerlink;
            $data->slug = $request->slug;
            $data->rating = $request->rating;
            $data->cast = $request->cast;
            $data->lang = $request->lang;
            $data->imdb = $request->imdb;
            $data->rt = $request->rt;

            $data->save();
            return redirect('adminmoviesdata');
        }
    }

    public function updateup(Request $request, $id)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = upcoming::find($id);

            $image = $request->image;

            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('moviesimage', $imagename);

            $data->image = $imagename;
            $data->moviename = $request->name;
            $data->description = $request->description;
            $data->releasedate = $request->releasedate;
            $data->genre = $request->genre;
            $data->type = $request->type;
            $data->trailerlink = $request->trailerlink;
            $data->slug = $request->slug;
            $data->cast = $request->cast;
            $data->lang = $request->lang;

            $data->save();
            return redirect('adminupcomingmoviesdata');
        }
    }

    public function updatemp(Request $request, $id)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = multiplex::find($id);

            $data->name = $request->name;
            $data->address = $request->address;
            $data->contact = $request->contact;
            $data->email = $request->email;
            $data->totalscreen = $request->totalscreen;

            $data->save();
            return redirect('adminmultiplexdata');
        }
    }

    public function updatesc(Request $request, $id)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = screen::find($id);

            $data->screenno = $request->screenno;
            $data->screenname = $request->screenname;
            $data->multiplexid = $request->multiplexid;

            $data->save();
            return redirect('adminscreendata');
        }
    }

    public function updatems(Request $request, $id)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = movieshow::find($id);

            $data->movieid = $request->movieid;
            $data->multiplexid = $request->multiplexid;
            $data->screenid = $request->screenid;
            $data->showdate = $request->showdate;
            $data->showtime = $request->showtime;
            $data->showtype = $request->showtype;
            $data->showlang = $request->showlang;
            $data->normalprice = $request->normalprice;
            $data->executiveprice = $request->executiveprice;
            $data->premiumprice = $request->premiumprice;
            $data->totalseats = $request->totalseats;

            $data->save();
            return redirect('adminmovieshowdata');
        }
    }

    public function uploadmovies(Request $request)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = new movie();

            $image = $request->image;

            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('moviesimage', $imagename);

            $data->image = $imagename;
            $data->moviename = $request->name;
            $data->description = $request->description;
            $data->releasedate = $request->releasedate;
            $data->genre = $request->genre;
            $data->type = $request->type;
            $data->length = $request->length;

            // Extract video ID from the YouTube URL
            $videoId = $this->extractVideoId($request->trailerlink);
            // Update trailer link to the embed format
            $data->trailerlink = "https://www.youtube.com/embed/$videoId";

            $data->slug = $request->slug;
            $data->rating = $request->rating;
            $data->cast = $request->cast;
            $data->lang = $request->lang;
            $data->imdb = $request->imdb;
            $data->rt = $request->rt;

            $data->save();
            return redirect()->back();
        }
    }

    // Helper function to extract video ID from YouTube URL
    private function extractVideoId($url)
    {
        $videoId = '';
        $pattern = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';
        preg_match($pattern, $url, $matches);
        if (isset($matches[1])) {
            $videoId = $matches[1];
        }
        return $videoId;
    }

    public function uploadupcomingmovies(Request $request)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = new upcoming();

            $image = $request->image;

            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('moviesimage', $imagename);

            $data->image = $imagename;
            $data->moviename = $request->name;
            $data->description = $request->description;
            $data->releasedate = $request->releasedate;
            $data->genre = $request->genre;
            $data->type = $request->type;

            // Extract video ID from the YouTube URL
            $videoId = $this->extractVideoId($request->trailerlink);
            // Update trailer link to the embed format
            $data->trailerlink = "https://www.youtube.com/embed/$videoId";

            $data->slug = $request->slug;
            $data->cast = $request->cast;
            $data->lang = $request->lang;

            $data->save();
            return redirect()->back();
        }
    }

    public function uploadmultiplex(Request $request)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = new multiplex();

            $data->name = $request->name;
            $data->address = $request->address;
            $data->contact = $request->contact;
            $data->email = $request->email;
            $data->totalscreen = $request->totalscreen;

            $data->save();
            return redirect()->back();
        }
    }

    public function uploadscreen(Request $request)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = new screen();

            $data->screenno = $request->screenno;
            $data->screenname = $request->screenname;
            $data->multiplexid = $request->multiplexid;

            $data->save();
            return redirect()->back();
        }
    }

    public function uploadmovieshow(Request $request)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = new movieshow();

            $data->movieid = $request->movieid;
            $data->multiplexid = $request->multiplexid;
            $data->screenid = $request->screenid;
            $data->showdate = $request->showdate;
            $data->showtime = $request->showtime;
            $data->showtype = $request->showtype;
            $data->showlang = $request->showlang;
            $data->normalprice = $request->normalprice;
            $data->executiveprice = $request->executiveprice;
            $data->premiumprice = $request->premiumprice;
            $data->totalseats = $request->totalseats;

            $data->save();
            return redirect()->back();
        }
    }

    public function deleteuser($id)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = user::find($id);
            $data->delete();
            return redirect()->back();
        }
    }

    public function deletemovie($id)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = movie::find($id);
            $data->delete();
            return redirect()->back();
        }
    }

    public function deleteupcomingmovie($id)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = upcoming::find($id);
            $data->delete();
            return redirect()->back();
        }
    }

    public function deletemultiplex($id)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = multiplex::find($id);
            $data->delete();
            return redirect()->back();
        }
    }

    public function deletescreen($id)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = screen::find($id);
            $data->delete();
            return redirect()->back();
        }
    }

    public function deletemovieshow($id)
    {
        $role = Auth::user()->role;
        if ($role == '1') {
            $data = movieshow::find($id);
            $data->delete();
            return redirect()->back();
        }
    }
}
