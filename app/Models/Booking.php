<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{

    protected $fillable = [
        'vehicle_id',
        'driver_id',
        'description',
        'date',
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'driver_id', 'id');
    }

    public function booking_approvals(): HasMany
    {
        return $this->hasMany(BookingApproval::class, 'booking_id', 'id');
    }
}
