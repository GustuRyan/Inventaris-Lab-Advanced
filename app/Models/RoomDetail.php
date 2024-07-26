<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoomDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'tool_id',
        'material_id',
        'room_id',
        'amount',
    ];
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    public function tool()
    {
        return $this->belongsTo(Tool::class, 'tool_id');
    }
}
