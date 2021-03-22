<?php

namespace App\Http\Middleware;

use App\Models\Country;
use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Request;
use Route;

class CountryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       $countryShortcode = $request->route('country');  //get country part from url

       if(empty($countryShortcode))
       {    
           $countryShortcode = Country::getDefault();
       }

       $country = Country::where('country_code', $countryShortcode)->where('active',1)->first();
        
       // country not found by url
       if(empty($country))
       {
           return redirect()->route('404');
       }

       // default country will not be displayed in the url
       if ($country->country_code == Country::getDefault()) {
        URL::defaults(['country' => NULL]);
       }
       else{
        URL::defaults(['country' => strtolower($country->country_code)]);
       }

       $prev_country = Country::getActiveCountry();
       if($prev_country->id != $country->id)
       {
        $requiredSessionVar = array('cmsActiveCountry','_token','login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        foreach(session()->all() as $key => $value) {
            if(!in_array($key, $requiredSessionVar)) {
                session()->forget($key);
            }
        }
        // session()->except($requiredSessionVar)->forget();
       }
       
       Country::setActiveCountry($country);
        return $next($request);
    }
}
