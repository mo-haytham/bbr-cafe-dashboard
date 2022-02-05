<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function sync()
    {
        $order_count = Order::where('status', 0)->count();
        $reservation_count = Reservation::where('status', 0)->count();
        return response(['order_count' => $order_count, 'reservation_count' => $reservation_count], 200);
    }
}
