<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
use App\Models\Multiplex;
use App\Models\Screen;
use App\Models\MovieShow;

class MovieShow extends Model
{
    use HasFactory;

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movieid');
    }

    public function getMovie()
    {
        return $this->belongsTo('App\Models\Movie','movieid','id');
    }

    public function getMultiplex()
    {
        return $this->belongsTo('App\Models\Multiplex','multiplexid','id');
    }

    public function getScreen()
    {
        return $this->belongsTo('App\Models\Screen','screenid','id');
    }

    public function getTicket()
    {
        return $this->hasMany('App\Models\Ticket','movieshowid','id');
    }

    /* Total Movie Show Count */

    public static function movieShowCount(){
        $query = MovieShow::all();
        return $query->count();
    }
}
