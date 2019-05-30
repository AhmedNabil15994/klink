<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\OrderHistory;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;

class OrderHistoryController extends Controller
{
    //
    public static function store(Order $order, $status)
    {
        $order->OrderHistory()->create([
            'status'=>$status
        ]);
        return 1;
    }
}
