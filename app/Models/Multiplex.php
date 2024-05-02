<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
use App\Models\Multiplex;

use App\Models\MovieShow;

class Multiplex extends Model
{
    use HasFactory;

    public function getScreen()
    {
        return $this->hasMany('App\Models\Screen','multiplexid','id');
    }

    public function getMovieshow()
    {
        return $this->hasMany('App\Models\MovieShow','multiplexid','id');
    }

    /* Total Multiplex Count */

    public static function multiplexCount(){
        $query = Multiplex::all();
        return $query->count();
    }

}
