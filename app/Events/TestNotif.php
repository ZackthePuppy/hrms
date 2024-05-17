<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestNotif implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
        $recipient = auth()->user();
        \Filament\Notifications\Notification::make()
            ->title('TESTING POTA')
            ->sendToDatabase($recipient);
    }

    public function broadcastOn()
    {
        return new Channel('test-channel');
    }

    public function broadcastWith()
    {
        return ['data' => $this->data];
    }
}
