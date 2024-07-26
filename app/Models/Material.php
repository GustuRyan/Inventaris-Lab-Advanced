<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [
        'material_name',
        'character',
        'stock',
        'condition',
        'in_date',
    ];
    public function roomDetails()
    {
        return $this->hasMany(RoomDetail::class, 'material_id');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class, 'material_id');
    }
}
