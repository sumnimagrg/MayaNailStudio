<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_desc',
        'category_img'
    ];

    public function services()
    {
        return $this->hasMany(Services::class, 'service_category', 'id');
    }
}
