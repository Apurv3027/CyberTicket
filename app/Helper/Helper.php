<?php

namespace App\Helper;

class Helper{

    // Role Types
	public static function RolesArray()
    {
        $roles = [
            1 => 'Admin',
            2 => 'User'
        ];
        return $roles;
    }

    public static function CitiesArray()
    {
        return [
            'Ahmedabad',
            'Surat',
            'Vadodara',
            'Rajkot',
            'Bhavnagar',
            'Jamnagar',
            'Junagadh',
            'Gandhinagar',
            'Nadiad',
            'Morbi',
        ];
    }

    /* For Store Path Start */

    public static function upcommingMovieUploadPath(){
        return storage_path('app/public/upcommingmovie/');
    }
    
    
    /* For Store Path End */
    
    /* For Display Image */

    public static function displayUpcommingMoviePath(){
        return URL::to('/').'/storage/upcommingmovie/';
    }

}

?>