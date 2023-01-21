<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\AdComplain;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdvertisementController extends Controller
{
    public function getAllAds(Request $request)
    {
        $query_param = [];
        $search = $request['search'];
        $emptyMessage = "No Data Found";
        $advertiser_id = $request['advertiser_id'];
        $city_id = $request['city_id'];

        if ($request->has('search') && $request->search != null) {
            $key = explode(' ', $request['search']);

            $ads = Advertisement::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->where('title', 'like', "%{$value}%")
                        ->orwhere('color', 'like', "%{$value}%")
                        ->orwhere('brand', 'like', "%{$value}%")
                        ->orwhere('price', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        } else {
            $ads =  Advertisement::with(['advertiser', 'city'])
                ->when($request->city_id != null, function ($q) {
                    $q->where('city_id', request('city_id'));
                })->when($request->category_id != null, function ($q) {
                    $q->where('category_id', request('category_id'));
                })->when($request->status != null, function ($q) {
                    $q->where('status', request('status'));
                })->when($request->is_featured != null, function ($q) {
                    $q->where('is_featured', request('is_featured'));
                })->when($request->advertiser_id != null, function ($q) {
                    $q->where('advertiser_id', request('advertiser_id'));
                });
        }
        $ads = $ads->orderBy('view_count', 'desc')->paginate(getPaginate());
        // dd($ads);
        return view('admin.ads.index', compact('ads', 'search', 'advertiser_id', 'city_id', 'emptyMessage'));
    }
    public function getReports(Request $request)
    {
        $ad_reports =  AdComplain::with(['ad'])->paginate(getPaginate());
        return view('admin.ads.reports', compact('ad_reports'));
    }
    public function getEdit($id)
    {
        $item = Advertisement::with([
            'category' => function ($query) {
                $query->select('id', 'title');
            },'brand:id,title'
        ])->where('id', $id)->first();
        $brands = Brand::select('id','title','category_id')->where('status', 1)->get();
        return view('admin.ads.edit_form', compact('item','brands'));
    }
    public function postUpdate(Request $request, $id)
    {
        try {
            $advertisement = Advertisement::findOrFail($id);
            $advertisement->model = $request->model;
            $advertisement->year_of_manufacture = $request->year_of_manufacture;
            $advertisement->color = $request->color;
            $advertisement->edition = $request->edition;
            $advertisement->condition = $request->condition;
            $advertisement->price = $request->price;
            $advertisement->update();
            return redirect()->route('admin.all.ads')->with('success', 'Advertisement has been updated successfully !');
        } catch (\Exception $e) {
            info($e);
            DB::rollback();
            return redirect()->route('admin.all.ads')->with('success', 'Unable to update');
        }
    }
}
