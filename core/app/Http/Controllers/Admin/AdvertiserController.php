<?php

namespace App\Http\Controllers\Admin;

use App\Models\Advertiser;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdvertiserUpdateRequest;
use App\Repositories\Admin\Advertiser\AdvertiserInterface;



class AdvertiserController extends Controller
{

    protected $advertiser;
    public function __construct(AdvertiserInterface $advertiser)
    {
        $this->advertiser = $advertiser;
    }

    public function allAdvertiser(Request $request)
    {
        // dd($request->all());
        $query_param = [];
        $status = $request['status'];
        $search = $request['search'];
        $emptyMessage = "No Data Found";

        if ($request->has('search') && $request->search != null) {
            $key = explode(' ', $request['search']);
            $advertisers = Advertiser::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->where('email', 'like', "%{$value}%")
                        ->orwhere('first_name', 'like', "%{$value}%")
                        ->orwhere('last_name', 'like', "%{$value}%")
                        ->orwhere('mobile_no', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        } else {
            $advertisers = Advertiser::withCount(['ads', 'city'])->when($request->status != null, function ($q) {
                $q->where('status', request('status'));
            });
        }
        $advertisers = $advertisers->orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.advertisers.index', compact('advertisers', 'search', 'status', 'emptyMessage'));
    }

    public function profile($id)
    {
        $data['posted_ads'] = Advertisement::with('city', 'advertiser')->where('id', $id)->paginate(getPaginate());
        return view('admin.advertisers.profile', $data);
    }

    public function getEdit(Request $request, $id)
    {
        $this->resp = $this->advertiser->getShow($id);
        $buttonText = "Update";
        if (!$this->resp->status) {
            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }
        return view('admin.advertisers.edit', compact('buttonText'))->withRow($this->resp->data);
    }

    public function postUpdate(AdvertiserUpdateRequest $request, $id)
    {
        $this->resp = $this->advertiser->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
}
