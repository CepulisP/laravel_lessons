@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ ucfirst($ad->title) }}</div>

                    <div class="card-body">
                        <div class="col-6">
                            <img src="{{ $ad->image }}">
                        </div>
                        <div class="col-6">
                            <p>
                                {{ ucfirst($ad->content) }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="details">
                            <h2>Additional information</h2>
                            <ul>
                                <li>{{ $ad->type->name }}</li>
                                <li>{{ $ad->price }}€</li>
                                <li>{{ $ad->years }}</li>
                                <li>{{ $ad->vin }}</li>
                                <li>{{ $ad->color->name }}</li>
                                <li>{{ $ad->manufacturer->name }}</li>
                                <li>{{ $ad->carModel->name }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="details">
                            <h2>Contact seller:</h2>
                            <ul>
                                <li>{{ $ad->user->name }}</li>
                                <li>{{ $ad->user->email }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
