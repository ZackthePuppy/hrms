<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Filament\Notifications\Events\DatabaseNotificationsSent;
use Filament\Notifications\Notification;

class TestNotif implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $recipient = auth()->user();
         
        Notification::make()
            ->title('Saved successfully')
            ->broadcast($recipient);
            event(new DatabaseNotificationsSent(auth()->user()));
        // $this->data = $data;
        // \Filament\Notifications\Notification::make()
        //     ->title('TESTING POTA')
        //     ->success()
        //     ->send()
            // ->broadcast(auth()->user())
            // ->sendToDatabase(auth()->user());
            // event(new DatabaseNotificationsSent(auth()->user()));
    }

    public function broadcastOn()
    {
        // return new Channel('test-channel');
        return ['test-channel'];
    }

    // public function broadcastAs(): string
    // {
    //     return 'test-event';
    // }

    public function broadcastWith()
    {
        return ['data' => $this->data];
    }
}
