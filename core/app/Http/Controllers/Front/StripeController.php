<?php

namespace App\Http\Controllers\Front;

use Stripe\Token;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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
        $data = $request->all();
        $rules = [
            'card_name' => 'required',
            'card_number' => 'required',
            'card_expiry_month' => 'required',
            'card_expiry_year' => 'required',
            'card_cvc' => 'required',
        ];
        //Validation message
        $customMessage = [
            'card_name.required' => 'Card name is required',
            'card_number.required' => 'Number is required',
            'card_expiry_month.required' => 'Month is required',
            'card_expiry_year.required' => 'Year is required',
            'card_cvc.required' => 'CVC is required'
        ];
        $validator = Validator::make($data, $rules, $customMessage);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe::setApiVersion("2020-03-02");
        $token = Token::create(array(
            "card" => array(
                "name" => $data['card_name'],
                "number" => $data['card_number'],
                "exp_month" => $data['card_expiry_month'],
                "exp_year" => $data['card_expiry_year'],
                "cvc" => $data['card_cvc'],
            )
        ));

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
            $new_ad->feature_expire_date = $adCreatedDate->addDays($feature_ad->duration);
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
