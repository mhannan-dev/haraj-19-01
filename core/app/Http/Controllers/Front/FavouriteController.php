<?php
namespace App\Http\Controllers\Front;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function addToFavourite($id)
    {
        if (Auth::guard('advertiser')->check()) {
            $user = Auth::guard('advertiser')->user();
            // dd($user);
            $isFavourite = $user->favourite_ads()->where('advertisement_id', $id)->count();
            // dd($isFavourite);
            if ($isFavourite == 0) {
                $user->favourite_ads()->attach($id);
                return response()->json(['status' => true, 'message' => 'Added to Favourite!!', 'advertisement' => $id]);
            } else {
                $user->favourite_ads()->detach($id);
                return response()->json(['status' => false, 'message' => 'Favourite Removed']);
            }
        }else{
            return response()->json(['status' => 422, 'message' => 'Please, Login First']);
        }

    }
}

