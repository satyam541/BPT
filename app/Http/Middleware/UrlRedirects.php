<?php

namespace App\Http\Middleware;
use App\Models\UrlRedirect as UR;
use Closure;

class UrlRedirects
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
        $requestUri=$request->getRequestUri();

        $redirectData=UR::all();
        $match=$redirectData->whereIn('sourceUrl',$requestUri);
        if(count($match)>0){
            return redirect($match->first()->destinationUrl,301);
        }
        return $next($request);
    }
}
