<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;
    protected $fillable = [
        'tool_name',
        'merk',
        'stock',
        'condition',
        'in_date',
    ];

    public function roomDetails()
    {
        return $this->hasMany(RoomDetail::class, 'tool_id');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class, 'tool_id');
    }
}
