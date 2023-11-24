<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class BookingExport implements FromView
{

    public function view(): View
    {
        $reports = Booking::with('vehicle')
            ->with('driver')
            ->where('status', 'approved')
            ->orderBy('date', 'desc')
            ->get();
        return view('exports.reports', [
            'reports' => $reports
        ]);
    }
}
