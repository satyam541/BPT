<?php

namespace App\Http\Middleware;

use App\Models\UrlRedirect;
use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

class CheckForRedirect
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
        
       
        if(Str::contains($request->url(),'www.bestpracticetraining.com/index.php'))
        {
            $url=str_replace("/index.php","",$request->url());
            return redirect($url,301);
        }
        $sourceUrl = $request->getPathInfo();
        // check if the url is not in the routes to prevent too many redirect issue
        // if(!$request->route()->isFallback)
        // {
        //    return $next($request);
        // }
        // get the closest match for the redirect
        $redirect = UrlRedirect::findClosest($sourceUrl);
        
        if(empty($redirect))
        {
            return $next($request);
        }
        
        // find recursive redirects 
        while(!empty($redirect))
        {
            $target_url = $redirect->target_url;
            $redirect = UrlRedirect::where('source_url',$target_url)->first();
        }
        return redirect($target_url);
        
    }
}
