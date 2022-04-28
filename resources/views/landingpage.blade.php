@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3>Popular ads</h3>
            @foreach($popAds as $ad)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">{{ $ad->title }}</div>
                        <div class="card-body">
                            <img class="img-fluid" src="{{ $ad->image }}">
                        </div>
                        <div class="card-footer">
                            <span id="lolol">{{ $ad->price }}€</span>
                            <a class="btn btn-primary float-end" href="{{ route('ad.show', $ad->id) }}">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <h3>Newest ads</h3>
            @foreach($newAds as $ad)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">{{ $ad->title }}</div>
                        <div class="card-body">
                            <img class="img-fluid" src="{{ $ad->image }}">
                        </div>
                        <div class="card-footer">
                            <span id="lolol">{{ $ad->price }}€</span>
                            <a class="btn btn-primary float-end" href="{{ route('ad.show', $ad->id) }}">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
