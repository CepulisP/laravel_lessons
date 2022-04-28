@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="GET" action="{{ route('ad.index') }}">
            <select name="manufacturer">
                <option selected value="">- Manufacturer -</option>
                <option value="1">BMW</option>
                <option value="2">Audi</option>
                <option value="3">VW</option>
                <option value="4">Mercedes-Benz</option>
                <option value="5">Toyota</option>
            </select>
            <input type="submit" value="Filter">
        </form>
        <div class="row justify-content-center">
            @foreach($ads as $ad)
                <div class="col-md-4">
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
