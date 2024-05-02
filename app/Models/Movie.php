<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function getMovieshow()
    {
        return $this->hasMany('App\Models\MovieShow','movieid','id');
    }

    /* Total Current Movie Count */

    public static function currentMovieCount(){
        $query = Movie::all();
        return $query->count();
    }
}
