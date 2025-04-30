<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'service_desc',
        'service_category',
        'duration',
        'image',
        'price'
    ];

    public function serviceCategories()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category', 'id');
    }
}
