<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'tool_id',
        'material_id',
        'trans_id',
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
}
