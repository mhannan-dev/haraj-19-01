<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\User\UserInterface;

class ManageUsersController extends Controller
{
    protected $users;
    public function __construct(UserInterface $users)
    {
        $this->users = $users;
    }

    public function allAdvertiser(Request $request)
    {
        $this->resp = $this->users->getPaginatedList($request, 20);

        return view('admin.users.list')
            ->withUsers($this->resp->data);
    }

    public function allUsers()
    {
        $pageTitle = 'Manage Users';
        $emptyMessage = 'No user found';
        $users = User::orderBy('id', 'desc')->paginate(getPaginate());

        return view('admin.users.list', compact('pageTitle', 'emptyMessage', 'users'));
    }

    public function activeUsers()
    {
        $pageTitle = 'Manage Active Users';
        $emptyMessage = 'No active user found';
        $users = User::active()->orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.users.list', compact('pageTitle', 'emptyMessage', 'users'));
    }

    public function bannedUsers()
    {
        $pageTitle = 'Banned Users';
        $emptyMessage = 'No banned user found';
        $users = User::banned()->orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.users.list', compact('pageTitle', 'emptyMessage', 'users'));
    }

    public function emailUnverifiedUsers()
    {
        $data['pageTitle'] = 'Email Unverified Users';
        $data['emptyMessage'] = 'No email unverified user found';
        $data['users'] = User::emailUnverified()->orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.users.list', $data);
    }
    public function emailVerifiedUsers()
    {
        $data['pageTitle'] = 'Email Verified Users';
        $data['emptyMessage'] = 'No email verified user found';
        $data['users'] = User::emailVerified()->orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.users.list', $data);
    }


    public function smsUnverifiedUsers()
    {
        $pageTitle = 'SMS Unverified Users';
        $emptyMessage = 'No sms unverified user found';
        $users = User::smsUnverified()->orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.users.list', compact('pageTitle', 'emptyMessage', 'users'));
    }


    public function smsVerifiedUsers()
    {
        $pageTitle = 'SMS Verified Users';
        $emptyMessage = 'No sms verified user found';
        $users = User::smsVerified()->orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.users.list', compact('pageTitle', 'emptyMessage', 'users'));
    }

    public function kycUnVerifiedUsers()
    {
        $pageTitle = 'KYC Verified Users';
        $emptyMessage = 'No kyc verified user found';
        $users = User::kycUnVerified()->orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.users.list', compact('pageTitle', 'emptyMessage', 'users'));
    }

    public function kycVerifiedUsers()
    {
        $pageTitle = 'KYC Verified Users';
        $emptyMessage = 'No kyc verified user found';
        $users = User::kycVerified()->orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.users.list', compact('pageTitle', 'emptyMessage', 'users'));
    }


    public function usersWithBalance()
    {
        $pageTitle = 'Users with balance';
        $emptyMessage = 'No sms verified user found';
        $users = User::where('balance', '!=', 0)->orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.users.list', compact('pageTitle', 'emptyMessage', 'users'));
    }



    public function search(Request $request, $scope)
    {
        $search = $request->search;
        $users = User::where(function ($user) use ($search) {
            $user->where('username', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        });
        $pageTitle = '';
        if ($scope == 'active') {
            $pageTitle = 'Active ';
            $users = $users->where('status', 1);
        } elseif ($scope == 'banned') {
            $pageTitle = 'Banned';
            $users = $users->where('status', 0);
        } elseif ($scope == 'emailUnverified') {
            $pageTitle = 'Email Unverified ';
            $users = $users->where('ev', 0);
        } elseif ($scope == 'smsUnverified') {
            $pageTitle = 'SMS Unverified ';
            $users = $users->where('sv', 0);
        } elseif ($scope == 'withBalance') {
            $pageTitle = 'With Balance ';
            $users = $users->where('balance', '!=', 0);
        }

        $users = $users->paginate(getPaginate());
        $pageTitle .= 'User Search - ' . $search;
        $emptyMessage = 'No search result found';
        return view('admin.users.list', compact('pageTitle', 'search', 'scope', 'emptyMessage', 'users'));
    }


    public function detail($id)
    {
        $data['pageTitle'] = 'Detail';
        $data['user'] = User::findOrFail($id);
        return view('admin.users.detail', $data);
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $countryData = json_decode(file_get_contents(resource_path('views/partials/country.json')));
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            // 'email' => 'required|email|max:90|unique:users,email,' . $user->id,
            'alt_mobile_no' => 'required|unique:users,alt_mobile_no,' . $user->id,
            'country' => 'required',
        ]);
        $countryCode = $request->country;
        $user->alt_mobile_no = $request->alt_mobile_no;
        $user->country_code = $countryCode;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        // $user->email = $request->email;
        $user->address = [
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => $countryData->$countryCode->country,
        ];
        $user->status = $request->status ? 1 : 0;
        $user->ev = $request->ev ? 1 : 0;
        $user->sv = $request->sv ? 1 : 0;
        $user->ts = $request->ts ? 1 : 0;
        $user->tv = $request->tv ? 1 : 0;
        $user->kyc_status = $request->kyc_status ? 1 : 0;
        $user->save();
        $notify[] = ['success', 'User detail has been updated'];
        return redirect()->back()->withNotify($notify);
    }


    public function userLoginHistory($id)
    {
        $user = User::findOrFail($id);
        $pageTitle = 'User Login History - ' . $user->username;
        $emptyMessage = 'No users login found.';
        $login_logs = $user->login_logs()->orderBy('id', 'desc')->with('user')->paginate(getPaginate());
        return view('admin.users.logins', compact('pageTitle', 'emptyMessage', 'login_logs'));
    }



    public function showEmailSingleForm($id)
    {
        $user = User::findOrFail($id);
        $pageTitle = 'Send Email To: ' . $user->username;
        return view('admin.users.email_single', compact('pageTitle', 'user'));
    }

    public function sendEmailSingle(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|max:65000',
            'subject' => 'required|string|max:190',
        ]);

        $user = User::findOrFail($id);
        sendGeneralEmail($user->email, $request->subject, $request->message, $user->username);
        $notify[] = ['success', $user->username . ' will receive an email shortly.'];
        return back()->withNotify($notify);
    }

    public function transactions(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($request->search) {
            $search = $request->search;
            $pageTitle = 'Search User Transactions : ' . $user->username;
            $transactions = $user->transactions()->where('trx', $search)->with('user')->orderBy('id', 'desc')->paginate(getPaginate());
            $emptyMessage = 'No transactions';
            return view('admin.reports.transactions', compact('pageTitle', 'search', 'user', 'transactions', 'emptyMessage'));
        }
        $pageTitle = 'User Transactions : ' . $user->username;
        $transactions = $user->transactions()->with('user')->orderBy('id', 'desc')->paginate(getPaginate());
        $emptyMessage = 'No transactions';
        return view('admin.reports.transactions', compact('pageTitle', 'user', 'transactions', 'emptyMessage'));
    }

    public function showEmailAllForm()
    {
        $pageTitle = 'Send Email To All Users';
        return view('admin.users.email_all', compact('pageTitle'));
    }

    public function sendEmailAll(Request $request)
    {

        $request->validate([
            'message' => 'required|string|max:65000',
            'subject' => 'required|string|max:190',
        ]);

        foreach (User::where('status', 1)->cursor() as $user) {
            sendGeneralEmail($user->email, $request->subject, $request->message, $user->username);
        }
        $notify[] = ['success', 'All users will receive an email shortly.'];
        return back()->withNotify($notify);
    }

    public function addSubBalance(Request $request, $id)
    {
        $request->validate(['amount' => 'required|numeric|gt:0']);
        $user = User::findOrFail($id);
        $wallet = Wallet::find($request->wallet_id);
        if (!$wallet) {
            $notify[] = ['error', 'Sorry wallet not found'];
            return back()->withNotify($notify);
        }
        $amount = $request->amount;
        $trx = getTrx();

        $transaction = new Transaction();

        if ($request->act) {
            $wallet->balance += $amount;
            //$notify[] = ['success', $wallet->currency->currency_symbol . $amount . ' has been added to this wallet'];
            $notify[] = ['success' . $amount . ' has been added to this wallet'];

            $transaction->trx_type = '+';
            $transaction->operation_type = 'add_balance';
            $transaction->details = 'Added balance via admin';

            $notifyTemplate = 'BAL_ADD';
            $notifyParams = [
                'trx' => $trx,
                'amount' => showAmount($amount, $wallet->currency),
                //'currency' => $wallet->currency->currency_code,
                'currency' => $wallet->currency_code,
                'post_balance' => showAmount($wallet->balance, $wallet->currency),
            ];
        } else {
            if ($amount > $wallet->balance) {
                $notify[] = ['error', 'This wallet has insufficient balance.'];
                return back()->withNotify($notify);
            }
            $wallet->balance -= $amount;


            $transaction->trx_type = '-';
            $transaction->operation_type = 'sub_balance';
            $transaction->details = 'Subtract balance via admin';


            $notifyTemplate = 'BAL_SUB';
            $notifyParams = [
                'trx' => $trx,
                'amount' => showAmount($amount, $wallet->currency),
                'currency' => $wallet->currency->currency_code,
                'post_balance' => showAmount($wallet->balance, $wallet->currency)
            ];
            $notify[] = ['success', $wallet->currency->currency_symbol . $amount . ' has been subtracted from this wallet'];
        }
        $wallet->save();
        $transaction->user_id = $user->id;
        $transaction->user_type = 'USER';
        $transaction->wallet_id = $wallet->id;
        $transaction->currency_id = $wallet->currency_id;
        $transaction->before_charge = $amount;
        $transaction->amount = $amount;
        $transaction->charge_type = '+';
        $transaction->post_balance =  $wallet->balance;
        $transaction->charge =  0;
        $transaction->trx = $trx;
        $transaction->save();
        notify($user, $notifyTemplate, $notifyParams);
        return back()->withNotify($notify);
    }
}




