<?php

namespace App\Events;

use App\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender;
    public $message;

    public function __construct(User $sender, string $message)
    {
        $this->sender = $sender;
        $this->message = $message;
    }

    public function broadcastOn()
    {
        // Use a dynamic channel name based on the user IDs
        return new PrivateChannel('chat.' . $this->sender->id);
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->message,
            'sender' => $this->sender,
        ];
    }
}
