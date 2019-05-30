<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('orders', function ($user) {
    $user->orderId = request()->header('orderid');
    return $user;
});

Broadcast::channel('order.{id}', function ($order, $id) {
    return true;
});
Broadcast::channel('offerTour.{tourId}', function ($any, $tourId) {
    // dd($tourId);
    return true;
});
