<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FeatureAdController extends Controller
{
    public function proceedToPay(Request $request)
    {
        //dd($request->all());
        $advertisement_id = $request->advertisement_id;
        // $advertisement_id = $request->session()->get('advertisement_id');
        $feature_ad_types = DB::table('ad_types')->where('status', '=', 1)->get();
        if ($request->isMethod('post')) {
            $feature_ad_price = DB::table('ad_types')->select('price','id')->where('id', '=', $request->ad_type_id)->first();
            // dd($feature_ad_price);
           // $advertisement_id = $request->session()->put('advertisement_id', $request->advertisement_id);
            // $ad_type_id = $request->session()->put('ad_type_id', $request->ad_type_id);
            $ad_type_id = $request->ad_type_id;
            return view('frontend.pages.ad.payment_sell_faster', compact('ad_type_id','advertisement_id','feature_ad_price'));
        }
        return view('frontend.pages.ad.sell_faster', compact('feature_ad_types','advertisement_id'));
    }
}
