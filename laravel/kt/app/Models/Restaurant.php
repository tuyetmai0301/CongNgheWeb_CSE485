<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_name',
        'cuisine_type',
        'phone',
        'address',
    ];

    // Quan hệ: Một nhà hàng có nhiều món ăn
    public function menuItems()
    {
        return $this->hasMany(MenuItem::class, 'restaurant_id');
    }
}
