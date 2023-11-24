<?php

namespace Database\Seeders;

use App\Models\BookingApproval;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingApprovalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookingApproval1 =  new BookingApproval();
        $bookingApproval1->approver_id = '8';
        $bookingApproval1->booking_id = '1';
        $bookingApproval1->save();

        $bookingApproval2 =  new BookingApproval();
        $bookingApproval2->approver_id = '9';
        $bookingApproval2->booking_id = '1';
        $bookingApproval2->save();

        $bookingApproval3 =  new BookingApproval();
        $bookingApproval3->approver_id = '8';
        $bookingApproval3->booking_id = '2';
        $bookingApproval3->save();

        $bookingApproval4 =  new BookingApproval();
        $bookingApproval4->approver_id = '10';
        $bookingApproval4->booking_id = '2';
        $bookingApproval4->save();
    }
}
