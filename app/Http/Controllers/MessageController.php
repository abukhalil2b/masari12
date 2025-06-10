<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageReplayStoreRequest;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\MessageReplay;
use App\Models\User;

use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function message()
    {
        $loggedUser = auth()->user();

        $message_receivers = DB::table('message_receiver')
            ->select('sender.name as sender_name', 'message_receiver.id as message_receiver_id', 'messages.id as message_id', 'messages.content', 'messages.created_at', 'receiver.name as receiver_name')
            ->addSelect(DB::raw(" (CASE when sender.id = " . $loggedUser->id . " THEN receiver.name ELSE sender.name end) as display_name "))
            ->join('messages', 'message_receiver.message_id', '=', 'messages.id')
            ->join('users as receiver', 'message_receiver.receiver_id', '=', 'receiver.id')
            ->join('users as sender', 'messages.sender_id', '=', 'sender.id')
            ->where(function ($query) use ($loggedUser) {
                $query->where('message_receiver.receiver_id', $loggedUser->id)
                    ->orWhere('messages.sender_id', $loggedUser->id);
            })
            ->latest('message_receiver.id')
            ->get();


        // return $message_receivers;
        return view('admin.message.index', compact('message_receivers'));
    }
    public function index()
    {
        $loggedUser = auth()->user();

        $message_receivers = DB::table('message_receiver')
            ->select('sender.name as sender_name', 'message_receiver.id as message_receiver_id', 'messages.id as message_id', 'messages.content', 'messages.created_at', 'receiver.name as receiver_name')
            ->addSelect(DB::raw(" (CASE when sender.id = " . $loggedUser->id . " THEN receiver.name ELSE sender.name end) as display_name "))
            ->join('messages', 'message_receiver.message_id', '=', 'messages.id')
            ->join('users as receiver', 'message_receiver.receiver_id', '=', 'receiver.id')
            ->join('users as sender', 'messages.sender_id', '=', 'sender.id')
            ->where(function ($query) use ($loggedUser) {
                $query->where('message_receiver.receiver_id', $loggedUser->id)
                    ->orWhere('messages.sender_id', $loggedUser->id);
            })
            ->latest('message_receiver.id')
            ->get();


        // return $message_receivers;
        return view('admin.message.index', compact('message_receivers'));
    }


    public function show($message_receiver_id)
    {
        $loggedUser = auth()->user();

        $message_receiver = DB::table('message_receiver')
            ->select('sender.id as sender_id', 'sender.name as sender_name', 'message_receiver.id as message_receiver_id', 'messages.id as message_id', 'messages.content', 'messages.created_at', 'receiver.name as receiver_name')
            ->addSelect(DB::raw(" (CASE when sender.id = " . $loggedUser->id . " THEN receiver.name ELSE sender.name end) as display_name "))
            ->addSelect(DB::raw(" (CASE when sender.id = " . $loggedUser->id . " THEN receiver.gender ELSE sender.gender end) as gender "))
            ->join('messages', 'message_receiver.message_id', '=', 'messages.id')
            ->join('users as receiver', 'message_receiver.receiver_id', '=', 'receiver.id')
            ->join('users as sender', 'messages.sender_id', '=', 'sender.id')
            ->where('message_receiver.id', $message_receiver_id)
            ->first();

        if (!$message_receiver) {
            abort(404);
        }

        $replays = DB::table('message_replies')
            ->select(
                'users.name as sender_name',
                'message_replies.content',
                'message_replies.seen',
                'message_replies.created_at'
            )->addSelect(DB::raw("(CASE when users.id = " . $loggedUser->id . " THEN 'sent' ELSE 'received' end) as message_type"))
            ->join('users', 'message_replies.sender_id', '=', 'users.id')
            ->join('messages', 'message_replies.original_message_id', '=', 'messages.id')
            ->where(['message_receiver_id' => $message_receiver->message_receiver_id])

            ->get();

        // return $replays;
        return view('admin.message.show', compact('message_receiver', 'replays'));
    }


    public function sendCreate()
    {
        $loggedUser = auth()->user();

        $profileIds = [1, 2];

        if ($loggedUser->profile_using == 'trainee') {
            $profileIds = [1, 2, 3, 4, 5, 6];
        }


        if ($loggedUser->profile_using == 'trainer') {
            $profileIds = [1, 2, 3, 4, 5, 6];
        }

        if ($loggedUser->profile_using == 'admin') {
            $profileIds = [1, 2, 3, 4, 5, 6];
        }

        if ($loggedUser->profile_using == 'super_admin') {
            $profileIds = [1, 2, 3, 4, 5, 6];
        }


        $contacts = User::whereHas('profiles', function ($query) use ($profileIds) {
            $query->whereIn('user_profile.profile_id', $profileIds);
        })->whereNot('id', $loggedUser->id)
            ->whereNot('id', 1)
            ->get();

        return view('admin.message.send.create', compact('contacts'));
    }

    public function replayCreate(Message $message)
    {
        return view('admin.message.send.create', compact('message'));
    }


    public function sendStore(Request $request)
    {
        if (!$request->receiver_ids) {
            return back()->with(['message' => 'receiver is required']);
        }

        if (!$request->content) {
            return back()->with(['message' => 'content is required']);
        }

        $loggedUser = auth()->user();

        $clean_text = strip_tags($request->content, '<a><b><i><h1><h2><h3><h4><h5><h6><p><center>'); //allow some tags

        $message = Message::create([
            'content' => $clean_text, //stripping away the script tags
            'sender_id' => $loggedUser->id,
        ]);

        foreach ($request->receiver_ids as $receiver_id) {

            DB::table('message_receiver')->insert([
                'message_id' => $message->id,
                'receiver_id' => $receiver_id
            ]);
        }

        return redirect()->route('admin.message.index');
    }

    public function replayStore(Request $request)
    {
        // return $request->all();
        $loggedUser = auth()->user();

        $clean_text = strip_tags($request->content, '<a><b><i><h1><h2><h3><h4><h5><h6><p><center>'); //allow some tags

        MessageReplay::create([
            'message_receiver_id' => $request->message_receiver_id,
            'original_message_id' => $request->original_message_id,
            'content' => $clean_text, //stripping away the script 
            'sender_id' => $loggedUser->id,
        ]);

        return back();
    }

    public function receiverIndex(Message $message)
    {
        $receivers = $message->receivers;
        return view('admin.message.receiver.index', compact('receivers'));
    }


    public function edit(Message $message)
    {
        //
    }

    public function update(Request $request, Message $message)
    {
        //
    }


    public function destroy(Message $message)
    {
        //
    }
}
