<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id');
            $table->integer('driver_id');
            $table->text('description')->nullable(true);
            $table->string('status')->default("requested");
            $table->timestamp('date');
            $table->timestamps();

            $table->foreign('vehicle_id')->on('vehicles')->references('id');
            $table->foreign('driver_id')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
