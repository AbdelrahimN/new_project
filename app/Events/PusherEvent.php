<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PusherEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $apply;
    /**
     * Create a new event instance.
     */
    public function __construct($apply)
    {
        $this->apply = $apply;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
       return new Channel('job_manager');
    }
    public function broadcastAs()
    {
        return 'job_manager';
    }
}
