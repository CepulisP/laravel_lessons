@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3>Unpopular ads</h3>
            @foreach($popAds as $ad)
                <div class="col-md-3">
                    <a class="text-decoration-none text-reset" href="{{ route('ad.show', $ad->id) }}">
                        <div class="card">
                            <b class="card-header font-weight-bold">{{ $ad->title }}</b>
                            <div class="card-body">
                                <img class="img-fluid" src="{{ $ad->image }}">
                            </div>
                            <div class="card-footer text-end">
                                <span>{{ $ad->price }}€</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <h3>Newest ads</h3>
            @foreach($newAds as $ad)
                <div class="col-md-3">
                    <a class="text-decoration-none text-reset" href="{{ route('ad.show', $ad->id) }}">
                        <div class="card">
                            <b class="card-header">{{ $ad->title }}</b>
                            <div class="card-body">
                                <img class="img-fluid" src="{{ $ad->image }}">
                            </div>
                            <div class="card-footer text-end">
                                <span>{{ $ad->price }}€</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
