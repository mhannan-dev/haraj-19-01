<?php

namespace App\Http\Controllers\Front;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Token;

class StripeController extends Controller
{
    public function stripe()
    {
        $feature_ad = DB::table('ad_types')->select('price')->where('id', '=', session()->get('ad_type_id'))->first();
        return view('frontend.stripe', compact('feature_ad'));
    }

    public function stripePost(Request $request)
    {
        $feature_ad = DB::table('ad_types')->where('id', '=', $request->feature_ad_id)->first();

        Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe::setApiVersion("2020-03-02");
        $token = Token::create(array(
            "card" => array(
                "name" => "$request->card_name",
                "number" => "$request->card_number",
                "exp_month" => $request->card_expiry_month,
                "exp_year" => $request->card_expiry_year,
                "cvc" => "$request->card_cvc",
            )
        ));
        // $payment = Charge::create(array(
        //     "card" => $request->stripecardToken,
        //     "amount" => $request->feature_ad_price,
        //     "currency" => "USD",
        //     "customer" => null,
        //     "description" => "Feature ad Payment",
        // ));
        $payment = Charge::create(array(
            'card' => $token['id'],
            'currency' => "USD",
            'amount' => $request->feature_ad_price,
            'description' => 'Feature ad Payment',
        ));
        if (isset($payment->id)) {

            $last_ad_id = session()->get('advertisement_id');
            $new_ad = Advertisement::findOrFail($last_ad_id);
            $new_ad->ad_type_id = $feature_ad->id;
            $adCreatedDate  = $new_ad->created_at;
            $new_ad->feature_expire_date = $adCreatedDate->addDays($feature_ad->duration_days);
            $new_ad->is_featured = 1;
            $new_ad->update();

            $new_payment = new Payment();
            $new_payment->payment_id = $payment->id;
            $new_payment->payer_id = $payment->calculated_statement_descriptor;
            $new_payment->amount = $payment->amount;
            $new_payment->currency = $payment->currency;
            $new_payment->payment_status = $payment->status;
            $new_payment->save();
            // Session::flush();
            $notify[] = ['success', 'Payment Successfull and You ad make featured!!'];
            return redirect()->route('frontend.home')->withNotify($notify);
        }
    }
}
