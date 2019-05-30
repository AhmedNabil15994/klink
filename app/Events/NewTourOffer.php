<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class NewTourOffer implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    protected $offerId;
    protected $tourId;
    public function __construct($offerId, $tourId)
    {
        $this->offerId = $offerId;
        $this->tourId = $tourId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastAs()
    {
        return 'newOffer'.$this->tourId;
    }

    public function broadcastOn()
    {
        return new Channel('offerTour'.$this->tourId);
    }
    
    public function broadcastWith()
    {
        return [
            'data'=>[
                'offer_id'=>$this->offerId,
                'tour_id'=>$this->tourId
            ]
        ];
    }
}
