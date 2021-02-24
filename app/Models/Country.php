<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Country extends Model
{
    use SoftDeletes;

    protected $table = 'country';
    protected $primaryKey = "country_code";
    public $incrementing = false;
    protected $guarded = array();
    private static $defaultCountryCode = 'gb';
    public $image_path = "storage/uploads/Country/";
    private static $activeCountry = null;

    // public static function findByName($countryName)
    // {
    //     return self::where('name',$countryName)->first();
    // }

    public function getIdAttribute()
    {// id attribute is required to fetch relational data
        $id = $this->primaryKey;
        // return $this->$id; // $this->country_code;
        return $this->attributes[$id];
    }
    
    public function getImagePath()
    {// check file exist then return default image.
        $imageLink = url($this->image_path.$this->image);
        if (file_exists(public_path($this->image_path.$this->image))) {
            return $imageLink;
        } else {
            return NULL;
        }
    }

    public function setCountryCodeAttribute($value)
    {
        $this->attributes['country_code'] = strtolower($value);
    }

    public static function getActiveCountry()
    {
        if(empty(session('activeCountry')) && empty(self::$activeCountry))
        {
            return self::find(self::getDefault());
        }
        // return session('activeCountry');
        return empty(self::$activeCountry) ? session('activeCountry') : self::$activeCountry;
    }

    public static function setActiveCountry(self $country)
    {
        self::$activeCountry = $country;
        session()->put('activeCountry',$country);
        session()->save();
    }

    public static function getDefault()
    {
        return self::$defaultCountryCode;
    }

    public function convertPrice($price)
    {
        $price *= $this->GBPValue;
        return number_format($price,2,'.','');
    }

    

    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = ucfirst($value);
    }

    public function getCurrencySymbolAttribute()
    {
        return $this->attributes['currency_symbol'] ?? $this->currency_symbol_html ?? $this->currency;
    }

    public function regions()
    {
        return $this->hasMany('App\Models\Region',"country_id");
    }

    public function locations()
    {
        return $this->hasMany("App\Models\Location","country_id");
    }

    
}