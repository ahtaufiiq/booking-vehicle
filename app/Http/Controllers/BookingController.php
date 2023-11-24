<?php

namespace App\Http\Controllers;

use App\Exports\BookingExport;
use App\Models\Booking;
use App\Models\BookingApproval;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class BookingController extends Controller
{

    public function index()
    {

        $approvers = User::select(['id', 'name as value'])->where('user_type', 'approver')->get();
        $drivers = User::select(['id', 'name as value'])->where('user_type', 'driver')->get();
        $vehicles = Vehicle::select(['id', 'type as value'])->get();


        return view('booking', [
            "approvers" => $approvers,
            "vehicles" => $vehicles,
            "drivers" => $drivers,
        ]);
    }

    public function bookingVehicle(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required',
            'driver_id' => 'required',
            'date' => 'required',
            'first_approver_id' => 'required',
            'second_approver_id' => 'required|different:first_approver_id'
        ]);
        $booking = Booking::create($request->all());
        $booking_id = $booking->id;
        $first_approver_id = $request->input('first_approver_id');
        $second_approver_id = $request->input('second_approver_id');
        $firstApprover = new BookingApproval();
        $firstApprover->booking_id = $booking_id;
        $firstApprover->approver_id = $first_approver_id;
        $firstApprover->save();

        $secondApprover = new BookingApproval();
        $secondApprover->booking_id = $booking_id;
        $secondApprover->approver_id = $second_approver_id;
        $secondApprover->save();

        Log::info('admin book vehicle', [$booking]);
        return redirect("/booking/request");
    }

    public function bookingApproved()
    {

        $reports = Booking::with('vehicle')
            ->with('driver')
            ->where('status', 'approved')
            ->orderBy('date', 'desc')
            ->get();

        return view('reports', [
            'reports' => $reports
        ]);
    }

    public function bookingRequest()
    {

        $bookingRequest = Booking::with('vehicle')
            ->with('driver')
            ->where('status', 'requested')
            ->orderBy('date', 'desc')
            ->get();

        return view('request', [
            'request' => $bookingRequest
        ]);
    }

    public function export()
    {
        Log::info('export to excel');
        return Excel::download(new BookingExport, 'reports.xlsx');
    }
}
