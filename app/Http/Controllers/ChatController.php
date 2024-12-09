<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        // Fetch the authenticated user
        $user = Auth::user();
    
        // Fetch all users with the same school_id except the authenticated user
        $receivers = User::where('school_id', $user->school_id)
                         ->where('id', '!=', $user->id)
                         ->get();


        // Fetch messages involving the authenticated user
        $messages = messages::where('sender_id', $user->id)
        ->orWhere('receiver_id', $user->id)
        ->with('sender', 'receiver')
        ->get();
    
    
        // Pass the list of receivers to the view
        return view('chat.index', compact('receivers','messages'));
    }

    // Store a new message
    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'receiver_id' => 'required|exists:users,id',
        ]);

        // Save the message
        messages::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        // Broadcast the message to the receiver
        broadcast(new MessageSent(Auth::user(), $request->message));

        return back();
    }

    // Fetch messages between the current user and the receiver
    public function fetchMessages($receiver_id)
    {
        $messages = Message::where(function($query) use ($receiver_id) {
                $query->where('sender_id', Auth::id())
                      ->where('receiver_id', $receiver_id);
            })
            ->orWhere(function($query) use ($receiver_id) {
                $query->where('sender_id', $receiver_id)
                      ->where('receiver_id', Auth::id());
            })
            ->get();

        return response()->json($messages);
    }
}
