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
    private static $activeCountry = null;
    private static $defaultCmsCountryCode = 'gb';
    private static $activeCmsCountry = null;
    public $image_path = "storage/uploads/Country/";
    

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
        if (request()->route()->action['prefix'] != 'cms') 
        {
        if(empty(session('activeCountry')) && empty(self::$activeCountry))
        {
            return self::find(self::getDefault());
        }
        return empty(self::$activeCountry) ? session('activeCountry') : self::$activeCountry;
    }
    if(empty(session('cmsActiveCountry')) && empty(self::$activeCmsCountry))
        {
            return self::find(self::getDefault());
        }

        return empty(self::$activeCmsCountry) ? session('cmsActiveCountry') : self::$activeCmsCountry;
    }

    public static function setActiveCountry(self $country)
    {
        if (request()->route()->action['prefix'] != 'cms') {
        self::$activeCountry = $country;
        session()->put('activeCountry',$country);
        return session()->save();
        }
        self::$activeCmsCountry = $country;
        session()->put('cmsActiveCountry',$country);
        return session()->save();
    }

    public static function getDefault()
    {
        if (request()->route()->action['prefix'] != 'cms') {
        return self::$defaultCountryCode;
        }
        return self::$defaultCmsCountryCode;
    }

    // public function convertPrice($price)
    // {
    //     $today = Carbon::today();
    //     if(config('app.env') != "local")
    //     {
    //         if($this->updated_at->lt($today) || empty($this->exchange_rate))
    //         {
    //             $this->updateExchangeRate();
    //             $this->refresh();
    //         }
    //     }
    //     $price *= $this->exchange_rate;
    //     return number_format($price,2,'.','');
    // }

    // /**
    //  * All Functions Below Are for Currency Conversion
    //  * account on apilayer
    //  * https is not supported on apilayer free accounts
    //  * user: Jyoti.tura@excendo.com & password : Passw0rd
    //  * url: http://apilayer.net/api/live?access_key=bdbc0a4ce87d3d510f37cbf314e7fd59
    //  * user: paramjot.saini@themsptraining.com & password : Pa$$w0rd
    //  * url: http://api.currencylayer.com/live?access_key=2b503b306fe8a40cfac09da3525ec2af
    //  * exchangerate-api (no account its free as on 27-4-2020)
    //  * url: https://api.exchangerate-api.com/v6/latest
    //  */

    // public $vender_name    = null;
    // public $exchangeRate    = null;

    // private function fetchApi($url){
    //     $api_result = file_get_contents($url,false);
    //     return json_decode($api_result);
    // }
    // private function fetchFromApiLayer1()
    // {
    //     $api_url ="http://apilayer.net/api/live?access_key=bdbc0a4ce87d3d510f37cbf314e7fd59";
    //     $this->vender_name = "apilayer";
    //     $api_data = $this->fetchAPI($api_url);
    //     if($api_data->success == false)
    //     {
    //         return $this->fetchFromApiLayer2();
    //     }
    //     return $api_data;
    // }

    // private function fetchFromApiLayer2()
    // {
    //     $api_url ="http://api.currencylayer.com/live?access_key=2b503b306fe8a40cfac09da3525ec2af";
    //     $this->vender_name = "apilayer";
    //     $api_data = $this->fetchAPI($api_url);
    //     if($api_data->success == false)
    //     {
    //         return $this->fetchFromExchangeRateApi();
    //     }
    //     return $api_data;
    // }

    // private function fetchFromExchangeRateApi()
    // {
    //     $api_url ="https://api.exchangerate-api.com/v6/latest";
    //     $this->vender_name = "exchangerate-api";
    //     $api_data = $this->fetchAPI($api_url);
    //     if($api_data->response == "rate-limited")
    //     {
    //         return false;
    //     }
    //     return $api_data;
    // }

    // private function getExchangeRate()
    // {
    //     $rawData = $this->fetchFromApiLayer1();
    //     // $this->exchangeRate->put('vender',$this->vender_name);
    //     $currencies  = self::all()->pluck('currency');
    //     $this->exchangeRate = collect();
    //     switch($this->vender_name)
    //     {
    //         case 'apilayer':
    //             $this->convertApiCurrency($currencies, $rawData->quotes, $rawData->source);
    //         break;
    //         case 'exchangerate-api':
    //             $this->convertApiCurrency($currencies, $rawData->rates);
    //         break; 
    //     }
    //     return $this->exchangeRate;
    // }

    // private function convertApiCurrency($currencies, $rates, $prefix = "")
    // {
    //     $USD            =   $rates->USD ?? $rates->USDUSD;
    //     $GBP            =   $rates->GBP ?? $rates->USDGBP;
    //     $exchangeRate   =   $USD/$GBP;
    //     foreach($currencies as $currency)
    //     {
    //         foreach($rates as $index=>$rate)
    //         {
    //             if($prefix.$currency == $index)
    //             {
    //                 $rate = $rate * $exchangeRate;
    //                 $this->exchangeRate->put($currency, $rate);
    //             }
    //         }
    //     }
    // }
    // private function updateExchangeRate()
    // {
    //     $exchangeRate = $this->getExchangeRate();
    //     $countries = self::all();
    //     foreach($countries as $country)
    //     {
    //         if(!empty($exchangeRate[$country->currency]))
    //         {
    //             self::where('country_code',$country->country_code)->update(['exchange_rate'=>$exchangeRate[$country->currency]]);
    //         }
    //     }
    // }

    /**
     * Currency Exchange Rate Functions Ends here
     */

    

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