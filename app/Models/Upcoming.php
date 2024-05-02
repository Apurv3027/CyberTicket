<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upcoming extends Model
{
    use HasFactory;

    /* Total Upcomming Movie Count */

    public static function upcommingMovieCount(){
        $query = Upcoming::all();
        return $query->count();
    }
}
