<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Cache;

class clearMenus
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    const Menus = 'user_menus';
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //清楚缓存
        Cache::forget(self::Menus.\Auth::id());
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
