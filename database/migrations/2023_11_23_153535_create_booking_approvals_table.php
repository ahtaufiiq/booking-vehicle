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
        Schema::create('booking_approvals', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id');
            $table->integer('approver_id');
            $table->boolean('approval_status')->nullable();
            $table->timestamps();

            $table->foreign('booking_id')->on('bookings')->references('id');
            $table->foreign('approver_id')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_approvals');
    }
};
