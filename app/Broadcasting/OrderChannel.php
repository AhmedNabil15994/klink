<?php

namespace App\Broadcasting;

use Illuminate\Broadcasting\Channel;

use App\Models\Frontend\User;

class OrderChannel extends Channel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        parent::__construct('order-'.$name);
    }
    

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\Models\Frontend\User  $user
     * @return array|bool
     */
}
