<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function list($status)
    {
        switch ($status) {
            case 'pending':
                $orders = Order::where('status', 0)->orderBy('id', 'DESC')->get();
                break;
            case 'accepted':
                $orders = Order::where('status', 1)->orderBy('id', 'DESC')->get();
                break;
            case 'canceled':
                $orders = Order::where('status', 9)->orderBy('id', 'DESC')->get();
                break;

            default:
                abort(404);
                break;
        }

        return view('orders.list', compact('orders', 'status'));
    }

    public function view($order_id)
    {
        $order = Order::findOrFail($order_id);
        return view('orders.view', compact('order'));
    }

    public function accept($order_id)
    {
        $order = Order::findOrFail($order_id);
        $order->status = 1;
        $order->accepted_at = date('Y-m-d H:m:s');
        $order->save();
        return redirect()->back()->with(['customSuccess' => 'Order Accepted Successfully..']);
    }

    public function cancel($order_id)
    {
        $order = Order::findOrFail($order_id);
        $order->status = 9;
        $order->save();
        return redirect()->back()->with(['customSuccess' => 'Order Canceled Successfully..']);
    }
}
