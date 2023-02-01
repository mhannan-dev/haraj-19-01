<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Models\AdComplain;
use App\Models\Advertisement;
use App\Models\Advertiser;
use App\Models\Category;

class DashboardController extends Controller
{

    /**
     * The Guard implementation.
     *
     * @var Authenticator
     */
    //protected $auth;

    /**
     * Create a new authentication controller instance.
     *
     * @param  Authenticator  $auth
     * @return void
     */

    // public function __construct(Guard $auth)
    // {
    //     $this->auth = $auth;
    //     dd($auth);
    // }

    public function getIndex()
    {
        $myDate = \Carbon\Carbon::today()->subDays(30);
        $data['userCount'] = Advertiser::count();
        $data['lastWeekUserCount'] = Advertiser::where('created_at', '>=', $myDate)->count();

        $data['adCount'] = Advertisement::count();
        $data['lastWeekadCount'] = Advertisement::where('created_at', '>=', $myDate)->count();

        $data['categoryCount'] = Category::parent()->count();
        $data['lastWeekCategoryCount'] = Category::parent()->where('created_at', '>=', $myDate)->count();

        $data['reportCount'] = AdComplain::count();
        $data['lastWeekReportCount'] = AdComplain::where('created_at', '>=', $myDate)->count();

        return view('admin.dashboard.index', $data);
    }

    public function homepage()
    {
        return view('admin.dashboard.home');
    }
}
