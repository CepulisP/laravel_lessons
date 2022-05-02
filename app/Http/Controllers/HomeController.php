<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $this->middleware('auth');

        return view('home');

    }

    public function landingPage()
    {

        $data['popAds'] = Ad::orderby('views', 'ASC')->limit(4)->get();
        $data['newAds'] = Ad::orderby('updated_at', 'ASC')->limit(4)->get();

        return view('landingpage', $data);

    }
}

