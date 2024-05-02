<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    use HasFactory;

    public function getMultiplex()
    {
        return $this->belongsTo('App\Models\Multiplex','multiplexid','id');
    }

    public function getMovieshow()
    {
        return $this->hasMany('App\Models\MovieShow','screenid','id');
    }

    /* Total Screen Count */

    public static function screenCount(){
        $query = Screen::all();
        return $query->count();
    }
}
