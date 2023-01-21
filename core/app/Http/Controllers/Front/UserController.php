<?php

namespace App\Http\Controllers\Front;

use App\Models\Advertiser;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function getLogin(Request $request)
    {
        $pageTitle = "Login";
        if ($request->isMethod('POST')) {
            $data = $request->all();
            //Validation rules
            $rules = [
                'email' => 'required',
                'password' => 'required',
            ];
            //Validation message
            $customMessage = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid Email is required',
                'password.required' => 'Password is required',
            ];
            $this->validate($request, $rules, $customMessage);
            $advertiser = Advertiser::where('email', $request->email)->first();

            if(!Hash::check($data['password'], $advertiser->password)){
                $notify[] = ['error', 'Invalid Password'];
                return redirect()->back()->withNotify($notify);
            }
            if (!$advertiser) {
                $varcode = session()->get('code');
                $name = explode('@', $request->email)[0];

                $advertiser = new Advertiser();
                $advertiser->first_name = $name;
                $advertiser->email = $request->email;
                $advertiser->username = $name . '-' . random_int(1000, 9999);
                $advertiser->password = Hash::make($request->password);
                $advertiser->registration_code = $varcode ?? null;
                $advertiser->status = 1;
                $advertiser->save();
            }

            if (Auth::guard('advertiser')->attempt(['email' => $data['email'], 'status' => 1, 'password' => $data['password']])) {
                $notify[] = ['success', 'Login successful'];

                return redirect()->route('frontend.user.my_ads', compact('pageTitle'))->withNotify($notify);
            } else {
                $notify[] = ['error', 'Something error'];
                return redirect()->back()->withNotify($notify);
            }
        }
        return view('frontend.pages.user.login');
    }
    public function logout()
    {
        Auth::guard('advertiser')->logout();
        return redirect()->route('frontend.home');
    }
    protected function authenticated()
    {
        Auth::logoutOtherDevices(request('password'));
        $notify[] = ['success', 'Logout from other device'];
        return redirect()->route('frontend.home')->withNotify($notify);
    }
    public function sellerPublicProfile($id)
    {
        $data['seller'] = Advertiser::with('ads')->findOrFail($id);
        $data['soldAds'] = Advertisement::where('advertiser_id', $id)->where('status', 2)->select('id', 'city_id', 'advertiser_id', 'price', 'image', 'category_id')->get();
        // dd($data['soldAds']);
        return view('frontend.pages.public_ads.user_listing', $data);
    }


    public function forgotPassword(Request $request)
    {
        Session::forget('error');
        Session::forget('success');
        // dd($request->all());
        if ($request->isMethod('post')) {
            $data = $request->all();
            $emailCount = Advertiser::where('email', $data['checkingEmail'])->count();
            if ($emailCount == 0) {
                $message = "This email does not exist";
                return response()->json([
                    'status' => false,
                    'message' => $message
                ]);
            } else {
                //$email = $data['pwd_recovery_email'];
                try {
                    $random_password = rand(1111, 9999);
                    $new_password = Hash::make($random_password);
                    //Update password
                    Advertiser::where('email', $data['checkingEmail'])->update(['password' => $new_password]);
                    $user = Advertiser::where('email', $data['checkingEmail'])->first();
                    sendEmail($user, 'EVER_CODE', [
                        'code' => $random_password
                    ]);
                } catch (\Exception $th) {
                    return response()->json([
                        'status' => false,
                        'message' => $th
                    ]);
                }
            }
            //Return back to login page
            $message = "Check your email for login with new password";
            return response()->json([
                'status' => true,
                'message' => $message
            ]);
        }
    }
}
