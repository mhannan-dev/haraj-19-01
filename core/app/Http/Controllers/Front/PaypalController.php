<?php

namespace App\Http\Controllers\Front;

use Omnipay\Omnipay;
use App\Models\Payment;
use Http\Client\Exception;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PayPalController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true); //set it to 'false' when go live
    }

    /**
     * Call a view.
     */
    public function index()
    {
        $feature_ad = DB::table('ad_types')->select('price')->where('id', '=', session()->get('ad_type_id'))->first();
        return view('frontend.paypal_payment', compact('feature_ad'));
    }

    /**
     * Initiate a payment on PayPal.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function charge(Request $request)
    {
        // dd($request->all());
        if ($request->input('submit')) {
            try {
                $response = $this->gateway->purchase(array(
                    'amount' => $request->input('amount'),
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('payment/paypal-success'),
                    'cancelUrl' => url('payment/error'),
                ))->send();

                if ($response->isRedirect()) {
                    $response->redirect();
                } else {
                    return $response->getMessage();
                }
            } catch (Exception $e) {
                info($e);
                return $e->getMessage();
            }
        }
    }

    /**
     * Charge a payment and store the transaction.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function success(Request $request)
    {
        $feature_ad = DB::table('ad_types')->where('id', '=', session()->get('ad_type_id'))->first();
        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();
            if ($response->isSuccessful()) {
                // The customer has successfully paid.
                $last_ad_id = session()->get('advertisement_id');
                $new_ad = Advertisement::findOrFail($last_ad_id);
                $new_ad->ad_type_id = $feature_ad->id;
                $adCreatedDate = $new_ad->created_at;
                $new_ad->feature_expire_date =  $adCreatedDate->addDays($feature_ad->duration_days);
                $new_ad->is_featured = 1;
                $new_ad->update();

                $arr_body = $response->getData();
                // Insert transaction data into the database
                $payment = new Payment();
                $payment->payment_id = $arr_body['id'];
                $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr_body['state'];
                $payment->save();
                return "Payment is successful. Your transaction id is: " . $arr_body['id'];
                Session::flush();
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Transaction is declined';
        }
    }

    /**
     * Error Handling.
     */
    public function error()
    {
        return 'User cancelled the payment.';
    }
}
