<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'appointment_date',
        'appointment_time',
        'status',
        'is_prepaid',
        // 'isCancelled',
        // 'duration',
        'price',
        // 'rating',
        'user_id',
        'employee_id',
        'service_id',
        'confirmed_at',
    ];

    protected $casts = [
        'confirmed_at' => 'datetime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function service()
    {
        return $this->belongsTo(Services::class);
    }
}
