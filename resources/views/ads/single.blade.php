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
                        <div class="col-12">
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
            <div class="col-7">
                <form class="form" method="post" action="{{ route('comment.store') }}">
                    @csrf
                    <div class="form-group">
                        <h4 class="text-center">Leave a comment</h4>
                        <textarea name="content" msg cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
                        <input type="hidden" name="ad_id" value="{{ $ad->id }}">
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <input type="submit" id="post" class="btn btn-primary text" value="Post Comment">
                    </div>
                </form>
            </div>
            @foreach($comments as $comment)
                <div class="col-7">
                    <div class="card">
                        <div class="card-header row">
                            <div class="col-6">
                                {{ ucfirst($comment->user->name) }}
                            </div>
                            <div class="col-6 text-end">
                                {{ ucfirst($comment->created_at) }}
                            </div>
                        </div>
                        <div class="card-body">
                            <p>{{ $comment->content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
