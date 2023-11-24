<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use SebastianBergmann\CodeCoverage\Driver\Driver;

class BookingApproval extends Model
{
    protected $fillable = [
        'booking_id',
        'approver_id'
    ];

    public function bookings(): BelongsTo
    {
        return $this->belongsTo(Booking::class, 'booking_id', 'id');
    }
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approver_id', 'id');
    }
}
