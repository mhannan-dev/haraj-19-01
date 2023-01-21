<?php

namespace App\Http\Controllers\Front;

use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Session;

class PaystackController extends Controller
{
    public function paystack()
    {
        $feature_ad = DB::table('ad_types')->select('price')->where('id', '=', session()->get('ad_type_id'))->first();
        return view('frontend.paystack', compact('feature_ad'));
    }

    public function paystackVerify($reference)
    {
        return $reference;
    }

    public function stripePost(Request $request)
    {
        $feature_ad = DB::table('ad_types')->where('id', '=', session()->get('ad_type_id'))->first();
        Stripe::setApiKey(env('STRIPE_SECRET'));
        // dd($request->all());
        $payment = Charge::create([
            "amount" => $feature_ad->price,
            "currency" => "USD",
            "source" => $request->stripeToken,
            "description" => "Feature ad Payment",
        ]);

        if (isset($payment->id)) {
        $last_ad_id = session()->get('advertisement_id');
        $new_ad = Advertisement::findOrFail($last_ad_id);
        $new_ad->created_at = $feature_ad->start_date;
        $new_ad->feature_expire_date = $feature_ad->end_date;
        $new_ad->ad_type_id = $feature_ad->id;
        $new_ad->is_featured = 1;
        $new_ad->update();
        $notify[] = ['success', 'Payment Successfull and You ad make featured!!'];
        return redirect()->back()->withNotify($notify);
        Session::flush();
        }
    }
}
