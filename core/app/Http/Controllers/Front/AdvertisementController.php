<?php

namespace App\Http\Controllers\Front;

use App\Models\AdImage;
use App\Models\Category;
use App\Models\Favourite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Helpers\Generals;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    public function dashboard()
    {

        $advertiser = Auth::guard('advertiser')->user()->id;
        $data['my_ads'] = Advertisement::withCount('sub_category', 'ad_message', 'favourite_to_users')->where('advertiser_id', $advertiser)->get();
        $data['favourite_ads'] = Favourite::with('ads')->where('advertiser_id', $advertiser)->take(10)->get();
        // dd($data['favourite_ads']);
        return view('frontend.pages.user.dashboard', $data);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function postAd()
    {
        $data['categories'] = Category::withCount('subCategories')->orderBy('id', 'DESC')->where('parent_id', 0)->active()->get();
        return view('frontend.pages.ad.category', $data);
    }
    public function postAdForm(Request $request, $category_id = null, $sub_category_id = null)
    {
        $category = DB::table('categories')->where('id', $category_id)->first();
        $sub_category = DB::table('categories')->where('id', $sub_category_id)->first();
        $brands = DB::table('brands')->where('category_id', $category->id)->get();
        $title = "New ad";
        $buttonText = "Save";

        return view('frontend.pages.forms.default', compact('category', 'brands', 'sub_category', 'buttonText', 'title'));
    }

    public function adStore(Request $request)
    {
        $adv = new Advertisement();
        try {
            if ($request->isMethod('POST')) {
                $data = $request->all();
                $rules = [
                    'brand_id' => 'required',
                    'description' => 'required',
                    'condition' => 'required',
                    'price' => 'required',
                    'meta_tags' => 'required',
                    'meta_title' => 'required',
                    'image' => 'required'
                ];
                $validationMessages = [
                    'brand_id.required' => 'brand_id is required',
                    'description.required' => 'Description is required',
                    'condition.required' => 'Condition is required',
                    'image.required' => 'Thumbnail is required',
                    'meta_tags.required' => 'Meta tags is required',
                    'meta_title.required' => 'Meta title is required',
                    'price.required' => 'Price is required'
                ];
                $this->validate($request, $rules, $validationMessages);
                $adv->advertiser_id = Auth::guard('advertiser')->user()->id;
                $adv->category_id = $data['category_id'];
                $adv->brand_id = $data['brand_id'];
                $adv->sub_category_id = $data['sub_category_id'];
                $adv->latitude = $data['latitude'] ?? null;
                $adv->longitude = $data['longitude'] ?? null;
                $adv->type_id = 0;
                if (Auth::guard('advertiser')->user()->city_id == null) {
                    $notify[] = ['warning', 'Please update your profile and select city!!'];
                    return redirect()->back()->withNotify($notify);
                }
                $adv->city_id = Auth::guard('advertiser')->user()->city_id;
                if ($request->title) {
                    $adv->title = $data['title'];
                }
                $adv->price = $data['price'];
                if ($request->model) {
                    $adv->model = $data['model'];
                }
                //dd('ok');
                if ($request->title == null) {
                    $adv->title = $data['brand_id'] . ' ' . $data['model'] . ' ' . $data['year_of_manufacture'];
                }

                $adv->status = 1;
                $adv->description = $data['description'];

                if ($data['category_type'] == "mobiles") {
                    $adv->details_informations = json_encode([
                        'NETWORK' => $data['NETWORK'] ? $data['NETWORK'] : null,
                        'Display' => $data['Display'] ? $data['Display'] : null,
                        'Memory' => $data['Memory'] ? $data['Memory'] : null,
                        'Battery' => $data['Battery'] ? $data['Battery'] : null
                    ]);
                }
                // if ($data['category_type'] == "electronics") {
                //     $adv->details_informations = json_encode([
                //         'model' => $data['model'] ? $data['model'] : null,
                //     ]);
                // }

                if ($data['category_type'] == "vehicles") {
                    $adv->details_informations = json_encode([
                        'transmission' => $data['transmission'] ? $data['transmission'] : null,
                        'body_type' => $data['body_type'] ? $data['body_type'] : null,
                        'edition' => $data['edition'] ? $data['edition'] : null,
                        'year_of_manufacture' => $data['year_of_manufacture'] ? $data['year_of_manufacture'] : null,
                        'run_km' => $data['run_km'] ? $data['run_km'] : null,
                        'engine_cc' => $data['engine_cc'] ? $data['engine_cc'] : null,
                        'year_decade' => $data['year_decade'] ? $data['year_decade'] : null,
                        'gear' => $data['gear'] ? $data['gear'] : null,
                        'traction' => $data['traction'] ? $data['traction'] : null,
                    ]);
                    $adv->fuel_type = json_encode($data['fuel_type'] ? $data['fuel_type'] : null);
                }
                $adv->condition = $data['condition'];
                if ($request->authenticity) {
                    $adv->authenticity = $data['authenticity'] ? $data['authenticity'] : null;
                }
                if ($request->edition) {
                    $adv->edition = $data['edition'] ? $data['edition'] : null;
                }

                $adv->location_embeded_map = $data['location_embeded_map'] ? $data['location_embeded_map'] : null;
                $adv->brand_id = $data['brand_id'] ? $data['brand_id'] : null;
                if ($request->color) {
                    $adv->color = $data['color'] ? $data['color'] : null;
                }

                //$adv->image = Generals::upload('image/', 'png', $request->file('image'));
                // Thumbnail Image
                if ($request->file('image')) {
                    $image = $request->file('image');
                    $imageName  = time() . '.' . $image->getClientOriginalExtension();
                    if (!Storage::disk('public')->exists('advertisement_images')) {
                        Storage::disk('public')->makeDirectory('advertisement_images');
                    }
                    $postImage = Image::make($image)->resize(100, 100)->save(storage_path('advertisement_images'))->stream("webp", 100);
                    Storage::disk('public')->put('advertisement_images/' . $imageName, $postImage);
                }

                $adv->meta_tags = $data['meta_tags'] ? $data['meta_tags'] : null;
                $adv->meta_title = $data['meta_title'] ? $data['meta_title'] : null;
                $adv->image = $imageName;
                $adv->save();

                $lastInsertedAdId = DB::getPdo()->lastInsertId();
                if ($request->has('images')) {
                    foreach ($request->file('images') as $image) {
                        $imageName = time() . rand(100, 100000) . '.' . $image->getClientOriginalExtension();
                        if (!Storage::disk('public')->exists('advertisement_images')) {
                            Storage::disk('public')->makeDirectory('advertisement_images');
                        }
                        $advImage = Image::make($image)->resize(1920, 1440)->save(storage_path('advertisement_images'))->stream("webp", 100);
                        Storage::disk('public')->put('advertisement_images/' . $imageName, $advImage);
                        AdImage::create([
                            'advertisement_id' => $lastInsertedAdId,
                            'images' => $imageName
                        ]);
                    }
                }
                $request->session()->put('advertisement_id', $lastInsertedAdId);
                $notify[] = ['success', 'Ad Posted Successfully!!'];
                return redirect()->route('frontend.user.sellFaster')->withNotify($notify);
            }
        } catch (\Exception $th) {
            dd($th);
            info($th);
        }
        return redirect()->back();
    }

    public function adUpdate(Request $request, $id)
    {
        $adv = Advertisement::find($id);
        try {
            if ($request->isMethod('POST')) {
                $data = $request->all();
                $rules = [
                    'title' => 'required',
                    'description' => 'required',
                    'condition' => 'required',
                    'price' => 'required',

                ];
                $validationMessages = [
                    'title.required' => 'The name field can not be blank',
                    'description.required' => 'Description is required',
                    'condition.required' => 'Condition is required',
                    'price.required' => 'Price is required'
                ];
                $this->validate($request, $rules, $validationMessages);
                $adv->advertiser_id = Auth::guard('advertiser')->user()->id;
                $adv->category_id = $data['category_id'];
                $adv->sub_category_id = $data['sub_category_id'];
                $adv->type_id = 0;
                $adv->city_id = Auth::guard('advertiser')->user()->city_id;
                $adv->title = $data['title'];
                $adv->price = $data['price'];
                $adv->latitude = $data['latitude'] ?? null;
                $adv->longitude = $data['longitude'] ?? null;
                $adv->status = 1;
                $adv->description = $data['description'];

                $adv->details_informations = json_encode([
                    'NETWORK' => $data['NETWORK'],
                    'Display' => $data['Display'],
                    'Memory' => $data['Memory'],
                    'Battery' => $data['Battery']
                ]);

                $adv->condition = $data['condition'];
                $adv->authenticity = $data['authenticity'];
                $adv->edition = $data['edition'] ? $data['edition'] : null;
                $adv->location_embeded_map = $data['location_embeded_map'] ? $data['location_embeded_map'] : null;
                $adv->brand_id = $data['brand_id'] ? $data['brand_id'] : null;
                $adv->color = $data['color'] ? $data['color'] : null;
                $adv->image = Generals::update('image/', $adv->image, 'png', $request->file('image'));
                $adv->save();

                $lastInsertedAdId = DB::getPdo()->lastInsertId();
                if ($request->has('images')) {
                    foreach ($request->file('images') as $image) {
                        $imageName = time() . rand(100, 100000) . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('advertisement_images'), $imageName);
                        AdImage::create([
                            'advertisement_id' => $lastInsertedAdId,
                            'images' => $imageName
                        ]);
                    }
                } else {
                    $imageName = $adv->images;
                }
                $notify[] = ['success', 'Ad Updated successfully!!'];
                return redirect()->back()->withNotify($notify);
            }
        } catch (\Exception $th) {
            info($th);
        }
        return redirect()->back();
    }
    public function manageGeneralAd(Request $request, $id = null, $category_id = null)
    {
        // dd(Category::find($id));

        if ($id != null) {
            if (Category::find($id) != null) {
                // dd(Category::find($id));
                // Add Bank
                $adv = new Advertisement();
                $title = "New Ad";
                $buttonText = "Save";
                $notify[] = ['success', 'Ad saved successfully!!'];
                $category = DB::table('categories')->where('parent_id', '=', 0)->where('id', $id)->first();

                $brand_ids = DB::table('brand_ids')->where('category_id', $category->id)->get();
            } else {
                $category = DB::table('categories')->where('parent_id', '=', 0)->first();
                $brand_ids = DB::table('brand_ids')->where('category_id', $category->id)->get();
            }
        }
        if($id != null) {
            if (Category::find($id) == null) {
                // dd('datd');
                // Update Coupon Code
                $adv = Advertisement::findOrFail($id);
                $title = "Update Ad";
                $buttonText = "Update";
                $notify[] = ['success', 'Ad updated successfully!!'];
                $category = DB::table('categories')->where('parent_id', '=', 0)->where('id', $adv->category_id)->first();
                $brand_ids = DB::table('brand_ids')->where('category_id', $category->id)->get();
            }
        }
        //exit();
        if ($request->isMethod('POST')) {
            // dd($request->all());
            $data = $request->all();
            //Validation rules
            $rules = [
                'title' => 'required',
                'brand_id' => 'required|numeric',
                'price' => 'required|numeric|gt:0',
                'description' => 'required',
                'image' => 'required',
                'condition' => 'required',
                'meta_tags' => 'required',
                'meta_title' => 'required',
            ];

            //Validation message
            $customMessage = [
                'title.required' => 'Title is required',
                'brand_id.required' => 'brand_id is required',
                'price.numeric' => 'Invalid brand_id',
                'price.required' => 'Price is required',
                'price.gt' => 'Price must be greater then 0',
                'description.required' => 'Description is required',
                'image.required' => 'Image is required',
                'condition.required' => 'Condition is required',
                'meta_tags.required' => 'Meta Tag is required',
                'meta_title.required' => 'Meta Title is required',
            ];
            $this->validate($request, $rules, $customMessage);
            if ($request->file('image')) {
                $image = $request->file('image');
                $imageName  = time() . '.' . $image->getClientOriginalExtension();
                if (!Storage::disk('public')->exists('advertisement_images')) {
                    Storage::disk('public')->makeDirectory('advertisement_images');
                }
                $postImage = Image::make($image)->resize(100, 100)->save(storage_path('advertisement_images'))->stream("webp", 100);
                Storage::disk('public')->put('advertisement_images/' . $imageName, $postImage);
            }
            $adv->image = $imageName;
            $adv->advertiser_id = Auth::guard('advertiser')->user()->id;
            $adv->category_id = $data['category_id'];
            $adv->city_id = Auth::guard('advertiser')->user()->city_id;
            $adv->title = $data['title'];
            $adv->price = $data['price'];
            $adv->condition = $data['condition'];
            $adv->latitude = $data['latitude'] ?? null;
            $adv->longitude = $data['longitude'] ?? null;
            $adv->status = 1;
            $adv->type_id = 0;
            $adv->description = $data['description'];
            if ($data['category_type'] == "vehicles") {
                $adv->details_informations = json_encode([
                    'transmission' => $data['transmission'] ? $data['transmission'] : null,
                    'body_type' => $data['body_type'] ? $data['body_type'] : null,
                    'edition' => $data['edition'] ? $data['edition'] : null,
                    'year_of_manufacture' => $data['year_of_manufacture'] ? $data['year_of_manufacture'] : null,
                    'run_km' => $data['run_km'] ? $data['run_km'] : null,
                    'engine_cc' => $data['engine_cc'] ? $data['engine_cc'] : null,
                    'year_decade' => $data['year_decade'] ? $data['year_decade'] : null,
                    'gear' => $data['gear'] ? $data['gear'] : null,
                    'traction' => $data['traction'] ? $data['traction'] : null,
                ]);
                $adv->fuel_type = json_encode($data['fuel_type'] ? $data['fuel_type'] : null);
            }
            if ($request->authenticity) {
                $adv->authenticity = $data['authenticity'] ? $data['authenticity'] : null;
            }
            if ($request->edition) {
                $adv->edition = $data['edition'] ? $data['edition'] : null;
            }

            $adv->location_embeded_map = $data['location_embeded_map'] ? $data['location_embeded_map'] : null;
            $adv->brand_id = $data['brand_id'] ? $data['brand_id'] : null;
            if ($request->color) {
                $adv->color = $data['color'] ? $data['color'] : null;
            }
            $adv->meta_tags = $data['meta_tags'] ? $data['meta_tags'] : null;
            $adv->meta_title = $data['meta_title'] ? $data['meta_title'] : null;
            $adv->save();
            $lastInsertedAdId = DB::getPdo()->lastInsertId();
            if ($request->has('images')) {
                foreach ($request->file('images') as $image) {
                    $imageName = time() . rand(100, 100000) . '.' . $image->getClientOriginalExtension();
                    if (!Storage::disk('public')->exists('advertisement_images')) {
                        Storage::disk('public')->makeDirectory('advertisement_images');
                    }
                    $advImage = Image::make($image)->resize(1920, 1440)->save(storage_path('advertisement_images'))->stream("webp", 100);
                    Storage::disk('public')->put('advertisement_images/' . $imageName, $advImage);
                    AdImage::create([
                        'advertisement_id' => $lastInsertedAdId,
                        'images' => $imageName
                    ]);
                }
            }
            $request->session()->put('advertisement_id', $lastInsertedAdId);
            return redirect()->route('frontend.user.sellFaster')->withNotify($notify);
        }
        // if (Category::findOrFail($id)) {

        // dd($category);
        return view('frontend.pages.user.manage_general_ad', compact('category', 'brand_ids', 'buttonText', 'adv'));
        // }
    }

    public function removeImage($id)
    {
        $ad_image =  Advertisement::select('image')->where('id', $id)->first();
        $small_image_path  = 'core/public/storage/image/';
        if (file_exists($small_image_path . $ad_image->image)) {
            unlink($small_image_path . $ad_image->image);
        }
        $notify[] = ['success', 'Image deleted successfully!!'];
        return redirect()->back()->withNotify($notify);
    }

    public function addToFavourite(Request $request)
    {
        $id = $request['id'];
        if (!Auth::guard('advertiser')->check()) {
            return response()->json(['status' => false, 'message' => 'Please login']);
        } elseif (Favourite::where('advertiser_id', Auth::guard('advertiser')->user()->id)->where('advertisement_id', $id)->exists()) {
            Favourite::where('advertiser_id', Auth::guard('advertiser')->user()->id)->where('advertisement_id', $id)->delete();
            return response()->json(['status' => false, 'message' => 'Favourite Removed']);
        } else {
            $like = new Favourite();
            $like->advertiser_id = Auth::guard('advertiser')->user()->id;
            $like->advertisement_id = $request['id'];
            $like->qty = 1;
            $like->save();
            return response()->json(['status' => true, 'message' => 'Added to Favourite!!']);
        }
    }
    public function getEdit($id)
    {
        $item =  Advertisement::findOrFail($id);
        $sub_category = Category::where('parent_id', $item->category_id)->first();
        return view('frontend.pages.user.ad_form.form_update', compact('item', 'sub_category'));
    }

    public function getDelete($id)
    {
        Advertisement::find($id)->delete();
        $notify[] = ['success', 'Ad deleted successfully!!'];
        return redirect()->back()->withNotify($notify);
    }
}
