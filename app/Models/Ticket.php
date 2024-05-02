<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $fillable = [
        'userid',
        'movieshowid',
        'normalprice',
        'executiveprice',
        'premiumprice',
        'seatnames',
        'totalseats',
        'bookingdate',
        'totalcost',
        'coupon',
        'totalpay',
        'Completed',
        'username',
        'movie_name',
    ];

    public function getUserTickets()
    {
        return $this->belongsTo('App\Models\Movieshow','movieshowid','id');
    }

    public function getMovieshow()
    {
        return $this->belongsTo('App\Models\Movieshow','movieshowid','id');
    }
}
