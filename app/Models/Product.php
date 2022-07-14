<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'image', 'price'
    ];

    public function getFormattedPriceAttribute(): string
    {
        return int_to_decimal($this->price);
    }
}
