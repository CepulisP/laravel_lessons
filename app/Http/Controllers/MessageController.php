<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MessageController extends Controller
{

    public function __contruct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $messages = Message::where('sender_id', Auth::id())->orWhere('recipient_id', Auth::id())->get();

        $chat = [];

        foreach ($messages as $message) {

            if ($message->sender_id > $message->recipient_id) {

                $key = $message->sender_id . '-' . $message->recipient_id;

            } else {

                $key = $message->recipient_id . '-' . $message->sender_id;

            }

            if ($message->sender_id == Auth::id()) {

                $sender = 'You';
                $chatFriend = $message->recipient->name;
                $chatFriendId = $message->recipient_id;

            } else {

                $sender = $message->sender->name;
                $chatFriend = $message->sender->name;
                $chatFriendId = $message->sender_id;

            }
            //TODO add full objects instead to reduce the number of assignments, remake key to only one id
            $chat[$key]['latest_sender'] = $sender;
            $chat[$key]['chat_friend']['name'] = $chatFriend;
            $chat[$key]['chat_friend']['id'] = $chatFriendId;
            $chat[$key]['latest_msg']['content'] = $message->content;
            $chat[$key]['latest_msg']['date'] = $message->created_at;

        }

        $data['chats'] = $chat;

        return view('messages.inbox', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('messages.send');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request)
    {

        if (!empty($request->post('recipient_id'))) {
            $recipientId = $request->post('recipient_id');
        }

        if (!empty($request->post('recipient'))) {
            $recipientId = User::firstWhere('nickname', $request->post('recipient'))['id'];
        }

        Message::create([
            'content' => $request->post('content'),
            'sender_id' => Auth::id(),
            'recipient_id' => $recipientId,
            'is_seen' => 0
        ]);

        return redirect()->route('chat', $recipientId);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessageRequest  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }

    public function chat($recipientId)
    {

        $data['recipientId'] = $recipientId;

        $data['chat'] = Message::where('recipient_id', $recipientId)
            ->where('sender_id', Auth::id())
            ->orWhere('recipient_id', Auth::id())
            ->where('sender_id', $recipientId)
            ->get();

        $unreadMsg = Message::where('recipient_id', Auth::id())
            ->where('is_seen', 0)
            ->get();

        foreach ($unreadMsg as $msg) {

            $msg->is_seen = 1;
            $msg->save();

        }

        return view('messages.chat', $data);

    }

    public static function sysMessage($message, $userIds)
    {

        foreach ($userIds as $userId) {

            Message::create([
                'content' => $message,
                'sender_id' => 1,
                'recipient_id' => $userId,
                'is_seen' => 0
            ]);

        }

    }

}
