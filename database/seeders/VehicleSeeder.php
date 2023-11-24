<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehiclePassenger = new Vehicle();
        $vehiclePassenger->type = "passenger";
        $vehiclePassenger->save();
        $vehicleCargo = new Vehicle();
        $vehicleCargo->type = "cargo";
        $vehicleCargo->save();
    }
}
