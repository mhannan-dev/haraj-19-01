<?php

namespace App\Http\Controllers\Front;

use App\Models\City;
use App\Models\Rating;
use App\Models\CMSPage;
use App\Models\Message;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Language;
use App\Models\UserQuery;
use App\Models\Advertiser;
use App\Models\MessageUser;
use App\Models\UserContact;
use Illuminate\Support\Str;
use App\Events\MessageEvent;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Helpers\Generals;
use App\Models\VisitorHistory;
use Illuminate\Support\Carbon;
use Torann\GeoIP\Facades\GeoIP;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\InterestAdvertisement;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function home()
    {
        // $MAC  = exec('getmac');
        // $visitorDeviceMac = strtok($MAC, ' ');
        $data['pageTitle'] = 'Home';
        $data['main_category'] = Category::with('ads', 'subCategories')->has('ads')->parent()->active()->orderBy('id', 'desc')->paginate(getPaginate());
        $data['sub_category'] =  Category::where(function ($query) {
            $query->where('parent_id', '!=', 0)->orWhereNull('parent_id');
        })->paginate(getPaginate());
        $user = Auth::guard('advertiser')->user();
        if ($user) {
            $data['mac_wise_ads'] = InterestAdvertisement::with('ad')->where('visitor_id', $user->id)->get(); //pivot table ads
        }
        $data['featured_ads'] = Advertisement::featured()->with(
            [
                'city' => function ($query) {
                    $query->select('id', 'title')->where('status', 1);
                },
                'images'
            ]
        )->where('created_at', '<=', Carbon::now())
            ->where('feature_expire_date', '>=', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->take(12)
            ->get();

        //Taking Visitor Information
        $visitorIp  = $_SERVER['REMOTE_ADDR'];
        $visitorDetails = GeoIP::getLocation($visitorIp);
        // $checkVisitorIp = VisitorHistory::where('mac_address', $visitorDeviceMac)->first();
        // dd($visitorDetails->ip);
        // if ($checkVisitorIp == null) {
        //     $visitor = new VisitorHistory();
        //     $visitor->ip_address = $visitorDetails->ip;
        //     $visitor->mac_address = $visitorDeviceMac;
        //     $visitor->country = $visitorDetails->country;
        //     $visitor->city = $visitorDetails->city;
        //     $visitor->state_name = $visitorDetails->state_name;
        //     $visitor->lat = $visitorDetails->lat;
        //     $visitor->lon = $visitorDetails->lon;
        //     $visitor->user_ip_view_count = 1;
        //     $visitor->save();
        // } else {
        //     DB::table('visitor_histories')->where('mac_address', $checkVisitorIp->mac_address)->increment('user_ip_view_count');
        // }
        //Taking Visitor Information end code block
        return view('frontend.index', $data);
    }

    public function cms_page(Request $request)
    {
        $domain_name = DB::table('general_settings')->pluck('domain_name')->first();
        $currentRoute = url()->current();
        $currentRoute = Str::replace('http://localhost/haraj_final/', '', $currentRoute);
        // $currentRoute = Str::replace($domain_name, '', $currentRoute);
        $cmsRoutes = CMSPage::where('status', 1)->get()->pluck('slug')->toArray();
        if (in_array($currentRoute, $cmsRoutes)) {
            $cmsPageDetails = CMSPage::where('slug', $currentRoute)->first()->toArray();
            $related_page = CMSPage::where('position', '!=', 1)->inRandomOrder()->take(4)->get();
            return view('frontend.pages.cms.index', compact('cmsPageDetails', 'related_page'));
        } else {
            abort(404);
        }
    }

    public function  categoryWiseAds($id)
    {
        $data['ads'] = Advertisement::with('category', 'city')->where('category_id', $id)->orderBy('id', 'desc')->paginate(12);
        $data['ad_under_child_category'] = Advertisement::with('category', 'city')->where('sub_category_id', $id)->orderBy('id', 'desc')->paginate(getPaginate());
        $data['single_category'] = DB::table('categories')->where('id',$id)->where('parent_id', 0)->first();
        $data['category'] = DB::table('categories')->where('parent_id', 0)->get();
        $data['sub_category'] =  Category::withCount('subCategories')->orderBy('id', 'DESC')->where('parent_id', 0)->active()->get();
        $data['cities'] =  City::orderBy('id', 'DESC')->active()->get();
        // dd($data['cities']);

        return view('frontend.pages.public_ads.catgory_ad', $data);
    }
    public function  checkFav(Request $request)
    {
        $advertiser = Auth::guard('advertiser')->user();
        $data = [];
        if ($advertiser) {
            $data['status'] = DB::table('advertisement_advertiser')
                ->where('advertiser_id', $request->advertiser_id)
                ->where('advertisement_id', $request->advertisement_id)
                ->first();
        }
        return response()->json($data);
    }

    public function fetchSubCategory(Request $request)
    {
        if($request->category_id == 'all_category'){
            $data['subCategories'] =  DB::table('categories')->where('parent_id','!=', 0)->get();
            return response()->json($data);
        }else{
            $data['subCategories'] =  DB::table('categories')->where('parent_id',$request->category_id)->where('parent_id','!=', 0)->get();;
            return response()->json($data);
        }

    }

    public function fetchBrand(Request $request)
    {

         //by only category
         if ($request->brand_id == 'all_category') {
            $data['brands'] =  DB::table('brands')->orderBy('id',"DESC")->get();
            return response()->json($data);
        }else{
            $data['brands'] =  DB::table('brands')->where('category_id',$request->brand_id)->orderBy('id',"DESC")->get();
            return response()->json($data);
        }
    }
    public function getAddsByCategoryFilters(Request $request)
    {
        //by only category
        if ($request->ajax()) {
            if ($request->category_id == 'all_category') {
                $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->orderBy('id', 'desc')->paginate(12);
                $data['pagination'] = (string)  $data['results']->links();
                return response()->json($data);
            }else{
                $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('category_id', $request->category_id)->orderBy('id', 'desc')->paginate(12);
                $data['pagination'] = (string)  $data['results']->links();
                return response()->json($data);
            }
        }
    }
    public function getAddsBySubCategoryFilters(Request $request)
    {
        //by category and sub-category
        if($request->category_id == 'all_category'){
            $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('sub_category_id', $request->sub_category)->orderBy('id', 'desc')->paginate(12);
            $data['pagination'] = (string)  $data['results']->links();
            return response()->json($data);
        }else{
            $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('sub_category_id', $request->sub_category)->where('category_id', $request->category_id)->orderBy('id', 'desc')->paginate(12);
            $data['pagination'] = (string)  $data['results']->links();
            return response()->json($data);
        }

    }
    public function getAddsByBrandFilters(Request $request)
    {
        //by category and brand

        if($request->category_id == 'all_category'){
            $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('brand_id', $request->brand_id)->orderBy('id', 'desc')->paginate(12);
             $data['pagination'] = (string)  $data['results']->links();
            return response()->json($data);
        }else{
            $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('brand_id', $request->brand_id)->where('category_id', $request->category_id)->orderBy('id', 'desc')->paginate(12);
             $data['pagination'] = (string)  $data['results']->links();
            return response()->json($data);
        }

    }
    public function getAddsByLocation(Request $request)
    {
        //by category and brand
        $allowType = session()->get('allow_type');
        if($allowType == null){
            Session::put('allow_type','allow');
            $latitude =$request->latitude;
            $longitude =$request->longitude;
            $radius = 50;
            $data['results'] = Advertisement::with('category','city','favourite_to_users')->selectRaw("id, advertiser_id, latitude,longitude ,
            category_id,type_id,city_id,sub_category_id,title,slug,price,image,

            ( 6371 * acos( cos( radians(?) ) *
              cos( radians( latitude ) )
              * cos( radians( longitude ) - radians(?)
              ) + sin( radians(?) ) *
              sin( radians( latitude ) ) )
            ) AS distance", [$latitude, $longitude, $latitude])
                ->having("distance", "<", $radius)
                ->orderBy("distance",'asc')
                ->get();
            // $data['results'] = [];
            $data['type'] ="allow";
            return response()->json($data);
        }else{
            session()->forget('allow_type');
            // $data['results'] =[];
            $data['type'] ="disallow";
            return response()->json($data);
        }


    }
    public function getAddsBySortFilters(Request $request)
    {
        //by category and brand
        $categoryId = $request->category_id;
        $subCategoryId = $request->sub_category_id;
        $brandId = $request->brand_id;


        //===============releace date Start===================
            if ($request->sort_type == 'releace_date') {
                if ($categoryId == 'all_category' &&  $subCategoryId == null &&  $brandId == null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->orderBy('created_at', 'ASC')->get();
                    return response()->json($data);
                } elseif ($categoryId != null &&  $subCategoryId == null &&  $brandId == null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('category_id', $categoryId)->orderBy('created_at', 'ASC')->get();
                    return response()->json($data);

                } elseif ($categoryId != "all_category"  && $categoryId != null &&  $subCategoryId != null &&  $brandId == null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('category_id', $categoryId)->where('sub_category_id', $subCategoryId)->orderBy('created_at', 'ASC')->get();
                    return response()->json($data);

                } elseif ($categoryId != "all_category" && $categoryId != null &&  $subCategoryId == null &&  $brandId != null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('category_id', $categoryId)->where('brand_id', $brandId)->orderBy('created_at', 'ASC')->get();
                    return response()->json($data);

                }elseif ($categoryId == "all_category" && $subCategoryId != null && $brandId == null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('sub_category_id',$subCategoryId)->orderBy('created_at', 'ASC')->get();
                    return response()->json($data);
                }elseif ($categoryId == "all_category" && $subCategoryId == null && $brandId != null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('brand_id',$brandId)->orderBy('created_at', 'ASC')->get();
                    return response()->json($data);
                }elseif ($categoryId != "all_category" && $categoryId != null &&  $subCategoryId != null &&  $brandId != null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('category_id', $categoryId)->where('brand_id', $brandId)->orderBy('created_at', 'ASC')->get();
                    return response()->json($data);

                }
            }elseif($request->sort_type == 'low_price'){
                if ($categoryId == 'all_category' &&  $subCategoryId == null &&  $brandId == null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->orderBy('price', 'ASC')->get();
                    return response()->json($data);
                } elseif ($categoryId != null &&  $subCategoryId == null &&  $brandId == null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('category_id', $categoryId)->orderBy('price', 'ASC')->get();
                    return response()->json($data);

                } elseif ($categoryId != "all_category"  && $categoryId != null &&  $subCategoryId != null &&  $brandId == null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('category_id', $categoryId)->where('sub_category_id', $subCategoryId)->orderBy('price', 'ASC')->get();
                    return response()->json($data);

                } elseif ($categoryId != "all_category" && $categoryId != null &&  $subCategoryId == null &&  $brandId != null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('category_id', $categoryId)->where('brand_id', $brandId)->orderBy('price', 'ASC')->get();
                    return response()->json($data);

                }elseif ($categoryId == "all_category" && $subCategoryId != null && $brandId == null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('sub_category_id',$subCategoryId)->orderBy('price', 'ASC')->get();
                    return response()->json($data);
                }elseif ($categoryId == "all_category" && $subCategoryId == null && $brandId != null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('brand_id',$brandId)->orderBy('price', 'ASC')->get();
                    return response()->json($data);
                }elseif ($categoryId != "all_category" && $categoryId != null &&  $subCategoryId != null &&  $brandId != null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('category_id', $categoryId)->where('brand_id', $brandId)->orderBy('price', 'ASC')->get();
                    return response()->json($data);

                }

            }elseif($request->sort_type == 'high_price'){
                if ($categoryId == 'all_category' &&  $subCategoryId == null &&  $brandId == null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->orderBy('price', 'DESC')->get();
                    return response()->json($data);
                } elseif ($categoryId != null &&  $subCategoryId == null &&  $brandId == null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('category_id', $categoryId)->orderBy('price', 'DESC')->get();
                    return response()->json($data);

                } elseif ($categoryId != "all_category"  && $categoryId != null &&  $subCategoryId != null &&  $brandId == null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('category_id', $categoryId)->where('sub_category_id', $subCategoryId)->orderBy('price', 'DESC')->get();
                    return response()->json($data);

                }elseif ($categoryId != "all_category" && $categoryId != null &&  $subCategoryId == null &&  $brandId != null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('category_id', $categoryId)->where('brand_id', $brandId)->orderBy('price', 'DESC')->get();
                    return response()->json($data);

                }elseif ($categoryId == "all_category" && $subCategoryId != null && $brandId == null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('sub_category_id',$subCategoryId)->orderBy('price', 'DESC')->get();
                    return response()->json($data);
                }elseif ($categoryId == "all_category" && $subCategoryId == null && $brandId != null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('brand_id',$brandId)->orderBy('price', 'DESC')->get();
                    return response()->json($data);
                }elseif ($categoryId != "all_category" && $categoryId != null &&  $subCategoryId != null &&  $brandId != null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('category_id', $categoryId)->where('brand_id', $brandId)->orderBy('price', 'DESC')->get();
                    return response()->json($data);

                }

            }elseif($request->sort_type == 'location_distance'){
                $latitude =$request->latitude;
                $longitude =$request->longitude;
                $radius = 50;
                if ($categoryId == 'all_category' &&  $subCategoryId == null &&  $brandId == null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->selectRaw("id, advertiser_id, latitude,longitude ,
                    category_id,type_id,city_id,sub_category_id,title,slug,price,image,

                    ( 6371 * acos( cos( radians(?) ) *
                      cos( radians( latitude ) )
                      * cos( radians( longitude ) - radians(?)
                      ) + sin( radians(?) ) *
                      sin( radians( latitude ) ) )
                    ) AS distance", [$latitude, $longitude, $latitude])
                        ->having("distance", "<", $radius)
                        ->orderBy("distance",'asc')
                        ->get();
                    return response()->json($data);
                } elseif ($categoryId != null &&  $subCategoryId == null &&  $brandId == null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('category_id', $categoryId)->selectRaw("id, advertiser_id, latitude,longitude ,
                    category_id,type_id,city_id,sub_category_id,title,slug,price,image,

                    ( 6371 * acos( cos( radians(?) ) *
                      cos( radians( latitude ) )
                      * cos( radians( longitude ) - radians(?)
                      ) + sin( radians(?) ) *
                      sin( radians( latitude ) ) )
                    ) AS distance", [$latitude, $longitude, $latitude])
                        ->having("distance", "<", $radius)
                        ->orderBy("distance",'asc')
                        ->get();
                    return response()->json($data);

                } elseif ($categoryId != "all_category"  && $categoryId != null &&  $subCategoryId != null &&  $brandId == null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('category_id', $categoryId)->where('sub_category_id', $subCategoryId)->selectRaw("id, advertiser_id, latitude,longitude ,
                    category_id,type_id,city_id,sub_category_id,title,slug,price,image,

                    ( 6371 * acos( cos( radians(?) ) *
                      cos( radians( latitude ) )
                      * cos( radians( longitude ) - radians(?)
                      ) + sin( radians(?) ) *
                      sin( radians( latitude ) ) )
                    ) AS distance", [$latitude, $longitude, $latitude])
                        ->having("distance", "<", $radius)
                        ->orderBy("distance",'asc')
                        ->get();
                    return response()->json($data);

                }elseif ($categoryId != "all_category" && $categoryId != null &&  $subCategoryId == null &&  $brandId != null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('category_id', $categoryId)->where('brand_id', $brandId)->selectRaw("id, advertiser_id, latitude,longitude ,
                    category_id,type_id,city_id,sub_category_id,title,slug,price,image,

                    ( 6371 * acos( cos( radians(?) ) *
                      cos( radians( latitude ) )
                      * cos( radians( longitude ) - radians(?)
                      ) + sin( radians(?) ) *
                      sin( radians( latitude ) ) )
                    ) AS distance", [$latitude, $longitude, $latitude])
                        ->having("distance", "<", $radius)
                        ->orderBy("distance",'asc')
                        ->get();
                    return response()->json($data);

                }elseif ($categoryId == "all_category" && $subCategoryId != null && $brandId == null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('sub_category_id',$subCategoryId)->orderBy('price', 'DESC')->selectRaw("id, advertiser_id, latitude,longitude ,
                    category_id,type_id,city_id,sub_category_id,title,slug,price,image,

                    ( 6371 * acos( cos( radians(?) ) *
                      cos( radians( latitude ) )
                      * cos( radians( longitude ) - radians(?)
                      ) + sin( radians(?) ) *
                      sin( radians( latitude ) ) )
                    ) AS distance", [$latitude, $longitude, $latitude])
                        ->having("distance", "<", $radius)
                        ->orderBy("distance",'asc')
                        ->get();
                    return response()->json($data);
                }elseif ($categoryId == "all_category" && $subCategoryId == null && $brandId != null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('brand_id',$brandId)->orderBy('price', 'DESC')->selectRaw("id, advertiser_id, latitude,longitude ,
                    category_id,type_id,city_id,sub_category_id,title,slug,price,image,

                    ( 6371 * acos( cos( radians(?) ) *
                      cos( radians( latitude ) )
                      * cos( radians( longitude ) - radians(?)
                      ) + sin( radians(?) ) *
                      sin( radians( latitude ) ) )
                    ) AS distance", [$latitude, $longitude, $latitude])
                        ->having("distance", "<", $radius)
                        ->orderBy("distance",'asc')
                        ->get();
                    return response()->json($data);
                }elseif ($categoryId != "all_category" && $categoryId != null &&  $subCategoryId != null &&  $brandId != null) {
                    $data['results'] =  Advertisement::with('category', 'city','favourite_to_users')->where('category_id', $categoryId)->where('brand_id', $brandId)->selectRaw("id, advertiser_id, latitude,longitude ,
                    category_id,type_id,city_id,sub_category_id,title,slug,price,image,

                    ( 6371 * acos( cos( radians(?) ) *
                      cos( radians( latitude ) )
                      * cos( radians( longitude ) - radians(?)
                      ) + sin( radians(?) ) *
                      sin( radians( latitude ) ) )
                    ) AS distance", [$latitude, $longitude, $latitude])
                        ->having("distance", "<", $radius)
                        ->orderBy("distance",'asc')
                        ->get();
                    return response()->json($data);

                }

            }

            //===============releace date End===================
    }

    public function childCategoryAds($id)
    {

        $data['ads'] = Advertisement::with('category', 'city')->where('sub_category_id', $id)->orderBy('id', 'desc')->paginate(getPaginate(12));
        $data['cities'] =  City::orderBy('id', 'DESC')->active()->get();
        $data['category'] = DB::table('categories')->where('parent_id', 0)->get();

        // dd($data['cities']);
        return view('frontend.pages.public_ads.child_catgory_ad', $data);
    }

    public function cityWiseAds($id)
    {
        $data['ads'] = Advertisement::with('city')->where('city_id', $id)->orderBy('id', 'desc')->paginate(getPaginate(12));
        $data['cities'] =  City::orderBy('id', 'DESC')->active()->get();
        return view('frontend.pages.public_ads.city_ad', $data);
    }

    public function details($slug, $id)
    {
        $details = Advertisement::with('advertiser', 'city', 'category', 'images')->where('slug', $slug)->first();

        $checkFavourite = DB::table('advertisement_advertiser')
            ->where('advertiser_id', '=', $details->advertiser_id)
            ->where('advertisement_id', '=', $details->id)
            ->first();

        //Taking Visitor Information
        $visited_ad_count = InterestAdvertisement::where('interest_advertisement_id', $details->id)->first();
        if (isset($visited_ad_count)) {
            $visieted_interest = InterestAdvertisement::where('id', $visited_ad_count->id)->first();
            // dd($visieted_interest);
            $visieted_interest->interest_advertisement_id  = $visited_ad_count->interest_advertisement_id;
            $visieted_interest->update();
        } else {
            $user = Auth::guard('advertiser')->user();
            if ($user) {
                $visitor_interest = new InterestAdvertisement();
                $visitor_interest->visitor_id = $user->id;
                $visitor_interest->ip_address = $_SERVER['REMOTE_ADDR'];
                $visitor_interest->interest_advertisement_id  = $details->id;
                $visitor_interest->save();
                //Taking Visitor Information end code block
            }
        }

        if (isset($details)) {
            DB::table('advertisements')->where('id', $id)->increment('view_count');
        }
        $related_products = Advertisement::with('category')
            ->where('category_id', $details->category_id)
            ->where('slug', '!=', $details->slug)
            ->inRandomOrder()->take(4)->get();
        $user_rating = Rating::where('advertiser_id', $details->advertiser_id)->select('rating')->get();

        return view('frontend.pages.public_ads.details', compact('details', 'related_products', 'user_rating', 'checkFavourite'));
    }


    public function allAds(Request $request)
    {
        $query = Advertisement::query()->with('category', 'city', 'advertiser');
        if ($request->ajax()) {
            $all_ads =  $query->where('category_id', $request->category)
                ->orWhere('city_id', $request->city_id);

            if (isset($request->sort) && !empty($request->sort)) {
                if ($request->sort == "latest_ads") {
                    $all_ads = Advertisement::with('category', 'city', 'advertiser')->orderBy('id', 'DESC');
                } else if ($request->sort == "lowest_price_wise_ads") {
                    $all_ads = Advertisement::with('category', 'city', 'advertiser')->orderBy('price', 'ASC');
                } else if ($request->sort == "highest_price_wise_ads") {
                    $all_ads = Advertisement::with('category', 'city', 'advertiser')->orderBy('price', 'DESC');
                } else if ($request->sort == "oldest_ads") {
                    $all_ads = Advertisement::with('category', 'city', 'advertiser')->orderBy('id', 'ASC');
                }
            }

            $all_ads = $all_ads->get();
            return response()->json(['all_ads' => $all_ads]);
        }
        $all_ads = $query->paginate(getPaginate());
        $all_city = City::with('ads')->select('id', 'slug', 'title')->orderBy('id', 'desc')->get();
        return view('frontend.pages.public_ads.all_ads', compact('all_ads', 'all_city'));
    }

    public function search(Request $request)
    {
        if (isset($_REQUEST['search']) && !empty($_REQUEST['search'])) {
            $search_product = $_REQUEST['search'];
            $categoryDetails['catDetails']['title'] = $search_product;
            $categoryDetails['catDetails']['description'] = "Search result for " . $search_product;

            $all_ads = Advertisement::join('cities', 'cities.id', '=', 'advertisements.city_id')->join('categories', 'categories.id', '=', 'advertisements.category_id')
                ->where(function ($query) use ($search_product) {
                    $query->where('advertisements.title', 'like', '%' . $search_product . '%')
                        ->orWhere('advertisements.price', 'like', '%' . $search_product . '%')
                        ->orWhere('advertisements.brand', 'like', '%' . $search_product . '%')
                        ->orWhere('advertisements.color', 'like', '%' . $search_product . '%')
                        ->orWhere('advertisements.condition', 'like', '%' . $search_product . '%')
                        ->orWhere('advertisements.authenticity', 'like', '%' . $search_product . '%')
                        ->orWhere('categories.title', 'like', '%' . $search_product . '%')
                        ->orWhere('cities.title', 'like', '%' . $search_product . '%');
                })
                ->select('advertisements.*')->get();
            // dd($all_ads);
            $page_name = "search_result";
            return view('frontend.pages.public_ads.listing', compact('all_ads', 'categoryDetails', 'page_name'));
        }
    }

    //Auto complete
    public function autoSearch(Request $request)
    {
        $query = $request->get('term', '');
        $ads_data = Advertisement::where('title', 'LIKE', '%' . $query . '%')->select('id', 'title')->limit(8)->get();
        $data = [];
        foreach ($ads_data as $item) {
            $data[] = [
                'value' => $item->title,
                'id' => $item->id
            ];
        }
        if (count($data)) {
            return $data;
        } else {
            return ['value' => 'No result found', 'id' => ''];
        }
    }

    public function registerUser(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $userCount = Advertiser::where('email', $data['email'])->count();
            if ($userCount > 0) {
                $notify[] = ['error', 'User already exist!'];
                return back()->withNotify($notify);
            } else {
                $user = new Advertiser();
                $user->first_name = $data['first_name'];
                $user->last_name = $data['last_name'];
                $user->username = $data['username'];
                $user->mobile_no = $data['mobile_no'];
                $user->email = $data['email'];
                $user->registration_code = random_int(111111, 999999);
                $user->password = Hash::make($data['password']);
                $user->save();
                try {
                    sendEmail($user, 'EVER_CODE', [
                        'code' => $user->registration_code
                    ]);
                } catch (\Exception $th) {
                    throw $th;
                }
                Auth::guard('advertiser')->logout();
                $notify[] = ['success', 'Please confirm your email to active your account'];
                return redirect()->route('frontend.verify')->withNotify($notify);
            }
        }
        return view('frontend.pages.user.register');
    }
    public function verify(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $user = DB::table('advertisers')->where('registration_code', $data['registration_code'])->update(['status' => 1]);
            if ($user == null) {
                $notify[] = ['error', 'Code does not exist'];
                return redirect()->back()->withNotify($notify);
            }
            $notify[] = ['success', 'Congratulations you are now verified'];
            return redirect()->route('frontend.login')->withNotify($notify);
        }
        return view('frontend.pages.user.verify');
    }

    public function checkEmail(Request $request)
    {
        $data = $request->all();
        $rules = [
            'checkingEmail' => 'required|email:rfc,dns',
        ];
        //Validation message
        $customMessage = [
            'checkingEmail.required' => 'Name is required',
            'checkingEmail.email' => 'Please provide valid email',
        ];
        $validator = Validator::make($data, $rules, $customMessage);
        // Check validation failure
        if ($validator->fails()) {
            return response()->json([
                'status' => 1,
                'message' => $validator->errors()
            ]);
        }
        $email = $request->checkingEmail;

        $advertiser = Advertiser::where('status', 1)->where('email', $email)->first();
        // dd($user);
        if (!$advertiser) {
            session()->put('user_email', $email);

            $data = (object)[
                'email' => $email,
                'first_name' => 'Unknown',
                'username' => 'unknown-username',
            ];

            try {
                if (session()->has('code')) {
                    session()->forget('code');
                }
                $code = rand();
                session()->put('code', $code);
                sendEmail($data, 'EVER_CODE', [
                    'code' => $code
                ]);
            } catch (\Exception $th) {
                throw $th;
            }
            return response()->json([
                'status' => false
            ]);
        } else {
            if (session()->has('user_email')) {
                session()->forget('user_email');
            }
            return response()->json([
                'status' => true
            ]);
            session()->put('user_email', $email);
        }
    }

    public function checkCode(Request $request)
    {
        $varcode = session()->get('code');
        $reqcode = $request->varCode;
        if ($varcode == $reqcode) {
            return response()->json([
                'status' => true
            ]);
        } else {
            return response()->json([
                'status' => false
            ]);
        }
    }

    function loadMore(Request $request)
    {
        $advertiser = Auth::guard('advertiser')->user();
        // dd($advertiser);
        $currency = Currency::select('currency_code', 'currency_symbol')->where('status', '=', 1)->where('is_default', '=', 1)->first();
        if ($request->ajax()) {
            if ($request->id > 0) {
                $data = Advertisement::where('id', '<', $request->id)->where('is_featured', '=', 0)->orderBy('id', 'DESC')->limit(8)->get();
            } else {
                $data = Advertisement::orderBy('id', 'DESC')->where('is_featured', '=', 0)->limit(8)->get();
            }
            // dd($data);
            $output = '';
            $last_id = '';
            if (!$data->isEmpty()) {
                foreach ($data as $row) {
                    if ($advertiser) {
                        $checkFavourite = DB::table('advertisement_advertiser')
                            ->where('advertiser_id', $advertiser->id)
                            ->where('advertisement_id', $row->id)->first();
                        // dd($checkFavourite);
                        if ($checkFavourite != null) {
                            $color = 'red';
                        } else {
                            $color = '';
                        }
                    } else {
                        $color = '';
                    }
                    // dd($row);
                    $output .= '
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-20">
                        <div class="product-single-item">
                            <div class="product-wishlist">
                                                <a class="fav-select" data-ad_id="' . $row->id . '" href="javascript:void(0)">
                                                    <span>
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            class="sc-AxjAm dJbVhz fav-icon" style="fill:' .  $color  . '">
                                                            <path
                                                                d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>

                            <a href="' . url('ads/details/' . $row->slug . '/' . $row->id) . '">
                                <div class="thumb">
                                    <img src="' . asset('core/storage/app/public/advertisement_images/' . $row->image) . '" alt="AdImage">
                                </div>
                                <div class="content">
                                    <span class="sub-title">' . $row->city->title . '</span>
                                    <h5 class="title">' . $row->title . '</h5>
                                    <span class="inner-sub-title">' . $row->category->title . '</span>
                                    <h5 class="inner-title">' . $row->price . ' ' . $currency->currency_code . '</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    ';
                    $last_id = $row->id;
                }
                $output .= '
                <div id="load_more" class="load-more-btn text-center mt-60">
                    <button type="button" name="load_more_button" class="btn--base" data-id="' . $last_id . '" id="load_more_button">Load More</button>
                </div>
                ';
            } else {
                $output .= '';
            }
            echo $output;
        }
    }

    public function unblockUser(Request $request)
    {
        $from = Auth::guard('advertiser')->user()->id;

        MessageUser::where('from', $from)->where('to', $request->recever_id)->update(['is_block' => 0]);

        MessageUser::where('to',  $from)->where('from', $request->recever_id)->update(['is_block' => 0]);

        return response()->json([
            'status' => 1
        ]);
    }

    public function helps()
    {
        $cms = CMSPage::where('position', 4)->get();
        return view('frontend.pages.cms.help', compact('cms'));
    }

    public function searchHelp(Request $request)
    {
        $cms = CMSPage::where('title', 'like', "%$request->search%")->get();
        return view('frontend.pages.cms.help', compact('cms'));
    }

    public function cmsSection($slug)
    {
        $cms = CMSPage::where('slug', $slug)->where('status', 1)->first();
        $related_cms = CMSPage::where('slug', '!=', $slug)->where('position', 4)->where('status', 1)->get();
        return view('frontend.pages.cms.help_details', compact('cms', 'related_cms'));
    }

    public function contact(Request $request)
    {
        $data['title'] = "Contact";
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'user_message' => 'required',
            ];
            //Validation message
            $customMessage = [
                'name.required' => 'Name is required',
                'email.email' => 'Email is required',
                'subject.required' => 'Subject is required',
                'user_message.required' => 'Message is required',
            ];
            $validator = Validator::make($data, $rules, $customMessage);
            // Check validation failure
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $query = new UserQuery();
            $query->name = $data['name'];
            $query->email = $data['email'];
            $query->subject = $data['subject'];
            $query->attachment = Generals::update('user_mail_attachment/', $query->image, 'png', $request->file('image'));
            $query->user_message = $data['user_message'];
            $query->save();
            $notify[] = ['success', 'Thanks for your enquiry. We will get back to you soon'];
            return redirect()->back()->withNotify($notify);
        }
        return view('frontend.pages.cms.contact');
    }

    public function pageVote(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            if ($data['increment_value'] == 1) {
                try {
                    CMSPage::find($data['page_id'])->increment('vote_count');
                    return  response()->json(['status' => 'success']);
                } catch (\Exception $th) {
                    info($th);
                }
            }
        }
    }
    public function changeLanguage($lang = null)
    {
        // dd($lang);
        $language = Language::where('code', $lang)->first();
        if (!$language) $lang = 'en';
        session()->put('lang', $lang);
        // dd($aa);
        return redirect()->back();
    }

    public function detailsSendMessage(Request $request)
    {
        // dd($request->all());
        if (isset(Auth::guard('advertiser')->user()->id)) {
            $from = Auth::guard('advertiser')->user()->id;
            $to = $request->recever_id;
            $is_message_before = MessageUser::where('from',  $from)->where('to', $to)
                ->orWhere('from',  $to)->where('to', $from)->first();
            if ($is_message_before == null) {
                MessageUser::create([
                    'from' =>  $from,
                    'to' =>  $to,
                    'is_block' => 0,
                    'date' => Carbon::now(),
                ]);
            } else {
                $is_message_before->update([
                    'date' => Carbon::now(),
                ]);
                MessageUser::where('from', $from)->where('to', $request->recever_id)->update(['is_deleted_from' => 0, 'is_deleted_to' => 0]);
                MessageUser::where('to', $from)->where('from', $request->recever_id)->update(['is_deleted_to' => 0, 'is_deleted_from' => 0]);
            }

            $data = new Message();
            $data->from = $from;
            $data->to = $request->recever_id;
            $data->message = $request->message;
            $data->is_read = 0;

            if ($request->advertisement_id) {
                $msg_prd = new UserContact();
                $msg_prd->message_sender_id = Auth::guard('advertiser')->user()->id;
                $msg_prd->advertiser_id = $request->advertiser_id;
                $msg_prd->advertisement_id = $request->advertisement_id ?? null;
                $msg_prd->advertisement_title = $request->advertisement_title;
                $msg_prd->advertisement_price = $request->advertisement_price;
                $msg_prd->save();
            }
            $data->save();
            event(new MessageEvent($from, $to));
            $notify[] = ['success', 'Thanks for your enquiry. We will get back to you soon'];
            return redirect()->back()->withNotify($notify);
        } else {
            return redirect()->route('frontend.login');
        }
    }
    public function sendPrebuildMessage(Request $request)
    {
        if (isset(Auth::guard('advertiser')->user()->id)) {
            $from = Auth::guard('advertiser')->user()->id;
            $to = $request->recever_id;
            $is_message_before = MessageUser::where('from',  $from)->where('to', $to)
                ->orWhere('from',  $to)->where('to', $from)->first();
            if ($is_message_before == null) {
                MessageUser::create([
                    'from' =>  $from,
                    'to' =>  $to,
                    'is_block' => 0,
                    'date' => Carbon::now(),
                ]);
            } else {
                $is_message_before->update([
                    'date' => Carbon::now(),
                ]);
                MessageUser::where('from', $from)->where('to', $request->recever_id)->update(['is_deleted_from' => 0, 'is_deleted_to' => 0]);
                MessageUser::where('to', $from)->where('from', $request->recever_id)->update(['is_deleted_to' => 0, 'is_deleted_from' => 0]);
            }

            $data = new Message();
            $data->from = $from;
            $data->to = $request->recever_id;

            $data->message = $request->message;
            $data->is_read = 0;

            if ($request->advertisement_id) {
                $msg_prd = new UserContact();
                $msg_prd->message_sender_id = Auth::guard('advertiser')->user()->id;
                $msg_prd->advertiser_id = $request->advertiser_id;
                $msg_prd->advertisement_id = $request->advertisement_id ?? null;
                $msg_prd->advertisement_title = $request->advertisement_title;
                $msg_prd->advertisement_price = $request->advertisement_price;
                $msg_prd->save();
            }
            $data->save();
            event(new MessageEvent($from, $to));
            $notify[] = ['success', 'Thanks for your enquiry. We will get back to you soon'];
            return redirect()->back()->withNotify($notify);
        } else {
            $notify[] = ['warning', 'Please login'];
            return redirect()->back()->withNotify($notify);
        }
    }
    public function sendMessage(Request $request)
    {
        $from = Auth::guard('advertiser')->user()->id;
        $to = $request->recever_id;

        $is_message_before = MessageUser::where('from',  $from)->where('to', $to)
            ->orWhere('from',  $to)->where('to', $from)->first();
        if ($is_message_before == null) {
            MessageUser::create([
                'from' =>  $from,
                'to' =>  $to,
                'is_block' => 0,
                'date' => Carbon::now(),
            ]);
        } else {
            $is_message_before->update([
                'date' => Carbon::now(),
            ]);

            MessageUser::where('from', $from)->where('to', $request->recever_id)->update(['is_deleted_from' => 0, 'is_deleted_to' => 0]);

            MessageUser::where('to', $from)->where('from', $request->recever_id)->update(['is_deleted_to' => 0, 'is_deleted_from' => 0]);
        }

        $data = new Message();
        $data->from = $from;
        $data->to = $request->recever_id;
        $data->message = $request->message;
        $data->is_read = 0;
        $data->save();
        event(new MessageEvent($from, $to));
        return ['success' => true];
    }

    public function getMessage(int $user_id)
    {
        // dd($user_id);
        $my_id = Auth::guard('advertiser')->user()->id;
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        $messages = Message::where('from', $user_id)->where('to', $my_id)->where('deleted_to', 0)
            ->orWhere('from', $my_id)->where('to', $user_id)->where('deleted_from', 0)->get();
        // dd($messages);
        $user = Advertiser::findOrFail($user_id);
        $myId = Advertiser::findOrFail($my_id);

        return view('frontend.pages.cms.messages_index', ['messages' => $messages, 'user' => $user, 'myId' => $myId]);
    }

    //delete conversation with message user
    public function deleteConversationAjax(Request $request)
    {
        $from = Auth::guard('advertiser')->user()->id;

        MessageUser::where('from', $from)->where('to', $request->recever_id)->update(['is_deleted_from' => 1]);

        MessageUser::where('to', $from)->where('from', $request->recever_id)->update(['is_deleted_to' => 1]);

        Message::where('from', $from)->where('to', $request->recever_id)->update(['deleted_from' => 1]);

        Message::where('to',  $from)->where('from', $request->recever_id)->update(['deleted_to' => 1]);

        return response()->json([
            'status' => 1
        ]);
    }

    // delete only conversation with
    public function deleteOnlyConversationAjax(Request $request)
    {
        $from = Auth::guard('advertiser')->user()->id;

        Message::where('from', $from)->where('to', $request->recever_id)->update(['deleted_from' => 1]);

        Message::where('to',  $from)->where('from', $request->recever_id)->update(['deleted_to' => 1]);

        return response()->json([
            'status' => 1
        ]);
    }

    //block user
    public function blockUser(Request $request)
    {
        $from = Auth::guard('advertiser')->user()->id;

        MessageUser::where('from', $from)->where('to', $request->recever_id)->update(['is_block' => 1]);

        MessageUser::where('to',  $from)->where('from', $request->recever_id)->update(['is_block' => 1]);

        return response()->json([
            'status' => 1
        ]);
    }

    //mark as important

    public function markAsImportant(Request $request)
    {
        $from = Auth::guard('advertiser')->user()->id;

        MessageUser::where('from', $from)->where('to', $request->recever_id)->update(['is_important_from' => 1]);

        MessageUser::where('to', $from)->where('from', $request->recever_id)->update(['is_important_to' => 1]);


        return response()->json([
            'status' => 1
        ]);
    }


    public function rating(Request $request)
    {
        if (!empty(Auth::guard('advertiser')->user()->id)) {
            $data = $request->all();
            $review = new Rating();
            $review->advertiser_id = Auth::guard('advertiser')->user()->id;
            $review->rating     = $data['input-9'];
            $review->save();
            $notify[] = ['success', 'Thanks for your rating'];
            return redirect()->back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Please login'];
            return redirect()->back()->withNotify($notify);
        }
    }
    public function deleteConversation($user_id)
    {
        dd($user_id);
    }
}
