<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'rating',
        'bio',
        'image'
    ];

    public function services(): void
    {
        $this->hasMany(Services::class, 'employee_id', 'id');
    }
    public function portfolioImages()
    {
        return $this->hasMany(PortofolioImages::class);
    }
}
