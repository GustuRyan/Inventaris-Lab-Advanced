<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'material_id',
        'tool_id',
        'user_id',
        'room_id',
        'amount',
    ];
    
    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    public function tool()
    {
        return $this->belongsTo(Tool::class, 'tool_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
