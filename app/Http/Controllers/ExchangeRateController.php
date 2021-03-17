<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class ExchangeRateController extends Controller
{
    
    public function updateExchangeRate()
    {
        $exchangeRate = $this->getExchangeRate();
        $countries = Country::all();
        foreach($countries as $country)
        {
            if(!empty($exchangeRate[$country->currency]))
            {
                Country::where('country_code',$country->country_code)->update(['exchange_rate'=>$exchangeRate[$country->currency]]);
            }
        }
    }

    /**
     * All Functions Below Are for Currency Conversion
     * account on apilayer
     * https is not supported on apilayer free accounts
     * user: Jyoti.tura@excendo.com & password : Passw0rd
     * url: http://apilayer.net/api/live?access_key=bdbc0a4ce87d3d510f37cbf314e7fd59
     * user: paramjot.saini@themsptraining.com & password : Pa$$w0rd
     * url: http://api.currencylayer.com/live?access_key=2b503b306fe8a40cfac09da3525ec2af
     * exchangerate-api (no account its free as on 27-4-2020)
     * url: https://api.exchangerate-api.com/v6/latest
     */

    private $vender_name    = null;
    private $exchangeRate    = null;

    private function fetchApi($url){
        $api_result = file_get_contents($url,false);
        return json_decode($api_result);
    }
    private function fetchFromApiLayer1()
    {
        $api_url ="http://api.currencylayer.com/live?access_key=bdbc0a4ce87d3d510f37cbf314e7fd59";
        $this->vender_name = "apilayer";
        $api_data = $this->fetchAPI($api_url);
        if($api_data->success == false)
        {
            return $this->fetchFromApiLayer2();
        }
        return $api_data;
    }

    private function fetchFromApiLayer2()
    {
        $api_url ="http://api.currencylayer.com/live?access_key=2b503b306fe8a40cfac09da3525ec2af";
        $this->vender_name = "apilayer";
        $api_data = $this->fetchAPI($api_url);
        if($api_data->success == false)
        {
            return $this->fetchFromExchangeRateApi();
        }
        return $api_data;
    }

    private function fetchFromExchangeRateApi()
    {
        $api_url ="https://api.exchangerate-api.com/v6/latest";
        $this->vender_name = "exchangerate-api";
        $api_data = $this->fetchAPI($api_url);
        if($api_data->response == "rate-limited")
        {
            return false;
        }
        return $api_data;
    }

    private function getExchangeRate()
    {
        $rawData = $this->fetchFromApiLayer1();
        // $this->exchangeRate->put('vender',$this->vender_name);
        $currencies  = Country::all()->pluck('currency');
        $this->exchangeRate = collect();
        switch($this->vender_name)
        {
            case 'apilayer':
                $this->convertApiCurrency($currencies, $rawData->quotes, $rawData->source);
            break;
            case 'exchangerate-api':
                $this->convertApiCurrency($currencies, $rawData->rates);
            break; 
        }
        return $this->exchangeRate;
    }

    private function convertApiCurrency($currencies, $rates, $prefix = "")
    {
        $USD            =   $rates->USD ?? $rates->USDUSD;
        $GBP            =   $rates->GBP ?? $rates->USDGBP;
        $exchangeRate   =   $USD/$GBP;
        foreach($currencies as $currency)
        {
            foreach($rates as $index=>$rate)
            {
                if($prefix.$currency == $index)
                {
                    $rate = $rate * $exchangeRate;
                    $this->exchangeRate->put($currency, $rate);
                }
            }
        }
    }
}
