<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    use HasFactory;
    protected $table = 'recommend';
    protected $fillable = [
        'tool_id',
        'material_id',
        'practice',
        'relation',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    public function tool()
    {
        return $this->belongsTo(Tool::class, 'tool_id');
    }
}
