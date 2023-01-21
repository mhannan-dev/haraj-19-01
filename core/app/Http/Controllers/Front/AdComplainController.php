<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\AdComplain;
use Illuminate\Http\Request;

class AdComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postComplain(Request $request)
    {

        $rules = [
            'complain' => 'required'
        ];

        //Validation message
        $customMessage = [
            'complain.required' => 'Complain is required'
        ];
        $this->validate($request, $rules, $customMessage);

        $report = new AdComplain();
        $report->advertisement_id = $request->advertisement_id;
        $report->complain = $request->complain;
        $report->complain_details = $request->complain_details;
        $report->save();
        $notify[] = ['success', 'Complain submitted'];
        return redirect()->back()->withNotify($notify);
    }
}
