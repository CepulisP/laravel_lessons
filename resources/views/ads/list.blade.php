@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="GET" action="{{ route('ad.index') }}">
            <select name="manufacturer">
                <option selected value="">- All Manufacturers -</option>
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
