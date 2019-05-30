<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Frontend\Order;
use App\Models\Frontend\Offer;
use App\Models\Frontend\Profile;
use App\Models\Backend\Shipping;

class TaskEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $offer;
    public $order;
    public $profile;
    public $discount;

    public function __construct(Order $order, Offer $offer, Profile $profile, $discount)
    {
        //
        $this->order = $order;
        $this->offer = $offer;
        $this->profile = $profile;
        $this->discount = $discount;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('order'.$this->order->id);
    }
}
