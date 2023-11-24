<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $booking1 = new Booking();
        $booking1->vehicle_id = "2";
        $booking1->driver_id = "2";
        $booking1->description = "Membawa nikel dari lokasi A ke B";
        $booking1->date = "2023-12-02";
        $booking1->save();

        $booking2 = new Booking();
        $booking2->vehicle_id = "1";
        $booking2->driver_id = "3";
        $booking2->description = "Membawa nikel dari lokasi A ke B";
        $booking2->date = "2023-12-02";
        $booking2->save();
    }
}
