<?php

namespace App\Http\Controllers;

use App\Models\Ad;
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

        $data['ads'] = Ad::where('user_id', Auth::id())->where('active', 1)->get();

        return view('user-panel.ads', $data);

    }
}
