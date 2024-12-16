<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\staff;
use App\Models\messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        // Fetch the authenticated staff user
        $staff = auth()->guard('staff')->user();
    
        // Fetch all staff with the same school_id except the authenticated staff
        $receivers = staff::where('school_id', $staff->school_id)
                         ->where('id', '!=', $staff->id)
                         ->get();
    
        // Fetch messages involving the authenticated staff
        $messages = messages::where('receiver_id', $staff->id)
            ->orWhere('receiver_id', $staff->id)
            ->with('sender', 'receiver') // Eager load sender and receiver
            ->get();

         // Fetch messages involving the authenticated staff
         /*$frommessages = messages::where('sender_id'  , $staff->id)
         ->orWhere('sender_id', $staff->id)
         ->with('sender', 'receiver') // Eager load sender and receiver
         ->get();  */  
    
        return view('chat.index', compact('receivers', 'messages'));
    }
    
    
  // Store a new message
public function send(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'message' => 'required',
        'receiver_id' => 'required|exists:staff,id', // Validate against staff table
    ]);

    // Fetch the logged-in staff user
    $staff = auth()->guard('staff')->user();

    // Save the message
    messages::create([
        'sender_id' => $staff->id, // Use the authenticated staff ID
        'receiver_id' => $request->receiver_id,
        'message' => $request->message,
    ]);

    // Broadcast the message to the receiver (ensure the event supports staff model)
    broadcast(new MessageSent($staff, $request->message))->toOthers();

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
