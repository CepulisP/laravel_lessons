<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Http\Requests\StoreAdRequest;
use App\Http\Requests\UpdateAdRequest;
use App\Models\CarModel;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Manufacturer;
use App\Models\SavedAd;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data['ads'] =Ad::filter($request)->paginate(8);

        return view('ads.list', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {

        $data['colors'] = Color::all();
        $data['types'] = Type::all();
        $data['manufacturers'] = Manufacturer::all();
        $data['carModels'] = CarModel::all();

        return view('ads.form', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdRequest $request)
    {

        Ad::create([
            'title' => $request->post('title'),
            'slug' => Str::slug($request->post('title')),
            'content' => $request->post('content'),
            'years' => $request->post('years'),
            'price' => $request->post('price'),
            'image' => $request->post('image'),
            'vin' => $request->post('vin'),
            'user_id' => Auth::id(),
            'views' => 0,
            'active' => 1,
            'model_id' => $request->post('model_id'),
            'type_id' => $request->post('type_id'),
            'category_id' => 1,
            'color_id' => $request->post('color_id'),
            'manufacturer_id' => $request->post('manufacturer_id')
        ]);

        return redirect()->route('homepage');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {

        $ad->views = $ad->views + 1;
        $ad->save();

        $data['ad'] = $ad;
        $data['comments'] = Comment::where('ad_id', $ad->id)->paginate(10);
        $data['saved'] = SavedAd::where('ad_id', $ad->id)->exists();
        $data['owner'] = $ad->user_id == Auth::id();

        return view('ads.single', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {

        $data['ad'] = $ad;
        $data['colors'] = Color::all();
        $data['types'] = Type::all();
        $data['manufacturers'] = Manufacturer::all();

        $man = Manufacturer::findOrFail($ad->manufacturer_id);

        $data['carModels'] = $man->carModels;

        return view('ads.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdRequest  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdRequest $request, Ad $ad)
    {

        $ad->update([
            'title' => $request->post('title'),
            'content' => $request->post('content'),
            'years' => $request->post('years'),
            'price' => $request->post('price'),
            'image' => $request->post('image'),
            'vin' => $request->post('vin'),
            'user_id' => Auth::id(),
            'active' => 1,
            'model_id' => $request->post('model_id'),
            'type_id' => $request->post('type_id'),
            'category_id' => 1,
            'color_id' => $request->post('color_id'),
            'manufacturer_id' => $request->post('manufacturer_id')
        ]);

        return redirect()->route('homepage');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {

        $ad->update([
            'active' => 0
        ]);

        return redirect()->route('profile.ads');

    }

    public function getModels()
    {

        $manufacturerId = $_POST['manufac'] ?? 0;
        $models = [];

        if($manufacturerId > 0) {

            $man = Manufacturer::findOrFail($manufacturerId);

            foreach ($man->carModels as $model) {

                $models[] = ['id' => $model['id'], 'name' => $model['name']];

            }

        }

        return json_encode($models);

    }

    public function saveAd($adId)
    {

        $this->middleware('auth');

        $userId = Auth::id();

        if (
            !SavedAd::where('ad_id', $adId)->where('user_id', $userId)->exists() &&
            !Ad::where('id', $adId)->where('user_id', $userId)->exists()
        )
        {

            SavedAd::create([
                'user_id' => $userId,
                'ad_id' => $adId
            ]);

        }

        return redirect()->route('ad.show', $adId);

    }

    public function forgetAd($adId)
    {

        $this->middleware('auth');

        $userId = Auth::id();

        if (
            SavedAd::where('ad_id', $adId)->where('user_id', $userId)->exists() &&
            !Ad::where('id', $adId)->where('user_id', $userId)->exists()
        )
        {

            $savedAd = SavedAd::where('ad_id', $adId)->where('user_id', $userId)->delete();

        }

        return redirect()->route('ad.show', $adId);

    }
}
