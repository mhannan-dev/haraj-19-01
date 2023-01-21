<?php

namespace App\Http\Controllers\Admin;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CurrencyController extends Controller
{
    public function currencies(Request $request)
    {
        $search = $request->search;
        $pageTitle = "Manage Currencies";
        $currencies = Currency::orderBy('is_default', 'desc');
        if ($search) {
            $pageTitle = "Search Results of $search";
            $currencies = Currency::where('currency_code', 'like', "%$search%")->orWhere('currency_fullname', 'like', "%$search%")->orderBy('id', 'desc');
        }
        $currencies = $currencies->paginate(getPaginate());
        $emptyMessage = "No currencies available";
        return view('admin.currency.index', compact('pageTitle', 'emptyMessage', 'currencies', 'search'));
    }

    public function addEditCurrency(Request $request,  $id = null)
    {
        if ($id == "") {
			$currency = new Currency();
            $title = "Add Currency";
            $buttonText = "Save";
            $notify[] = ['success', 'Currency has been saved successfully!'];
		} else {
			$currency = Currency::find($id);
			$title = "Edit Currency";
			$buttonText = "Update";
            $notify[] = ['success', 'Currency updated successfully!'];
		}

        if ($request->isMethod('post')) {
			$data = $request->all();
            //dd($data);
            $rules = [
                'currency_fullname' => 'required',
                'currency_code' => 'required|unique:currencies,currency_code,' . $currency->id,
                'currency_symbol' => 'required',
                // 'currency_type' => 'required|in:1,2',
			];
			//Validation message
			$customMessage = [
				'currency_fullname.required' => 'Currency fullname is required',
				'currency_code.required' => 'Code is required',
				'currency_symbol.required' => 'Symbol is required'
			];
			$validator = Validator::make($data, $rules, $customMessage);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
            $general = GeneralSetting::first();
            $currency->currency_fullname = $data['currency_fullname'];
            $currency->currency_code = strtoupper($data['currency_code']);
            $currency->currency_symbol = $data['currency_symbol'];
            // $currency->rate = $data['rate'];
            // $currency->currency_type = $data['currency_type'];
            $currency->status = $request->status ? 1 : 0;

            // if ($request->is_default) {
            //     $default = $currency->where('is_default', 1)->first();
            //     if ($default) {
            //         $default->is_default = 0;
            //         $default->save();
            //     }
            //     $currency->status = 1;
            //     $general->cur_text = strtoupper($data['currency_code']);
            //     $general->cur_sym = $data['currency_symbol'];
            //     $general->save();
            // }
            $currency->is_default = $request->is_default ? 1 : 0;
			$currency->save();
			return back()->withNotify($notify);
		}
        return view('admin.currency.manage', compact('title', 'buttonText', 'currency'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'currency_fullname' => 'required',
            'currency_code' => 'required|unique:currencies',
            'currency_symbol' => 'required',
            'currency_type' => 'required|in:1,2',
        ]);

        $currency = new Currency();
        $this->currencySave($currency, $request);
        $notify[] = ['success', 'Currency updated successfully'];
        return back()->withNotify($notify);
    }
    public function update(Request $request)
    {
        dd($request->all());
        $currency = Currency::findOrFail($request->currency_id);
        $request->validate([
            'currency_fullname' => 'required',
            'currency_code' => 'required|unique:currencies,currency_code,' . $currency->id,
            'currency_symbol' => 'required',
            'currency_type' => 'required|in:1,2',
        ]);
        $general = GeneralSetting::first();
        $this->currencySave($currency, $request);
        $notify[] = ['success', 'Currency updated successfully'];
        return back()->withNotify($notify);
    }

    protected function currencySave($currency, $request)
    {
        $general = GeneralSetting::first();
        $currency->currency_fullname = $request->currency_fullname;
        $currency->currency_code = strtoupper($request->currency_code);
        $currency->currency_symbol = $request->currency_symbol;
        $currency->rate = $request->rate;
        $currency->currency_type = $request->currency_type;
        $currency->status = $request->status ? 1 : 0;

        if ($request->is_default) {
            $default = $currency->where('is_default', 1)->first();
            if ($default) {
                $default->is_default = 0;
                $default->save();
            }
            $currency->status = 1;
            $general->cur_text = strtoupper($request->currency_code);
            $general->cur_sym = $request->currency_symbol;
            $general->save();
        }
        $currency->is_default = $request->is_default ? 1 : 0;
        $currency->save();
    }

    public function updateApiKey(Request $request)
    {
        $request->validate([
            'fiat_api_key' => 'required',
            'crypto_api_key' => 'required',
        ]);
        $gnl = GeneralSetting::first();
        $gnl->fiat_currency_api = $request->fiat_api_key;
        $gnl->crypto_currency_api = $request->crypto_api_key;
        $gnl->save();
        $notify[] = ['success', 'Api Key Updated Successfully'];
        return back()->withNotify($notify);
    }
    public function statusChange(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Currency::where('id', $data['item_id'])->update(['status' => $status]);
            return  response()->json(['status' => $status, 'item_id' => $data['item_id']]);
        }
    }
}
