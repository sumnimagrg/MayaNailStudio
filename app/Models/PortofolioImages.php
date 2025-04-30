<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PortofolioImages extends Model
{

    use HasFactory;
    protected $fillable = [
        'employee_id',
        'image_url'
    ];

    public function employee(): BelongsTo
    {
        // $this->belongsTo(Employee::class, 'employee_id', 'id');
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image_url);
    }
}
