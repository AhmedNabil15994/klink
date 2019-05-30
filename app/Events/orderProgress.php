<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

use \App\Models\Frontend\Order;

class orderProgress implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $order;
    public $sendEmailAndController;
    public $sendEmails;
    public function __construct(Order $order, $sendEmailAndController =[], $sendEmails = false)
    {
        $this->sendEmailAndController = $sendEmailAndController;
        $this->order = $order;
        $this->sendEmails = $sendEmails;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('orders');
    }
    public function broadcastWith()
    {
        return [
            'data'=>[
                'order'=>$this->order,
            ]
        ];
    }
}
