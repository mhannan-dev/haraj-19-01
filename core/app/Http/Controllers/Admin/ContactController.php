<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Mail\UserEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Advertiser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Admin\Contact\ContactInterface;


class ContactController extends Controller
{
    protected $user_query;
    public function __construct(ContactInterface $user_query)
    {
        $this->user_query = $user_query;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->user_query->getPaginatedList($request, 4);
        $emptyMessage = "No data found";
        return view('admin.user_query.index', compact('emptyMessage'))
            ->withRows($this->resp->data);
    }
    public function reply(Request $request, $id)
    {
        $item = DB::table('advertisers')->where('id', $id)->first();
        $username = 'nousername';
        if ($request->isMethod("post")) {
            $data = $request->all();
            $rules = [
                'mail_body' => 'required|string|max:65000',
                'subject' => 'required|string|max:190',
            ];
            //Validation message
            $customMessage = [
                'mail_body.required' => 'Message is required',
                'subject.required' => 'Subject is required'
            ];
            // Check validation failure
            $validator = Validator::make($data, $rules, $customMessage);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            try {
                sendGeneralEmail($item->email, $request->subject, $request->mail_body, $item->first_name);
            } catch (Exception $th) {
                info($th);
            }
        }

        return view('admin.user_query.reply', compact('item'));
    }
}
