<?php

namespace App\Http\Middleware;

use App\Models\Advertiser as ModelsAdvertiser;
use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Advertiser
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
        if (!Auth::guard('advertiser')->check()) {
            return redirect('/login');
        }
        if (Auth::guard('advertiser')->check()) {
            $expireTime =  Carbon::now()->addSeconds(90);
            Cache::put('user-is-online-'. Auth::guard('advertiser')->user()->id, true, $expireTime);
            ModelsAdvertiser::where('id', Auth::guard('advertiser')->user()->id)->update(['last_seen'=> Carbon::now()]);
        }
        return $next($request);
    }
    // protected function redirectTo($request)
    // {
    //     if (! $request->expectsJson()) {
    //         return redirect()->route('frontend.login');
    //     }
    // }
}
