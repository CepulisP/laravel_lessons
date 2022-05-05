@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-10">{{ ucfirst($ad->title) }}</div>
                        @auth
                            @if(!$owner)
                                @if($saved)
                                    <a href="{{ route('ad.save', $ad->id) }}" class="btn btn-primary col-2">
                                        Forget
                                @else
                                    <a href="{{ route('ad.save', $ad->id) }}" class="btn btn-outline-danger col-2">
                                        Save
                                @endif
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                        </svg>
                                    </a>
                            @endif
                        @endauth
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            <img class="img-fluid w-100" src="{{ $ad->image }}">
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
            {{ $comments->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
