@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="text-center">Conversations</h2>
        <div class="col-md-8">
            @foreach($chats as $chat)
                <a href="{{ route('chat', ['recipientId' => $chat['chat_friend']['id']]) }}" class="text-decoration-none text-reset">
                    <div class="card mt-1">
                        <div class="card-header tex">Chat with {{ $chat['chat_friend']['name'] }}</div>
                        <div class="card-body row">
                            <div class="col-md-9"><b>{{ $chat['latest_sender'] }}: </b>{{ $chat['latest_msg']['content'] }}</div>
                            <div class="col-md-3 text-end">{{ $chat['latest_msg']['date'] }}</div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
