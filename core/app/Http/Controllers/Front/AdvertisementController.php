<?php
namespace App\Http\Controllers\Front;

use App\Models\City;
use App\Models\Brand;
use App\Models\AdImage;
use App\Models\Category;
use App\Models\Favourite;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdvertisementController extends Controller
{
    public function dashboard()
    {
        $advertiser = Auth::guard('advertiser')->user()->id;
        $data['my_ads'] = Advertisement::withCount('sub_category', 'ad_message', 'favourite_to_users')
            ->with('category:id,title,category_type_id')->where('advertiser_id', $advertiser)->get();
        $data['favourite_ads'] = Favourite::with('ads')->where('advertiser_id', $advertiser)->take(10)->get();
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
        $title = "New ad";
        $buttonText = "Save";
        $category = Category::with('type')->where('id', $category_id)->first();
        $sub_category = DB::table('categories')->where('id', $sub_category_id)->first();
        $brands = DB::table('brands')->where('category_id', $category->id)->get();
        return view('frontend.pages.forms.ad_post_form', compact('category', 'brands', 'sub_category', 'buttonText', 'title'));
    }

    public function adStore(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $category_type = Category::with('type')->where('id', $data['category_id'])->first()->type->fields;
        $default = [];
        $editable = [];
        foreach ($category_type as $c_type) {
            foreach ($data as $key => $request_value) {
                if ($c_type->name == $key) {
                    if ($c_type->editable == 0) {
                        $default_row = $c_type;
                        $default_row->value = $request_value;
                        $default[] = $default_row;
                    } else {
                        $editable_row = $c_type;
                        $editable_row->value = $request_value;
                        $editable[] = $editable_row;
                    }
                    break;
                }
            }
        }
        // dd($default, $editable);
        $adv = new Advertisement();
        try {
            if ($request->isMethod('POST')) {
                $rules = [
                    'brand' => 'required',
                    'description' => 'required',
                    'condition' => 'required',
                    'price' => 'required',
                    'meta_tags' => 'required',
                    'meta_title' => 'required',
                    'image' => 'required'
                ];
                $validationMessages = [
                    'brand.required' => 'Brand is required',
                    'description.required' => 'Description is required',
                    'condition.required' => 'Condition is required',
                    'image.required' => 'Thumbnail is required',
                    'meta_tags.required' => 'Meta tags is required',
                    'meta_title.required' => 'Meta title is required',
                    'price.required' => 'Price is required'
                ];
                $this->validate($request, $rules, $validationMessages);
                $adv->title = $data['ad_title'];
                $adv->slug = $data['title'] ?? rand(100, 999);
                $adv->advertiser_id = Auth::guard('advertiser')->user()->id;
                $adv->category_id = $data['category_id'];
                $adv->brand_id = $data['brand'];
                $adv->sub_category_id = $data['sub_category_id'];
                $adv->latitude = $data['latitude'] ?? null;
                $adv->longitude = $data['longitude'] ?? null;
                $adv->price = $data['price'];
                $adv->type_id = 0;
                if (Auth::guard('advertiser')->user()->city_id == null) {
                    $notify[] = ['warning', 'Please update your profile and select city!!'];
                    return redirect()->back()->withNotify($notify);
                }
                $adv->status = 1;
                $adv->city_id = Auth::guard('advertiser')->user()->city_id;
                $adv->description = $data['description'];
                $adv->authenticity = $data['authenticity'] ?? null;
                $adv->condition = $data['condition'];
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
                $adv->details_informations = json_encode($editable);
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
                $notify[] = ['success', 'Ad Posted Successfully!!'];
                $request->session()->put('advertisement_id', $lastInsertedAdId);
                return redirect()->route('frontend.user.sellFaster')->withNotify($notify);
            }
        } catch (\Exception $th) {
            //dd($th);
            info($th);
        }
        return redirect()->back();
    }
    public function getEdit($ad_id, $category_id)
    {
        // dd($ad_id, $category_id);
        $adv =  Advertisement::findOrFail($ad_id);
        $sub_category = Category::with('type')->where('parent_id', $adv->category_id)->first();
        $brands = Brand::active()->where('category_id', $sub_category->parent_id)->get();
        $allCity = City::where('status', 1)->select('id', 'title', 'status')->get();
        $allCity = json_decode(json_encode($allCity), true);
        return view('frontend.pages.user.main_form_update', compact('adv', 'sub_category', 'brands', 'allCity'));
    }

    public function adUpdate(Request $request, $ad_id,$category_id)
    {
        $data = $request->all();
        // dd($data);
        $adv = Advertisement::find($ad_id);
        $category_type = Category::with('type')->where('id', $category_id)->first()->type->fields;
        $default = [];
        $editable = [];
        foreach ($category_type as $c_type) {
            foreach ($data as $key => $request_value) {
                if ($c_type->name == $key) {
                    if ($c_type->editable == 0) {
                        $default_row = $c_type;
                        $default_row->value = $request_value;
                        $default[] = $default_row;
                    } else {
                        $editable_row = $c_type;
                        $editable_row->value = $request_value;
                        $editable[] = $editable_row;
                    }
                    break;
                }
            }
        }
        // dd($default, $editable);
        try {
            if ($request->isMethod('POST')) {
                $rules = [
                    'ad_title' => 'required',
                    'description' => 'required',
                    'condition' => 'required',
                    'price' => 'required',

                ];
                $validationMessages = [
                    'ad_title.required' => 'The name field can not be blank',
                    'description.required' => 'Description is required',
                    'condition.required' => 'Condition is required',
                    'price.required' => 'Price is required'
                ];
                // $this->validate($request, $rules, $validationMessages);
                $validator = Validator::make($data, $rules, $validationMessages);
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator);
                }
                $adv->advertiser_id = Auth::guard('advertiser')->user()->id;
                $adv->category_id = $data['category_id'];
                $adv->sub_category_id = $data['sub_category_id'];
                $adv->type_id = 0;
                $adv->city_id = Auth::guard('advertiser')->user()->city_id;
                $adv->title = $data['ad_title'];
                $adv->price = $data['price'];
                $adv->latitude = $data['latitude'] ?? null;
                $adv->longitude = $data['longitude'] ?? null;
                $adv->status = 1;
                $adv->description = $data['description'];

                if ($request->file('image')) {
                    $image = $request->file('image');
                    $imageName  = time() . '.' . $image->getClientOriginalExtension();
                    if (!Storage::disk('public')->exists('advertisement_images')) {
                        Storage::disk('public')->makeDirectory('advertisement_images');
                    }
                    $postImage = Image::make($image)->resize(100, 100)->save(storage_path('advertisement_images'))->stream("webp", 100);
                    Storage::disk('public')->put('advertisement_images/' . $imageName, $postImage);
                } else {
                    $imageName = $adv->image;
                }
                $adv->condition = $data['condition'];
                $adv->authenticity = $data['authenticity'];
                $adv->brand_id = $data['brand'] ? $data['brand'] : null;
                $adv->image = $imageName;
                $adv->details_informations = json_encode($editable);
                // dd('okk');
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
    public function nonSubCategoryAdPost(Request $request, $c_id, $id = null)
    {
        $data = $request->all();
        // dd($data);
        $category_type = Category::with('type')->where('id', $c_id)->first()->type->fields;
        $default = [];
        $editable = [];
        foreach ($category_type as $c_type) {
            foreach ($data as $key => $request_value) {
                if ($c_type->name == $key) {
                    if ($c_type->editable == 0) {
                        $default_row = $c_type;
                        $default_row->value = $request_value;
                        $default[] = $default_row;
                    } else {
                        $editable_row = $c_type;
                        $editable_row->value = $request_value;
                        $editable[] = $editable_row;
                    }
                    break;
                }
            }
        }
        // dd($default, $editable);
        $image_validataion_rule = "required";
        if ($id == "") {
            $adv = new Advertisement();
            $title = "New Ad";
            $buttonText = "Save";
            $notify[] = ['success', 'Ad saved successfully!!'];
        }
        //exit();
        if ($request->isMethod('POST')) {
            $data = $request->all();
            //Validation rules
            $rules = [
                'ad_title' => 'required',
                'brand' => 'required',
                'price' => 'required|numeric|gt:0',
                'description' => 'required',
                'image' => $image_validataion_rule,
                'condition' => 'required',
                'meta_tags' => 'required',
                'meta_title' => 'required',
            ];
            //Validation message
            $customMessage = [
                'ad_title.required' => 'Title is required',
                'brand.required' => 'Brand is required',
                'price.required' => 'Price is required',
                'price.gt' => 'Price must be greater then 0',
                'description.required' => 'Description is required',
                'image.required' => 'Image is required',
                'condition.required' => 'Condition is required',
                'meta_tags.required' => 'Meta Tag is required',
                'meta_title.required' => 'Meta Title is required'
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
            } else {
                $imageName = $adv->image;
            }
            $adv->image = $imageName;
            $adv->advertiser_id = Auth::guard('advertiser')->user()->id;
            $adv->category_id = $data['category_id'];
            $adv->city_id = Auth::guard('advertiser')->user()->city_id;
            $adv->brand_id = $data['brand'] ? $data['brand'] : null;
            $adv->title = $data['ad_title'];
            $adv->price = $data['price'];
            $adv->condition = $data['condition'];
            $adv->latitude = $data['latitude'] ?? null;
            $adv->longitude = $data['longitude'] ?? null;
            $adv->authenticity = $data['authenticity'] ?? null;
            $adv->status = 1;
            $adv->type_id = 0;
            $adv->description = $data['description'];
            $adv->meta_tags = $data['meta_tags'] ? $data['meta_tags'] : null;
            $adv->meta_title = $data['meta_title'] ? $data['meta_title'] : null;
            $adv->details_informations = json_encode($editable);
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
        $category = Category::with('type:id,fields')->where('parent_id', '=', 0)->where('id', $c_id)->first();
        $brands = DB::table('brands')->where('category_id', $category->id)->get();
        return view('frontend.pages.user.manage_general_ad', compact('category', 'brands', 'buttonText', 'adv'));
    }
    public function nonSubCategoryAdUpdate(Request $request, $c_id, $ad_id){
        $data = $request->all();
        // dd($data);
        $adv = Advertisement::findOrFail($ad_id);
        $category_type = Category::with('type')->where('id', $c_id)->first()->type->fields;
        $default = [];
        $editable = [];
        foreach ($category_type as $c_type) {
            foreach ($data as $key => $request_value) {
                if ($c_type->name == $key) {
                    if ($c_type->editable == 0) {
                        $default_row = $c_type;
                        $default_row->value = $request_value;
                        $default[] = $default_row;
                    } else {
                        $editable_row = $c_type;
                        $editable_row->value = $request_value;
                        $editable[] = $editable_row;
                    }
                    break;
                }
            }
        }
        // dd($default, $editable);
        if ($request->isMethod('POST')) {
            $data = $request->all();
            //Validation rules
            $rules = [
                'ad_title' => 'required',
                'brand' => 'required',
                'price' => 'required|numeric|gt:0',
                'description' => 'required',
                'condition' => 'required',
                'meta_tags' => 'required',
                'meta_title' => 'required',
            ];
            //Validation message
            $customMessage = [
                'ad_title.required' => 'Title is required',
                'brand.required' => 'Brand is required',
                'price.required' => 'Price is required',
                'price.gt' => 'Price must be greater then 0',
                'description.required' => 'Description is required',
                'condition.required' => 'Condition is required',
                'meta_tags.required' => 'Meta Tag is required',
                'meta_title.required' => 'Meta Title is required'
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
            } else {
                $imageName = $adv->image;
            }
            $adv->image = $imageName;
            $adv->advertiser_id = Auth::guard('advertiser')->user()->id;
            $adv->category_id = $data['category_id'];
            $adv->city_id = Auth::guard('advertiser')->user()->city_id;
            $adv->brand_id = $data['brand'] ? $data['brand'] : null;
            $adv->title = $data['ad_title'];
            $adv->price = $data['price'];
            $adv->condition = $data['condition'];
            $adv->latitude = $data['latitude'] ?? null;
            $adv->longitude = $data['longitude'] ?? null;
            $adv->status = 1;
            $adv->type_id = 0;
            $adv->description = $data['description'];
            $adv->meta_tags = $data['meta_tags'] ? $data['meta_tags'] : null;
            $adv->meta_title = $data['meta_title'] ? $data['meta_title'] : null;
            $adv->details_informations = json_encode($editable);
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
            $notify[] = ['success', 'Updated successfully!!'];
            return back()->withNotify($notify);
        }
        $category = Category::with('type:id,fields')->where('parent_id', '=', 0)->where('id', $c_id)->first();
        $brands = DB::table('brands')->where('category_id', $category->id)->get();
        return view('frontend.pages.user.update_general_ad', compact('category', 'brands', 'adv'));
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

    public function removeMultiImage($image_id, $ad_id)
    {
        $multiImage =  AdImage::select('images', 'id')->where('id', $image_id)->where('advertisement_id', $ad_id)->first();
        if (Storage::disk('public')->exists('advertisement_images/' . $multiImage->images)) {
            Storage::disk('public')->delete('advertisement_images/' . $multiImage->images);
        }
        $multiImage->delete();
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


    public function getDelete($id)
    {
        Advertisement::find($id)->delete();
        $notify[] = ['success', 'Ad deleted successfully!!'];
        return redirect()->back()->withNotify($notify);
    }
}
