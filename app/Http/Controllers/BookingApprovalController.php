<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BookingApprovalController extends Controller
{

    public function index()
    {
        $bookingApprovals = BookingApproval::select([
            'booking_approvals.id as id',
            'users.name as name',
            'vehicles.type as type',
            'bookings.date as date',
            'bookings.description as description'
        ])
            ->where('approver_id', Auth::user()->id)->where('approval_status', null)
            ->join('bookings', 'bookings.id', 'booking_approvals.booking_id')
            ->join('vehicles', 'vehicles.id', '=', 'bookings.vehicle_id')
            ->join('users', 'users.id', '=', 'bookings.driver_id')
            ->get();

        return view('approval', [
            "bookingApprovals" => $bookingApprovals,
        ]);
    }

    public function approve(Request $request, int $id)
    {
        $bookingApproval = BookingApproval::find($id);
        $bookingApproval->approval_status = true;
        $bookingApproval->update();

        $booking_id = $bookingApproval->booking_id;

        $total = BookingApproval::where('booking_id', $booking_id)->where('approval_status', null)->count();
        if ($total == 0) {
            $booking = Booking::find($booking_id);
            $booking->status = 'approved';
            $booking->update();
        }
        Log::info('approve booking request');
        return redirect('/approval');
    }
}
