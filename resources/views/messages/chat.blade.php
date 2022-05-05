@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @foreach($chat as $msg)
            <div class="col-7">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-6">{{ ucfirst($msg->sender->name) }}</div>
                        <div class="col-6 text-end">{{ ucfirst($msg->created_at) }}</div>
                    </div>
                    <div class="card-body">{{ $msg->content }}</div>
                </div>
            </div>
        @endforeach
        <div class="col-7">
            <form class="form" method="post" action="{{ route('inbox.store') }}">
                @csrf
                <div class="form-group">
                    <textarea name="content" msg cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
                    <input type="hidden" name="recipient_id" value="{{ $recipientId }}">
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
    </div>
</div>
@endsection
