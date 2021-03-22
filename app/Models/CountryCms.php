<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryCms extends Country
{

    private static $defaultCmsCountryCode = 'gb';
    private static $activeCmsCountry = null;
    

    public static function getCMSActiveCountry()
    {
        if(empty(session('cmsActiveCountry')) && empty(self::$activeCmsCountry))
        {
            return self::find(self::getCmsDefault());
        }
        // return session('activeCountry');
        return empty(self::$activeCountry) ? session('cmsActiveCountry') : self::$activeCmsCountry;
    }

    public static function setCMSActiveCountry(self $country)
    {
        self::$activeCmsCountry = $country;
        session()->put('cmsActiveCountry',$country);
        session()->save();
    }

    public static function getCmsDefault()
    {
        return self::$defaultCmsCountryCode;
    }
    
}
