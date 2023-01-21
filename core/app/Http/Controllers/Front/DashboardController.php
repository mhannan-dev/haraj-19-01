<?php

namespace App\Http\Controllers\Front;

use App\Models\Advertiser;
use App\Models\MessageUser;
use Illuminate\Http\Request;
use App\Http\Helpers\Generals;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function setting($id)
    {
        $data['userDetails'] =  Advertiser::select('id', 'email', 'username', 'password', 'show_mobile_no')->find($id);
        return view('frontend.pages.user.setting', $data);
    }

    public function check_current_pwd(Request $request)
    {

        $data = $request->all();
        if (Hash::check($data['current_password'], Auth::guard('advertiser')->user()->password)) {
            echo "true";
        } else {
            echo "false";
        }
    }
    public function chageMobileNoStatus(Request $request)
    {

        $user = Advertiser::findOrFail($request->id);
        $user->show_mobile_no = $request->show_mobile_no;
        $user->save();
        $notify[] = ['success', 'Status change successfully!'];
        return redirect()->back()->withNotify($notify);
    }
    /**
     * Update_current_password
     *
     */
    public function updateCurrentPassword(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            if (Hash::check($data['current_password'], Auth::guard('advertiser')->user()->password)) {
                //Check new and confirm password is matching
                if ($data['new_password'] == $data['again_new_password']) {
                    $user = Advertiser::find(auth()->user()->id);
                    $user->password = Hash::make($request->new_password);
                    $user->save();
                    $this->auth->logout();
                    $notify[] = ['success', 'Password Changed successfully!'];
                    return redirect()->back()->withNotify($notify);
                } else {
                    $notify[] = ['error', 'New password & confirm password is not same!'];
                    return redirect()->back()->withNotify($notify);
                }
            } else {
                $notify[] = ['error', 'Password not updated!'];
                return redirect()->back()->withNotify($notify);
            }
            return redirect()->back();
        }
    }
    /**
     * profile_update
     */
    public function profile(Request $request, $id = null)
    {
        $data['userData'] = Advertiser::find($id);
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $rules = [
                'first_name' => 'required',
                'mobile_no' => 'required',
                'city_id' => 'required'
            ];
            $validationMessages = [
                'first_name.required' => 'The name field can not be blank',
                'mobile_no.required' => 'The mobile no field can not be blank',
                'city_id.required' => 'The City field can not be blank'
            ];
            $this->validate($request, $rules, $validationMessages);
            Advertiser::where('email', Auth::guard('advertiser')->user()->email)->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'mobile_no' => $data['mobile_no'],
                'city_id' => $data['city_id'],
                'about' => $data['about']
            ]);
            $notify[] = ['success', 'Profile updated successfully!!'];
            return redirect()->back()->withNotify($notify);
        }
        return view('frontend.pages.user.profile_update', $data);
    }
    public function profileView(Request $request, $id)
    {
        $userDetails = Advertiser::find($id);
        $advertisements = Advertisement::with('advertiser', 'city', 'category', 'images')->where('advertiser_id', $id)->get();
        $soldAdvertisements = Advertisement::where('advertiser_id', $id)->where('status', 2)->select('id','city_id','advertiser_id', 'price', 'image','category_id')->get();
        return view('frontend.pages.user.profile_view', compact('userDetails', 'advertisements','soldAdvertisements'));
    }
    public function profileUpdatePhoto(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $user = Advertiser::find($id);
            $user->image = Generals::update('user/', $user->image, 'png', $request->file('image'));
            $user->update();
            $notify[] = ['success', 'Updated successfully!!'];
            return redirect()->back()->withNotify($notify);
        }
        $user = Advertiser::find($id);
        return view('frontend.pages.user.profile_image', compact('user'));
    }

    public function delete($id)
    {
        try {
            $advertiser = Advertiser::findOrFail($id);
            if (!is_null($advertiser)) {
                $advertiser->delete();
                // return response()->json(['success' => 'Your advertiser has been deleted!!']);
                return redirect()->route('frontend.login');
            }
        } catch (\Exception $th) {
            info($th);
            return redirect()->back();
            // return response()->json(['error' => 'Your advertiser not deleted!!']);
        }
    }

    public function chat()
    {
        $message_users = MessageUser::where('from', Auth::guard('advertiser')->user()->id)->where('is_deleted_from', 0)
            ->orWhere('to', Auth::guard('advertiser')->user()->id)->where('is_deleted_to', 0)
            ->orderBy('date', 'desc')->get();
        return view('frontend.pages.user.chat_page', compact('message_users'));
    }
    public function chatDeleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("messages")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Deleted successfully."]);
    }

    public function makeSold(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            Advertisement::where('id', $data['item_id'])->update(['status' => 2]);
            return response()->json(['success' => 200, 'message' => "Status updated successfully."]);
        }
    }
}
