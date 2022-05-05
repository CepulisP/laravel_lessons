<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\SavedAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myAds()
    {

        $data['ads'] = Ad::where('user_id', Auth::id())->get();

        return view('user-panel.ads', $data);

    }

    public function savedAds()
    {

        $adIds = SavedAd::where('user_id', Auth::id())->get('ad_id');
        $ads = [];

        foreach ($adIds as $adId) {

            $ads[] = Ad::findOrFail($adId['ad_id']);

        }

        $data['ads'] = $ads;

        return view('user-panel.saved-ads', $data);

    }

}
