<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function list($status)
    {
        switch ($status) {
            case 'pending':
                $reservations = Reservation::where('status', 0)->orderBy('id', 'DESC')->get();
                break;
            case 'accepted':
                $reservations = Reservation::where('status', 1)->orderBy('id', 'DESC')->get();
                break;
            case 'canceled':
                $reservations = Reservation::where('status', 9)->orderBy('id', 'DESC')->get();
                break;

            default:
                abort(404);
                break;
        }
        return view('reservations.list', compact('reservations', 'status'));
    }

    public function accept($reservation_id)
    {
        $reservation = Reservation::findOrFail($reservation_id);
        $reservation->status = 1;
        $reservation->accepted_by = auth()->id();
        $reservation->accepted_at = date('Y-m-d H:m:i');
        $reservation->save();
        return redirect()->back()->with(['customSuccess' => 'Reservation Accepted Successfully..']);
    }

    public function cancel($reservation_id)
    {
        $reservation = Reservation::findOrFail($reservation_id);
        $reservation->status = 9;
        $reservation->save();
        return redirect()->back()->with(['customSuccess' => 'Reservation Canceled Successfully..']);
    }
}
